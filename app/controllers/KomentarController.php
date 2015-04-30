<?php

class KomentarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout="backend.layout.main";

	
	public function index()
	{
           $komentar=Newkomentar::join("artikel","komentar.id_tulisan","=","artikel.id")
		                           ->where("komentar.id_user","=",Auth::id())
                                  ->selectRaw("artikel.judul as judul, 
								  komentar.isi as isi, komentar.id as id,
  								  komentar.created_at as created_at,
								  komentar.id_tulisan as id_tulisan")		                         
								   ->get();
		$this->setBreadcrumbs(array("Home"=>"/home","Comment"=>""));
		$this->layout->content=View::make("backend.komentar.index",array("komentars"=>$komentar));
	}
	
	public function showKomentar($id){
			$notification=Notification::where("id_komentar","=",$id)->update(array("read_"=>"1"));
			$notification=Notification::where("id_komentar","=",$id)->first();
			
		  return Redirect::to($notification->url);

			
	}
	
	
protected function mergesort($data,$key) {
  $middle = round(count($data)/2, 0, PHP_ROUND_HALF_DOWN);
 $akhir=count($data)-1;
 $n=0;
 for($n=0;$n<count($data);++$n){
	 if($data[$n]->id==$key)
	 { 
 return $n+1;
 
	 }
	 
	if($middle-$n >=0)
      {
		 if($data[$middle-$n]->id==$key){
			 return $middle-$n+1; 

		 }
	  }	 
	 if($middle+$n <count($data))
	 {
	 if($data[$middle+$n]->id==$key){
		 return $middle+$n+1; 
	 }
	 }
	 if(($akhir-$n) > $middle)
	 {
	 if($data[$akhir-$n]->id==$key){
		 return $akhir-$n+1; 
	 }
	 }	 
	 
 }
 
}
	public function showKomentar2($id,$idtulisan){
		
		    $num=Newkomentar::where("id_tulisan","=",$idtulisan)
			       ->orderBy("created_at","asc")->select("id")->get();
			$artikel=Artikel::where("id","=",$idtulisan)->first();
			$notification=Notification::where("id_komentar","=",$id)->update(array("read_"=>"1"));
			$notification=Notification::where("id_komentar","=",$id)->first();
			
	       $data=json_decode(json_encode($num));
	       $temp=$this->mergesort($data,$id);
		   $page=0;
		
		   if($temp<=10)
			  $page=1;
			else
             $page=(int) ($temp/10)+1;
			 
    		 $idkomentar=UsersController::numhash($id);
			 $judul=ArtikelController::getJudul($artikel->judul);
			 $date=UsersController::getDate($artikel->created_at);
		  return Redirect::to(URL::to('/thread/'.$date.'/'.$artikel->id."/".$judul."?page=".$page.'#'.$idkomentar));
	}
	
public function createKomentar($id){
	         $this->layout=null;
			
 			require_once(public_path().'/plugin/recaptchalib.php');
			 $privatekey = "6Le0SwITAAAAACcwAeozA5N-9okOUfoeFH9MaNOK";
			 $resp = recaptcha_check_answer ($privatekey,
											 $_SERVER["REMOTE_ADDR"],
             $_POST["recaptcha_challenge_field"],
             $_POST["recaptcha_response_field"]);
			 $roles=array("komentar"=>"required",
			                "id_komentar"=>"required");
			 $messages=array("required"=>":attribute Tidak Boleh Kosong");
			$validator=Validator::make(Input::all(),$roles,$messages);
			
		  if (!$resp->is_valid) {
			  $validator->getMessageBag()->add('captcha', 'captcha salah');
			   return Redirect::back()->withErrors( $validator->errors())->withInput();
								  
			}elseif($validator->fails()) 
			{
				
				return Redirect::back()->withErrors( $validator->errors())->withInput();
			}else{
			$artikel=Artikel::where("id","=",$id)->selectRaw("count(*) as jumlah,id_user,judul")->first();

			if($artikel->jumlah!=0)
			{
				$reKomentar=Newkomentar::join("profile","profile.id_user","=","komentar.id_user")
								         ->selectRaw("profile.nama as nama_user,
												komentar.isi as isi, 
												komentar.id_user as id_user")
										->where("komentar.id","=",Input::get("id_komentar"))->first();
				$profile=Profile::where("id_user","=",$reKomentar->id_user)->first();
                $tempdata=$reKomentar->isi;
				$awal= strripos($tempdata,"<quote>");
				$akhir=strripos($tempdata,"</quote>");
			    $tempbersih= substr($tempdata,$akhir,strlen($tempdata));				
				$strkomentar="<quote> "." <div class='col-xs-12'><a href='".URL::to(Input::get("url")."#".UsersController::numhash(Input::get("id_komentar")))."'>Original Post by ".$reKomentar->nama_user."</a></div>
				<div class='col-xs-12' style='background:#F5F5F5; padding-top:10px; padding-bottom:10px;'>".$tempbersih."</div> </quote>";
			  $komentar1=new Newkomentar;
			  $komentar1->tipe="thread";
			  $komentar1->id_tulisan=$id;
			  $komentar1->id_user=Auth::id();
			  $komentar1->isi="  ".$strkomentar."  ".Input::get("komentar");
			  if($komentar1->save())
			  {

				  $notification=new Notification();
				  $notification->from_=Session::get("nama");
				  $notification->to_=$reKomentar->id_user;
				  $notification->id_komentar=$komentar1->id;

                     
                 
				  $strkomentar= explode(" ",Input::get("komentar"),100);
				  $notification->isi=" ".implode($strkomentar," ");
				  $notification->url="/home/komentar/".$komentar1->id."/show";
				  $notification->read_=0;
				  if($notification->save())
				   return Redirect::back()->with("success","komentar Berhasil di simpan"); 
				    
					$validator->getMessageBag()->add('komentar', 'komentar gagal di simpan');
				   return Redirect::back()->withErrors( $validator->errors())->withInput();	  

				  
			  }else{
				 $validator->getMessageBag()->add('komentar', 'komentar gagal di simpan');
			   return Redirect::back()->withErrors( $validator->errors())->withInput();
				  
			  }
			}
			}
	
}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}
	public function addKomentar($id)
	{      $this->layout=null;

			require_once(public_path().'/plugin/recaptchalib.php');
			 $privatekey = "6Le0SwITAAAAACcwAeozA5N-9okOUfoeFH9MaNOK";
			 $resp = recaptcha_check_answer ($privatekey,
											 $_SERVER["REMOTE_ADDR"],
             $_POST["recaptcha_challenge_field"],
             $_POST["recaptcha_response_field"]);
			 $roles=array("komentar"=>"required");
			 $messages=array("required"=>":attribute Tidak Boleh Kosong");
			$validator=Validator::make(Input::all(),$roles,$messages);
			
		  if (!$resp->is_valid) {
			  $validator->getMessageBag()->add('captcha', 'captcha salah');
			   return Redirect::back()->withErrors( $validator->errors())->withInput();
								  
			}elseif($validator->fails()) 
		    {
				
				return Redirect::back()->withErrors( $validator->errors())->withInput();
			}else{
			$artikel=Artikel::join("profile","profile.id_user","=","artikel.id_user")
			                 ->where("artikel.id","=",$id)
							 ->selectRaw("count(*) as jumlah,artikel.id_user,artikel.judul,artikel.isi,profile.nama as nama")->first();

			if($artikel->jumlah!=0)
			{
              
			  $komentar1=new Newkomentar;
			  $komentar1->tipe="thread";
			  $komentar1->id_tulisan=$id;
			  $komentar1->id_user=Auth::id();
				$tempbersih= $this::cekQuote($artikel->isi);
			  $strkomentar=" <quote> "." <div class='col-xs-12'><a href='".URL::to(Input::get("url")."?page=1#".UsersController::numhash(Input::get("id_komentar")))."'>Original Posted By :".$artikel->nama."</a></div>
				<div class='col-xs-12' style='background:#F5F5F5; padding-top:10px; padding-bottom:10px;'>".  $tempbersih."</div> </quote>  ";
			  $komentar1->isi="   ".$strkomentar."  ".Input::get("komentar");
			  if($komentar1->save())
			  {
				  $notification=new Notification();
				  $notification->from_=Session::get("nama");
				  $notification->to_=$artikel->id_user;
				  $notification->id_komentar=$komentar1->id;
				  $strkomentar= explode(" ",Input::get("komentar"),100);
				  $notification->isi=" ".implode($strkomentar," ");
				  $notification->url=Input::get("url")."?page=1#".UsersController::numhash(Input::get("id_komentar"));
				  $notification->read_=0;
				  if($notification->save())
				  {
				   
				   return Redirect::back()->with("success","komentar Berhasil di simpan"); 
					  
				  }else{
					  
				   $validator->getMessageBag()->add('komentar', 'komentar gagal di simpan');
				   return Redirect::back()->withErrors( $validator->errors())->withInput(); 					  
				  }
				  
			  }else{
				 $validator->getMessageBag()->add('komentar', 'komentar gagal di simpan');
			   return Redirect::back()->withErrors( $validator->errors())->withInput();
				  
			  }
			}
			}
	}

		public function postReply($id)
	{
            $this->layout=null;
			require_once(public_path().'/plugin/recaptchalib.php');
			 $privatekey = "6Le0SwITAAAAACcwAeozA5N-9okOUfoeFH9MaNOK";
			 $resp = recaptcha_check_answer ($privatekey,
											 $_SERVER["REMOTE_ADDR"],
             $_POST["recaptcha_challenge_field"],
             $_POST["recaptcha_response_field"]);
			 $roles=array("komentar"=>"required");
			 $messages=array("required"=>":attribute Tidak Boleh Kosong");
			$validator=Validator::make(Input::all(),$roles,$messages);
			
		  if (!$resp->is_valid) {
			  $validator->getMessageBag()->add('captcha', 'captcha salah');
			   return Redirect::back()->withErrors( $validator->errors())->withInput();
								  
			}elseif($validator->fails()) 
		    {
				
				return Redirect::back()->withErrors( $validator->errors())->withInput();
			}else{
			$artikel=Artikel::where("id","=",$id)->selectRaw("count(*) as jumlah,id_user,judul,isi")->first();

			if($artikel->jumlah!=0)
			{
              
			  $komentar1=new Newkomentar;
			  $komentar1->tipe="thread";
			  $komentar1->id_tulisan=$id;
			  $komentar1->id_user=Auth::id();
			  $komentar1->isi=Input::get("komentar");
			  if($komentar1->save())
			  {
				  $notification=new Notification();
				  $notification->from_=Session::get("nama");
				  $notification->to_=$artikel->id_user;
				  $notification->id_komentar=$komentar1->id;
				  $strkomentar= explode(" ",Input::get("komentar"),100);
				  $notification->isi=" ".implode($strkomentar," ");
				  $notification->url="/home/komentar/".$komentar1->id."/show";
				  $notification->read_=0;
				  if($notification->save())
				  {
				   
				   return Redirect::back()->with("success","komentar Berhasil di simpan"); 
					  
				  }else{
					  
				   $validator->getMessageBag()->add('komentar', 'komentar gagal di simpan');
				   return Redirect::back()->withErrors( $validator->errors())->withInput(); 					  
				  }
				  
			  }else{
				 $validator->getMessageBag()->add('komentar', 'komentar gagal di simpan');
			   return Redirect::back()->withErrors( $validator->errors())->withInput();
				  
			  }
			}
			}
	}
		public function reKomentar($id)
		{ $this->layout=null;
             $page="";
			 $idkomentar=Input::get("id_komentar"); 
			  $starpage=strpos($idkomentar,"-");			  
			 if($starpage!=false)
			   {
			 
			 $page=substr($idkomentar,($starpage+1),strlen($idkomentar));
	         $idkomentar=substr($idkomentar,0,$starpage);
			   }else{
				   $page=1;
				   
			   }
			
				 
			require_once(public_path().'/plugin/recaptchalib.php');
			 $privatekey = "6Le0SwITAAAAACcwAeozA5N-9okOUfoeFH9MaNOK";
			 $resp = recaptcha_check_answer ($privatekey,
											 $_SERVER["REMOTE_ADDR"],
             $_POST["recaptcha_challenge_field"],
             $_POST["recaptcha_response_field"]);
			 $roles=array("komentar"=>"required",
			                "id_komentar"=>"required");
			 $messages=array("required"=>":attribute Tidak Boleh Kosong");
			$validator=Validator::make(Input::all(),$roles,$messages);
			
		  if (!$resp->is_valid) {
			  $validator->getMessageBag()->add('captcha', 'captcha salah');
			   return Redirect::back()->withErrors( $validator->errors())->withInput();
								  
			}elseif($validator->fails()) 
			{
				
				return Redirect::back()->withErrors( $validator->errors())->withInput();
			}else{
			$artikel=Artikel::where("id","=",$id)->selectRaw("count(*) as jumlah,id_user,judul")->first();

			if($artikel->jumlah!=0)
			{
			 $reKomentar=Newkomentar::join("profile","profile.id_user","=","komentar.id_user")
								         ->selectRaw("profile.nama as nama_user,
												komentar.isi as isi, 
												komentar.id_user as id_user")
										->where("komentar.id","=",$idkomentar)->first();
              

			  
	
               $tempbersih= $this::cekQuote($reKomentar->isi);
				$strkomentar=" <quote> "." <div class='col-xs-12'><a href='".URL::to(Input::get("url")."?page=".$page."#".UsersController::numhash($idkomentar))."'> Original Posted By : ".$reKomentar->nama_user."</a></div>
				<div class='col-xs-12' style='background:#F5F5F5; padding-top:10px; padding-bottom:10px;'>".$tempbersih."</div> </quote> ";
			  $komentar1=new Newkomentar;
			  $komentar1->tipe="thread";
			  $komentar1->id_tulisan=$id;
			  $komentar1->id_user=Auth::id();
			  $komentar1->isi=" ".$strkomentar." ".Input::get("komentar");
			 
			  if($komentar1->save())
			  {


				  $notification=new Notification();
				  $notification->from_=Session::get("nama");
				  $notification->to_=$reKomentar->id_user;
				  $notification->id_komentar=$komentar1->id;
				  $notification->isi=" ".substr(Input::get("komentar"),0,100);
				  $notification->url=Input::get("url")."?page=".$page."#".UsersController::numhash($idkomentar);
				  $notification->read_=0;
				  if($notification->save())
				   return Redirect::back()->with("success","komentar Berhasil di simpan"); 
				    
					$validator->getMessageBag()->add('komentar', 'komentar gagal di simpan');
				   return Redirect::back()->withErrors( $validator->errors())->withInput();	  

				  
			  }else{
				 $validator->getMessageBag()->add('komentar', 'komentar gagal di simpan');
			   return Redirect::back()->withErrors( $validator->errors())->withInput();
				  
			  }
			}
			}
	}	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}
	public function editKomentar($id,$idtulisan)
	{
		$komentar=Newkomentar::where("id","=",$id)
		                  ->where("id_user","=",Auth::id())
						  ->where("id_tulisan","=",$idtulisan)->first();
	   
	     $quote=$this::getQuote($komentar->isi);
		 $isi=$this::cekQuote($komentar->isi);
		 $this->layout->content=View::make("backend.komentar.update",array("komentar"=>$komentar,"quote"=>$quote,"isi"=>$isi))->render();
	
	}	


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		require_once(public_path().'/plugin/recaptchalib.php');
          $privatekey = "6Le0SwITAAAAACcwAeozA5N-9okOUfoeFH9MaNOK";
			 $resp = recaptcha_check_answer ($privatekey,
											 $_SERVER["REMOTE_ADDR"],
             $_POST["recaptcha_challenge_field"],
             $_POST["recaptcha_response_field"]);
			  			 $roles=array("komentar"=>"required");
			 $messages=array("required"=>":attribute Tidak Boleh Kosong");
			$validator=Validator::make(Input::all(),$roles,$messages);
			
		  if (!$resp->is_valid) {
			  $validator->getMessageBag()->add('captcha', 'captcha salah');
			   return Redirect::back()->withErrors( $validator->errors())->withInput();
		  }else{				 
			  $komentar1=Newkomentar::find($id);
			  $komentar1->tipe="thread";
			  $komentar1->id_user=Auth::id();
			  $komentar1->isi=Input::get("quote")." ".Input::get("komentar");
			 
			  if($komentar1->save())
			 return Redirect::action("KomentarController@index")->with(array("status"=>"success","message"=>"Berhasil di Update"));
			  else
			return Redirect::action("KomentarController@index")->with(array("status"=>"error","message"=>"Gagal di Update"))->withInput();
		  }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,$idtulisan)
	{
			$komentar1=Newkomentar::where("id","=",$id)
					   ->where("id_tulisan","=",$idtulisan)
													   ->where("id_user","=",Auth::id())->delete();
              $notification=Notification::where("id_komentar","=",$id)->delete();													   
			  if($komentar1)
			 return Redirect::action("KomentarController@index")->with(array("status"=>"success","message"=>"Berhasil di Delete"));
			  else
			return Redirect::action("KomentarController@index")->with(array("status"=>"error","message"=>"Gagal di Delete"));
	}

   public function komentarThread($tahun,$id,$judul){
$this->layout=null;
	$url="/thread/".$tahun."/".$id."/".$judul;
	$judul=ArtikelController::getJudul($judul);	 
	      $content=View::make("frontend.komentar.content",array("id"=>$id,"judul"=>$judul,"url"=>$url))->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","<span class='text-capitalize'>".$judul."</span>"=>$url,"Komentar"=>"")));
   }
   
   public function getReply($tahun,$id,$judul)
   {
	   $this->layout=null;
   $url="/thread/".$tahun."/".$id."/".$judul;
	$judul=ArtikelController::getJudul($judul);	 
	      $content=View::make("frontend.komentar.postreply",array("id"=>$id,"judul"=>$judul,"url"=>$url,))->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","<span class='text-capitalize'>".$judul."</span>"=>$url,"Komentar"=>"")));
   
   
   }
	   
   
   public function komentarThreadReplay($tahun,$id,$judul,$idkomentar){
               
			   $this->layout=null;
			   $page="";
               $starpage=strpos($idkomentar,"-");			;
			 if( $starpage!=false)
			   {			 
					 $page=substr($idkomentar,($starpage),strlen($idkomentar));
					 $idkomentar=substr($idkomentar,0,$starpage);
			   }else{
			     $page="-1"; 
			   }
   $url="/thread/".$tahun."/".$id."/".$judul;
	$judul=ArtikelController::getJudul($judul);	 
	$komentar=Newkomentar::where("id","=",$idkomentar)->first();
	  $content=View::make("frontend.komentar.contentreplay",array("id"=>$id,"judul"=>$judul,"komentar"=>$komentar,"url"=>$url,"page"=>$page,))->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","<span class='text-capitalize'>".$judul."</span>"=>$url,"Komentar"=>"")));
   }
   
   
   public static function  cekQuote($tempdata){
	   				$awal= strripos ($tempdata,"<quote>");
				$akhir=strripos ($tempdata,"</quote>");
				if($akhir)
			     return substr($tempdata,$akhir+8,strlen($tempdata));	
				else
				  return  substr($tempdata,$akhir,strlen($tempdata));	
	   
   }
   public static function  getQuote($tempdata){
	   				$awal= strripos ($tempdata,"<quote>");
				$akhir=strripos ($tempdata,"</quote>");
				if($akhir)
			     return substr($tempdata,$awal,$akhir+8);	
				else
				  return  substr($tempdata,$awal,$akhir);	
	   
   }   
      public static function  getController($tempdata){
	   				$awal= 0;
				$akhir=strripos ($tempdata,"@");
				if($akhir)
			     return substr($tempdata,$awal,$akhir);	
				else
				  return  substr($tempdata,$awal,$akhir);	
	   
   }  
   
       public function setBreadcrumbs($data){
		
		$this->layout->breadcrumbs=$data;
	}
}

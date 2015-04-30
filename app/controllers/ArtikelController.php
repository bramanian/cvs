<?php

class ArtikelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout="backend.layout.main";
	public function index()
	{

	
	 $this->setTitle("My Artikel");
	 
	$artikels=Artikel::join("kategori","kategori.id","=","artikel.id_kategori")
	                    ->join("profile","profile.id_user","=","artikel.id_user")
	                    ->where("artikel.id_user","=",Auth::id())
	                   ->orderBy("artikel.created_at","desc")
					   ->selectRaw("artikel.id as id, artikel.judul as judul, kategori.nama as kategori, artikel.created_at as tanggal,profile.nama as namauser")
						->get();
						
     $taggings= Tag::join("tagging","tagging.id_tag","=","tag.id")
	                  ->where("tagging.tipe","=","artikel")
	                  ->select("tag.nama as nama","tagging.id_tulisan as id")->get();
					  $artikel=Artikel::where("id_user","=",Auth::id())->selectRaw("count(*) as jumlah")->first();
	                  Profile::where("id_user","=",Auth::id())->update(array("posts"=>$artikel->jumlah));
	   $this->getBreadcrumbs(array("Home"=>"/home","My Thread"=>""));
		$this->layout->content=View::make("backend.thread.index",array("artikels"=>$artikels,"taggings"=>$taggings));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	   $this->setTitle("New Thread");
	   $this->getBreadcrumbs(array("Home"=>"/home","New Thread"=>""));
	   $kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","thread")->get();
	   $tags=Tag::orderBy("nama","asc")->get();
		$this->layout->content=View::make("backend.thread.create",
											array("kategoris"=>$kategoris,
											       "tags"=>$tags));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->layout=null;
		$rule=array(
		 "judul"=>"required",
		 "isi"=>"required",
		 "kategori"=>"required",
		 "tag"=>"required"
		);
		 
		$messages=array("required"=>" :attribute tidak boleh kosong",
		                  "filePhoto.required"=>"Cover Foto tidak boleh kosong");
		$validator=Validator::make(Input::all(),$rule,$messages);
		if($validator->fails())
		 {
		 return Redirect::back()->withErrors($validator)->withInput();
		 }
	   else
		 {
		 $artikel=new Artikel();
		 $artikel->judul=$this::getJudul(Input::get("judul"));
		 if(Input::get("foto-artikel")!=""||Input::get("foto-artikel")!=null)
		  $format="<p><img class='img-responsive' src='".URL::to(Input::get("foto-artikel"))."'></p>";
	      else
			  $format="";
		  $artikel->isi=$format.Input::get("isi");
		 $artikel->id_user=Auth::id();
		 $artikel->id_kategori=Input::get("kategori");
		 
		    if($artikel->save())
			   {
                   $profile=Profile::where("id_user","=",Auth::id())->increment('posts');
				   Profile::where("id_user","=",Auth::id())->increment("poin",2);
			   foreach(Input::get("tag") as $tag)
			   {
				 $tagging=new Tagging();
				 $tagging->id_tag=$tag;
				 $tagging->id_tulisan=$artikel->id;
				 $tagging->tipe="artikel";
				 $tagging->save();
				  
				 }
				 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Tambahkan");
			   }
		 } 
		 return Redirect::back()->with("error",Input::get("judul")." Gagal di Tambahkan");
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
	   
		
		
		$artikel= Artikel::where("id","=",$id)->where("id_user","=",Auth::id())->first();
        $tag=Tag::all();
		$tagging=new Tagging();
		$tagging=$tagging->getRelationTagging($id);
		$kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","thread")->get();
		$this->setTitle($artikel->judul);
		 $this->getBreadcrumbs(array("Home"=>"/home","Thread"=>"/home/thread","Edit ".$artikel->judul.""=>""));
		$this->layout->content=View::make("backend.thread.update",
		      array("artikel"=>$artikel,"tags"=>$tag,"tagging"=>$tagging
			 ,"kategoris"=>$kategoris));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
$this->layout=null;
		$rule=array(
		 "judul"=>"required",
		 "isi"=>"required",
		 "kategori"=>"required",
		 "tag"=>"required"
		);
		 
		$messages=array("required"=>" :attribute tidak boleh kosong");
		$validator=Validator::make(Input::all(),$rule,$messages);
		if($validator->fails())
		 {
		 return Redirect::back()->withErrors($validator)->withInput();
		 }
	else
		 {
			 
		 $artikel= Artikel::find($id);
		 $artikel->judul=$this::getJudul(Input::get("judul"));
		   if(Input::get("foto-artikel")!=""||Input::get("foto-artikel")!=null)
		  $format="<p><img class='img-responsive' src='".URL::to(Input::get("foto-artikel"))."'></p>";
	      else
			  $format="";
		  $artikel->isi=$format.Input::get("isi");
		 $artikel->id_kategori=Input::get("kategori");
		 $artikel->id_user=Auth::id();
		    if($artikel->save())
			   {
               $tagging=Tagging::where("id_tulisan","=",$id)->where("tipe","=","artikel")->delete();
			   foreach(Input::get("tag") as $tag)
			   {
				 $tagging=new Tagging();
				 $tagging->id_tag=$tag;
				 $tagging->id_tulisan=$artikel->id;
				 $tagging->tipe="artikel";
				 $tagging->save();
				  
				 }
				 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Perbarui");
			   }
		 } 
		 return Redirect::back()->with("error",Input::get("judul")." Gagal di Perbarui");	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{    
		$this->layout=null;
	   $DBTips= Artikel::find($id)->delete();
	   $tagging=Tagging::where("id_tulisan","=",$id)
	                   ->where("tipe","=","artikel")->delete();
	    $komentar=Newkomentar::
		                  join("notification","notification.id_komentar","=","komentar.id")
						->where("komentar.id_tulisan","=",$id)->delete();
						
	   if($DBTips)
	   {  
          $profile=Profile::where("id_user","=",Auth::id())->decrement('posts');
		  Profile::where("id_user","=",Auth::id())->decrement("poin",2);
          return Redirect::back()->with('success',"Berhasil Di Delete");
	   }
	   else
	       return Redirect::back()->with('error',"Berhasil Di Delete");
	}
	public function setTitle($title){
		return $this->layout->title="ATTACK - ".$title;
	}
	public function getBreadcrumbs($isi){
	 $this->layout->breadcrumbs=$isi;
	}

   public  static function setTahun($str){
	 $date=new DateTime($str);
   return $date->format("Y");
   }
   public function showThread($tahun,$id,$judul){
	
	   $this->layout=null;
	 $url="/thread/".$tahun."/".$id."/".$judul;
	$judul=$this->getJudul($judul);
	$artikel=Artikel::where("artikel.id","=",$id)
	                        ->Orwhere("judul","like","%$judul%")
							->Orwhere("judul","like","$judul%")
							->Orwhere("judul","like","%$judul")
					 ->join("kategori","kategori.id","=","artikel.id_kategori")
					  ->selectRaw("artikel.id as id, artikel.id_user as id_user ,
					  artikel.judul as judul, artikel.isi as isi, 
					  artikel.photo as photo,artikel.created_at as created_at, 
					  artikel.updated_at as updated_at, kategori.nama as nama_kategori, kategori.id as id_kategori")
					 ->first();	
		Artikel::where("artikel.id","=",$id)
	                 ->where("judul","like","%".$judul."%")->increment("viewer",1);
	$tags=Tagging::where("id_tulisan","=",$artikel->id)->where("tipe","=","artikel")
	               ->join("tag","tag.id","=","tagging.id_tag")->get();	
	$komentars=Newkomentar::join("profile","profile.id_user","=","komentar.id_user")
	                    ->where("id_tulisan","=",$artikel->id)->orderBy("komentar.created_at","asc")
						->selectRaw("
						komentar.created_at as created_at,
						komentar.updated_at as updated_at,
						komentar.isi, komentar.id as id,
						profile.posts, profile.nama, 
						profile.created_at as profile_created_at, profile.photo
						
						")->paginate(10);
			$profile=Profile::where("id_user","=",$artikel->id_user)->first();
$rating=Rating::where("tipe","=","artikel")
								     ->where("id_tulisan","=",$artikel->id)
								     ->selectRaw("sum(jumlah) as jumlah, count(*) as votes, (sum(jumlah)/count(*)) as rata_")->first();

	if(Agent::isMobile())
	{		
       $content=View::make("frontend.thread.mcontent",array("artikel"=>$artikel,"profile"=>$profile,"url"=>$url,"komentars"=>$komentars,"rating"=>$rating,"tags"=>$tags))->render();
	}else{
    $content=View::make("frontend.thread.content",array("artikel"=>$artikel,"profile"=>$profile,"url"=>$url,"komentars"=>$komentars,"rating"=>$rating,"tags"=>$tags))->render();		
		
	}	
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Smart Moms"=>"/smart")));
	
	   
   }
   
   public function showAllThread(){
	$artikels=Artikel::join("kategori","kategori.id","=","artikel.id_kategori")
	                   ->orderBy("artikel.created_at","desc")
					   ->selectRaw("artikel.id as id, artikel.isi as isi,
 					   artikel.judul as judul, kategori.nama as kategori, artikel.created_at as tanggal, artikel.photo as photo, kategori.small_image as small_image")
						->paginate(10);
     $taggings= Tag::join("tagging","tagging.id_tag","=","tag.id")
	                  ->where("tagging.tipe","=","artikel")
	                  ->select("tag.nama as nama","tagging.id_tulisan as id")->get();	   
			 
			   
    $content=View::make("frontend.thread.all",array("artikels"=>$artikels,"taggings"=>$taggings))->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Smart Moms"=>"/smart","All Thread"=>"")));
	
   }   
   
   public function showKategori($judul){


		$hothread=Artikel::
		                                 join("kategori","kategori.id","=","artikel.id_kategori")
										  ->where("kategori.nama","like","%".$this::getJudul($judul)."%")
										  ->Orwhere("kategori.nama","like",$this::getJudul($judul)."%")
										  ->Orwhere("kategori.nama","like","%".$this::getJudul($judul))
		                                 ->orderBy("created_at","desc")
										 ->selectRaw("artikel.judul as judul, artikel.id as id, artikel.created_at as created_at, kategori.small_image as small_image")->paginate(10);
		$breadcrumbs=array("Home"=>"/","Smart Moms"=>"/smart",urldecode($judul)=>"");
		  $content=View::make("frontend.smartmom.content",array("hothreads"=>$hothread,"kategori"=>urldecode($judul)))->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>$breadcrumbs,"kategori"=>urldecode($judul)));	   
	   
	   
   }
   
   
   public function search($judul){
	   $judul=Input::get("search");
	$artikels=Artikel::join("kategori","kategori.id","=","artikel.id_kategori")
	                   ->where("artikel.judul","like","%".$this::getJudul($judul)."%")
	                   ->orderBy("artikel.created_at","desc")
					   ->selectRaw("artikel.id as id, artikel.isi as isi,
 					   artikel.judul as judul, kategori.nama as kategori, artikel.created_at as tanggal, artikel.photo as photo")
						->paginate(10);
     $taggings= Tag::join("tagging","tagging.id_tag","=","tag.id")
	                  ->where("tagging.tipe","=","artikel")
	                  ->select("tag.nama as nama","tagging.id_tulisan as id")->get();	   
			 
			   
    $content=View::make("frontend.thread.all",array("artikels"=>$artikels,"taggings"=>$taggings,"breadcrumbs"=>array("Home"=>"/","Smart Moms"=>"/smart",$this::getJudul($judul)=>"")))->render();
	 return View::make('layout.main',array("content"=>$content));	   
	   
	   
   }   
   
   public static function getArtikel(){
	
	$artikels=Artikel::join("kategori","kategori.id","=","artikel.id_kategori")
	                   ->orderBy("artikel.created_at","desc")
					   ->selectRaw("artikel.id as id, artikel.isi as isi,
 					   artikel.judul as judul, kategori.nama as kategori, artikel.created_at as tanggal, artikel.photo as photo")
						->limit(6)->get();
        
    return $artikels;   
	   
	   
   }     
   public function showTag($judul){
	$artikels=Artikel::join("kategori","kategori.id","=","artikel.id_kategori")
	                   ->join("tagging","tagging.id_tulisan","=","artikel.id")
					   ->join("tag","tagging.id_tag","=","tag.id")
	                   ->where("tag.nama","like","%".$this::getJudul($judul)."%")
	                   ->orderBy("artikel.created_at","desc")
					   ->selectRaw("artikel.id as id, artikel.isi as isi,
 					   artikel.judul as judul, kategori.nama as kategori, artikel.created_at as tanggal, artikel.photo as photo")
						->paginate(10);
     $taggings= Tag::join("tagging","tagging.id_tag","=","tag.id")
	                  ->where("tagging.tipe","=","artikel")
	                  ->select("tag.nama as nama","tagging.id_tulisan as id")->get();	   
			 
			   
    $content=View::make("frontend.thread.all",array("artikels"=>$artikels,"taggings"=>$taggings,"breadcrumbs"=>array("Home"=>"/","Smart Moms"=>"/smart",$this::getJudul($judul)=>"")))->render();
	 return View::make('layout.main',array("content"=>$content));	   
	   
	   
   }
      
   
   public static function getURL($judul){
	  /*  return preg_replace("/[^0-9a-zA-Z_]/", "_", $judul); */
	  return urlencode ($judul);
   }   
   public static function getJudul($judul){
	
	  /*  return preg_replace("/[^0-9a-zA-Z]/", " ",$judul); */
	  return urldecode($judul);
   }
   
   public static function getDesc($desc){
	 $regex = '#<img([^>]*) src="([^"/]*/?[^".]*\.[^"]*)"([^>]*)>((?!</a>))#';
      $replace = '';
return preg_replace($regex, $replace, $desc);
	   
   }
   
}

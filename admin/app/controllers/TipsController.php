<?php

class TipsController extends \BaseController {

	
	 protected $restful=true;
	 protected $client="ATTACK- Admin";
	 protected $layout="backend.layouts.main";


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */	 
	 public function index(){
		 
		 $data=Tips::join("kategori","kategori.id","=","tips.id_kategori")
				    ->where("kategori.tipe","=","tips")
				   ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
								->orderBy("tips.created_at","desc")->get();
		 $this->layout->title=$this->client."-Tips";
	     $this->layout->content=View::make("backend.tips.index",array("data"=>$data));  
	 }
	 
	

	
	
    public function deleteAction(){
	$this->layout->title=$this->client."";
	}

	 /* =======================
	     this is function using delete 
		=======================*/
	 public function delete($id){
       
	   $DBTips=new Tips();
       $kondisi=$DBTips->where("id",$id)->delete();
	   $tagging=Tagging::where("id_tulisan","=",$id)
	                   ->where("tipe","=","tips")->delete();
	   $this->layout->title=$this->client."-Tips";
	   if($kondisi)
	      return Redirect::to("/panel/tips")->with('success',"Berhasil Di Delete");
	   else
	       return Redirect::to("/panel/tips")->with('error',"Berhasil Di Delete");
	} 
	 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	  $this->layout->title=$this->client." Menambahkan Tips";
	  $tags=Tag::orderBy("nama","asc")->get();
	  $kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","tips")->get();
      $this->layout->content=View::make("backend.tips.insert",array("tags"=>$tags,"kategoris"=>$kategoris));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	$this->layout=null;
    $rules=array("judul"=>"required",
	             "kategori"=>"required",
				 "tag"=>"required",
				 "isi"=>"required",
				 "filePhoto"=>"required",
				 "desc"=>"required");
     $messages=array("required"=>":attribute Tidak Boleh Kosong");
    $validator=Validator::make(Input::all(),$rules,$messages);	
     if($validator->fails()){
	    return Redirect::back()->withErrors($validator);
	 }else{
	   $tips=new Tips();
	   $tips->judul=Input::get("judul");
	   $tips->id_kategori=Input::get("kategori");
	   $tips->isi=e(Input::get("isi"));
	   $tips->photo=Input::get("filePhoto");
	   $tips->id_user=Auth::id();
	   $tips->desc=Input::get("desc");
	   if($tips->save())
	   {
	   
	   foreach(Input::get("tag") as $tag)
	   {
	     $tagging=new Tagging();
		 $tagging->id_tag=$tag;
		 $tagging->id_tulisan=$tips->id;
		 $tagging->tipe="tips";
		 $tagging->save();
		  
		 }
		 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Simpan");
	   }
	   
	 }
	 return Redirect::back()->with("error",Input::get("judul")." Gagal di Simpan");


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data= Tips::find($id);
		if(isset($data))
		{
		$this->layout->title=$this->client."Tips - ".$data->nama;
		$this->layout->content=View::make("backend.tips.view",array("data"=>$data));
		}
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tips= Tips::where("id","=",$id)->first();
        $tag=Tag::all();
		$tagging=new Tagging();
		$tagging=$tagging->getRelationTagging($id);
		$kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","tips")->get();
			$this->layout->title=$this->client."Tips - ".$tips->judul;
			$this->layout->content=View::make("backend.tips.update",array("tips"=>$tips,"tags"=>$tag,"tagging"=>$tagging
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
    $rules=array("judul"=>"required",
	             "kategori"=>"required",
				 "tag"=>"required",
				 "isi"=>"required",
				 "filePhoto"=>"required",
				 "desc"=>"required");
     $messages=array("required"=>":attribute Tidak Boleh Kosong");
    $validator=Validator::make(Input::all(),$rules,$messages);	
     if($validator->fails()){
	    return Redirect::back()->withErrors($validator);
	 }else{
	   $tips= Tips::find($id);
	   $tips->judul=Input::get("judul");
	   $tips->id_kategori=Input::get("kategori");
	   $tips->isi=e(Input::get("isi"));
	   $tips->photo=Input::get("filePhoto");
	   $tips->desc=Input::get("desc");
	   if($tips->save())
	   {
	    $tagging=Tagging::where("id_tulisan","=",$id)->where("tipe","=","tips")->delete();
	   foreach(Input::get("tag") as $tag)
	   {
	     $tagging=new Tagging();
		 $tagging->id_tag=$tag;
		 $tagging->id_tulisan=$tips->id;
		 $tagging->tipe="tips";
		 $tagging->save();
		  
		 }
		 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Update");
	   }
	   
	 }
	 return Redirect::back()->with("error",Input::get("judul")." Gagal di Update");
	}
/*=============================
  function delete all message selected
===============================
*/
	public function deleteallAction(){
	if(Input::method("POST"))
	{
	$this->layout=null;
	 $DBTips=new Tips();
     $arrayData=Input::get("post");
	 foreach($arrayData as $id){
	 $tagging=Tagging::where("id_tulisan","=",$id)
	                   ->where("tipe","=","tips")->delete();
	 $DBTips->where("id",$id)->delete();
	 }
	 $data=$DBTips->get();

	 echo json_encode($data);
	}
	} 

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	
	}
		 
	public function indexAction()
	{
	    $DBTips=new Tips();
	    $data=$DBTips->get();
        $this->layout->title=$this->client."-Tips";
	    $this->layout->content=View::make("backend.tips.index",array("data"=>$data));  
	}
	
	
	 public function indexBatik(){
		 $data=Tips::join("kategori","kategori.id","=","tips.id_kategori")
				    ->where("kategori.tipe","=","batik")
				   ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
								->orderBy("tips.created_at","desc")->get();
		 $this->layout->title=$this->client."-Batik";
	     $this->layout->content=View::make("backend.batik.index",array("data"=>$data));  
	 }	 
	 	public function createBatik()
	{

	  $this->layout->title=$this->client." Menambahkan Tips";
	  $tags=Tag::orderBy("nama","asc")->get();
	  $kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","batik")->get();
      $this->layout->content=View::make("backend.batik.insert",array("tags"=>$tags,"kategoris"=>$kategoris));
	}


public function storeBatik()
	{
	$this->layout=null;
    $rules=array("judul"=>"required",
				 "isi"=>"required",
				 "filePhoto"=>"required",
				 "desc"=>"required");
     $messages=array("required"=>":attribute Tidak Boleh Kosong");
    $validator=Validator::make(Input::all(),$rules,$messages);	
     if($validator->fails()){
	    return Redirect::back()->withErrors($validator);
	 }else{
	   $tips=new Tips();
	   $tips->judul=Input::get("judul");
	   $tips->id_kategori="0";
	   $tips->isi=e(Input::get("isi"));
	   $tips->photo=Input::get("filePhoto");
	   $tips->id_user=Auth::id();
	   $tips->desc=Input::get("desc");
	   if($tips->save())
	   {
	  
		 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Simpan");
	   }
	   
	 }
	 return Redirect::back()->with("error",Input::get("judul")." Gagal di Simpan");


	}
public function updateBatik($id)
	{
	$this->layout=null;
    $rules=array("judul"=>"required",
				 "isi"=>"required",
				 "filePhoto"=>"required",
				 "desc"=>"required");
     $messages=array("required"=>":attribute Tidak Boleh Kosong");
    $validator=Validator::make(Input::all(),$rules,$messages);	
     if($validator->fails()){
	    return Redirect::back()->withErrors($validator);
	 }else{
	   $tips= Tips::find($id);
	   $tips->judul=Input::get("judul");
	   $tips->id_kategori=0;
	   $tips->isi=e(Input::get("isi"));
	   $tips->photo=Input::get("filePhoto");
	   $tips->desc=Input::get("desc");
	   if($tips->save())
	   {
	    
	
		 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Update");
	   }
	   
	 }
	 return Redirect::back()->with("error",Input::get("judul")." Gagal di Update");
	}	
	public function ediBatik($id)
	{
		$tips= Tips::where("id","=",$id)->first();
        $tag=Tag::all();
		$tagging=new Tagging();
		$tagging=$tagging->getRelationTagging($id);
		$kategoris=Kategori::orderBy("nama","asc")->whre("tipe","=","batik")->get();
			$this->layout->title=$this->client."Tips - ".$tips->judul;
			$this->layout->content=View::make("backend.tips.update",array("tips"=>$tips,"tags"=>$tag,"tagging"=>$tagging
			 ,"kategoris"=>$kategoris));
			
	}	
 public function deleteBatik($id){
       
	   $DBTips=new Tips();
       $kondisi=$DBTips->where("id",$id)->delete();
	   $tagging=Tagging::where("id_tulisan","=",$id)
	                   ->where("tipe","=","tips")->delete();
	   $this->layout->title=$this->client."-Tips";
	   if($kondisi)
	      return Redirect::to("/panel/batik")->with('success',"Berhasil Di Delete");
	   else
	       return Redirect::to("/panel/batik")->with('error',"Berhasil Di Delete");
	} 
	
		public function editBatik($id)
	{
		$tips= Tips::where("id","=",$id)->first();
        $tag=Tag::all();
		$tagging=new Tagging();
		$tagging=$tagging->getRelationTagging($id);
		$kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","batik")->get();
			$this->layout->title=$this->client."Tips - ".$tips->judul;
			$this->layout->content=View::make("backend.batik.update",array("tips"=>$tips,"tags"=>$tag,"tagging"=>$tagging
			 ,"kategoris"=>$kategoris));
			
	}
	
	
/*======================================/ /======================================================*/	

	
	 public function indexLaundryguide(){
		 $data=Tips::join("kategori","kategori.id","=","tips.id_kategori")
				    ->where("kategori.tipe","=","laundryguide")
				   ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
								->orderBy("tips.created_at","desc")->get();
		 $this->layout->title=$this->client."-Batik";
	     $this->layout->content=View::make("backend.laundryguide.index",array("data"=>$data));  
	 }	 
	 	public function createLaundryguide()
	{

	  $this->layout->title=$this->client." Menambahkan Tips";
	  $tags=Tag::orderBy("nama","asc")->get();
	  $kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","laundryguide")->get();
      $this->layout->content=View::make("backend.laundryguide.insert",array("tags"=>$tags,"kategoris"=>$kategoris));
	}


public function storeLaundryguide()
	{
	$this->layout=null;
    $rules=array("judul"=>"required",
				 "isi"=>"required",
				 "filePhoto"=>"required",
				 "kategori"=>"required",
				 "desc"=>"required");
     $messages=array("required"=>":attribute Tidak Boleh Kosong");
    $validator=Validator::make(Input::all(),$rules,$messages);	
     if($validator->fails()){
	    return Redirect::back()->withErrors($validator);
	 }else{
	   $tips=new Tips();
	   $tips->judul=Input::get("judul");
	   $tips->id_kategori=Input::get("kategori");
	   $tips->isi=e(Input::get("isi"));
	   $tips->photo=Input::get("filePhoto");
	   $tips->id_user=Auth::id();
	   $tips->desc=Input::get("desc");
	   if($tips->save())
	   {
	  
		 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Simpan");
	   }
	   
	 }
	 return Redirect::back()->with("error",Input::get("judul")." Gagal di Simpan");


	}
	
public function updateLaundryguide($id)
	{
	$this->layout=null;
    $rules=array("judul"=>"required",
	             "kategori"=>"required",
				 "isi"=>"required",
				 "filePhoto"=>"required",
				 "desc"=>"required");
     $messages=array("required"=>":attribute Tidak Boleh Kosong");
    $validator=Validator::make(Input::all(),$rules,$messages);	
     if($validator->fails()){
	    return Redirect::back()->withErrors($validator);
	 }else{
	   $tips= Tips::find($id);
	   $tips->judul=Input::get("judul");
	   $tips->id_kategori=Input::get("kategori");
	   $tips->isi=e(Input::get("isi"));
	   $tips->photo=Input::get("filePhoto");
	   $tips->desc=Input::get("desc");
	   if($tips->save())
	   {
		 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Update");
	   }
	   
	 }
	 return Redirect::back()->with("error",Input::get("judul")." Gagal di Update");
	}

	
 public function deleteLaundryguide($id){
       
	   $DBTips=new Tips();
       $kondisi=$DBTips->where("id",$id)->delete();
	   $tagging=Tagging::where("id_tulisan","=",$id)
	                   ->where("tipe","=","laundryguide")->delete();
	   $this->layout->title=$this->client."-Tips";
	   if($kondisi)
	      return Redirect::to("/panel/laundryguide")->with('success',"Berhasil Di Delete");
	   else
	       return Redirect::to("/panel/laundryguide")->with('error',"Berhasil Di Delete");
	} 
	
		public function editLaundryguide($id)
	{
		$tips= Tips::where("id","=",$id)->first();
        $tag=Tag::all();
		$tagging=new Tagging();
		$tagging=$tagging->getRelationTagging($id);
		$kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","laundryguide")->get();
			$this->layout->title=$this->client."Tips - ".$tips->judul;
			$this->layout->content=View::make("backend.laundryguide.update",array("tips"=>$tips,"tags"=>$tag,"tagging"=>$tagging
			 ,"kategoris"=>$kategoris));
			
	}
	
	

	
	
	
	 public function indexPromoevent(){
		 $data=Tips::join("kategori","kategori.id","=","tips.id_kategori")
				    ->where("kategori.tipe","=","promodanevent")
				   ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
								->orderBy("tips.created_at","desc")->get();
		 $this->layout->title=$this->client."-Batik";
	     $this->layout->content=View::make("backend.promoevent.index",array("data"=>$data));  
	 }	 
	 	public function createPromoevent()
	{

	  $this->layout->title=$this->client." Menambahkan Tips";
	  $tags=Tag::orderBy("nama","asc")->get();
	  $kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","promoevent")->get();
      $this->layout->content=View::make("backend.promoevent.insert",array("tags"=>$tags,"kategoris"=>$kategoris));
	}


public function storePromoevent()
	{
	$this->layout=null;
    $rules=array("judul"=>"required",
				 "isi"=>"required",
				 "filePhoto"=>"required",
				 "desc"=>"required");
     $messages=array("required"=>":attribute Tidak Boleh Kosong");
    $validator=Validator::make(Input::all(),$rules,$messages);	
     if($validator->fails()){
	    return Redirect::back()->withErrors($validator);
	 }else{
	   $tips=new Tips();
	   $tips->judul=Input::get("judul");
	   $tips->id_kategori="20";
	   $tips->isi=e(Input::get("isi"));
	   $tips->photo=Input::get("filePhoto");
	   $tips->id_user=Auth::id();
	   $tips->desc=Input::get("desc");
	   if($tips->save())
	   {
	  
		 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Simpan");
	   }
	   
	 }
	 return Redirect::back()->with("error",Input::get("judul")." Gagal di Simpan");


	}
	
public function updatePromoevent($id)
	{
	$this->layout=null;
    $rules=array("judul"=>"required",
				 "isi"=>"required",
				 "filePhoto"=>"required",
				 "desc"=>"required");
     $messages=array("required"=>":attribute Tidak Boleh Kosong");
    $validator=Validator::make(Input::all(),$rules,$messages);	
     if($validator->fails()){
	    return Redirect::back()->withErrors($validator);
	 }else{
	   $tips= Tips::find($id);
	   $tips->judul=Input::get("judul");
	   $tips->id_kategori="20";
	   $tips->isi=e(Input::get("isi"));
	   $tips->photo=Input::get("filePhoto");
	   $tips->desc=Input::get("desc");
	   if($tips->save())
	   {
		 return Redirect::back()->with("success",Input::get("judul")." Berhasil di Update");
	   }
	   
	 }
	 return Redirect::back()->with("error",Input::get("judul")." Gagal di Update");
	}

	
 public function deletePromoevent($id){
       
	   $DBTips=new Tips();
       $kondisi=$DBTips->where("id",$id)->delete();
	   $tagging=Tagging::where("id_tulisan","=",$id)
	                   ->where("tipe","=","promodanevent")->delete();
	   $this->layout->title=$this->client."-Tips";
	   if($kondisi)
	      return Redirect::to("/panel/promoevent")->with('success',"Berhasil Di Delete");
	   else
	       return Redirect::to("/panel/promoevent")->with('error',"Berhasil Di Delete");
	} 
	
		public function editPromoevent($id)
	{
		$tips= Tips::where("id","=",$id)->first();
        $tag=Tag::all();
		$tagging=new Tagging();
		$tagging=$tagging->getRelationTagging($id);
		$kategoris=Kategori::orderBy("nama","asc")->where("tipe","=","promodanevent")->get();
			$this->layout->title=$this->client."Tips - ".$tips->judul;
			$this->layout->content=View::make("backend.promoevent.update",array("tips"=>$tips,"tags"=>$tag,"tagging"=>$tagging
			 ,"kategoris"=>$kategoris));
			
	}
	
	
	
}

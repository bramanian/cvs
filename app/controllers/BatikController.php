<?php

class BatikController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	public function getIndex(){
	
		$tips=Tips::join("kategori","kategori.id","=","tips.id_kategori")
				    ->where("kategori.tipe","=","batik")
				   ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
								->orderBy("tips.created_at","desc")->paginate(11);
	if(Agent::isMobile())
	{		
        $content=View::make("frontend.batik.mcontent",array("tips"=>$tips))->render();
	}else{
		$content=View::make("frontend.batik.content",array("tips"=>$tips))->render();
	}
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Attack Zone"=>"/zone","Love Batik"=>"")));		
	
	}

    public static function getTaggig($tag){
		return Tagging::join("tag","tag.id","=","tagging.id_tag")
		                ->where("tagging.tipe","=","tips")
						->where("tagging.id_tulisan","=",$tag)
						->selectRaw("tag.nama as nama")
						->get();
		
	}
	
   public function showTips($tahun,$id,$judul){
	
	   $this->layout=null;
	 $url="/thread/".$tahun."/".$id."/".$judul;
	$judul=ArtikelController::getJudul($judul);
	 $tips=Tips::where("tips.id","=",$id)
					 ->join("kategori","kategori.id","=","tips.id_kategori")
					 ->where("kategori.tipe","=","batik")
					  ->selectRaw("tips.id as id, tips.id_user as id_user ,
					  tips.judul as judul, tips.isi as isi, 
					  tips.photo as photo,tips.created_at as created_at, 
					  tips.updated_at as updated_at, kategori.nama as nama_kategori, 
					  kategori.small_image, kategori.large_image, kategori.id as idkategori")
					 ->first();	
					 
	 
	 //$tips=Tips::where("tips.id","=",$id)->first();

	 Tips::where("tips.id","=",$id)
	                 ->where("judul","like","%".$judul."%")->increment("viewer",1);
	$tags=Tagging::where("id_tulisan","=",$tips->id)->where("tipe","=","batik")
	               ->join("tag","tag.id","=","tagging.id_tag")->get();	
     $content=View::make("frontend.batik.contentshow",array("tips"=>$tips,"tags"=>$tags))->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Attack Zone"=>"/zone","Love Batik"=>"/batik")));
   }	
   
      public static  function getTipsRelated($id){
	

	
	 return Tips::join("kategori","kategori.id","=","tips.id_kategori")
					 ->where("kategori.tipe","=","batik")
					 ->where("kategori.id","=",0)
					  ->selectRaw("tips.id as id, tips.id_user as id_user ,
					  tips.judul as judul, tips.isi as isi, 
					  tips.photo as photo,tips.created_at as created_at, 
					  tips.updated_at as updated_at, kategori.nama as nama_kategori, 
					  kategori.small_image, kategori.large_image, kategori.id as idkategori")
					  ->orderBy(DB::raw('RAND()'))->limit(2)->get();
	  
	  
	  }
   
   
   
   public function showTag($judul){
	$tips=Tips::join("kategori","kategori.id","=","tips.id_kategori")
	                   ->join("tagging","tagging.id_tulisan","=","tips.id")
					   ->join("tag","tagging.id_tag","=","tag.id")
					   ->groupBy("tips.id")
	                   ->where("tag.nama","like","%".ArtikelController::getJudul($judul)."%")
	                   ->orderBy("tips.created_at","desc")
					   ->selectRaw("tips.id as id, tips.isi as isi,
 					   tips.judul as judul, kategori.nama as kategori, tips.created_at as tanggal, tips.photo as photo")
						->paginate(10);						
   
			 
			   
    $content=View::make("frontend.smarttips.all",array("tips"=>$tips))->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Attack Zone"=>"/zone","Batik"=>"/batik",ArtikelController::getJudul($judul)=>"")));	
   }
   
   public static function getTag($id){
	     return Tag::join("tagging","tagging.id_tag","=","tag.id")
	                  ->where("tagging.tipe","=","tips")
					   ->where("tagging.id_tulisan","like",$id)
	                  ->select("tag.nama as nama","tagging.id_tulisan as id")->get();	   
			 
	   
   }
   
      public static function getTipsAny(){
	   
	$tips=Tips::orderBy("created_at","desc")->limit(10)->get();	
        
    return $tips;   
	   
	   
   }    
   
   
      public static function getTips(){
	   
	$tips=Tips::orderBy("created_at","desc")->limit(6)->get();	
        
    return $tips;   
	   
	   
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
		//
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public static function getHotTagging(){
		
		return Tag::join("tagging","tagging.id_tag","=","tag.id")
		               ->where("tipe","=","batik")->groupBy("tagging.id_tag")->selectRaw("tagging.id_tag as id, tag.nama as nama, count(*) as jumlah")->orderBy("jumlah","desc")->limit(3)->get();
	}
}

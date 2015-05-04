<?php

class PromoeventController extends \BaseController {

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
				    ->where("kategori.tipe","=","promodanevent")
				   ->selectRaw("tips.id as id,
				                tips.photo as photo,
				                tips.judul as judul,
								tips.desc as tipsdesc,
								tips.isi as isi,
								tips.created_at as created_at,
								kategori.nama as namakategori, kategori.nama as nama_kategori,kategori.small_image, kategori.large_image")
								->orderBy("tips.created_at","desc")->paginate(10);
							
	if(Agent::isMobile())
	{		
    $content=View::make("frontend.promoevent.mcontent",array("tips"=>$tips))->render();
	}else{
	$content=View::make("frontend.promoevent.content",array("tips"=>$tips))->render();
	}
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Attack Zone"=>"/zone", "Promo & Event"=>"")));
	
	}


	
   public function showTips($tahun,$id,$judul){
	
	   $this->layout=null;
	 $url="/thread/".$tahun."/".$id."/".$judul;
	$judul=ArtikelController::getJudul($judul);
	 $tips=Tips::where("tips.id","=",$id)
					 ->join("kategori","kategori.id","=","tips.id_kategori")
					 ->where("kategori.tipe","=","promodanevent")
					  ->selectRaw("tips.id as id, tips.id_user as id_user ,
					  tips.judul as judul, tips.isi as isi, 
					  tips.photo as photo,tips.created_at as created_at, 
					  tips.updated_at as updated_at, kategori.nama as nama_kategori, 
					  kategori.small_image, kategori.large_image, kategori.id as idkategori")
					 ->first();	
			

	 Tips::where("tips.id","=",$id)
	                 ->where("judul","like","%".$judul."%")->increment("viewer",1);

     $content=View::make("frontend.promoevent.contentshow",array("tips"=>$tips))->render();				   
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","Attack Zone"=>"/zone","Promo & Event"=>"/promoevent")));

   }	
   
      public static  function getTipsRelated($id){
	

	
	 return Tips::join("kategori","kategori.id","=","tips.id_kategori")
					 ->where("kategori.tipe","=","promodanevent")
					 ->selectRaw("tips.id as id, tips.id_user as id_user ,
					  tips.judul as judul, tips.isi as isi, 
					  tips.photo as photo,tips.created_at as created_at, 
					  tips.updated_at as updated_at, kategori.nama as nama_kategori, 
					  kategori.small_image, kategori.large_image, kategori.id as idkategori")
					  ->orderBy(DB::raw('RAND()'))->limit(3)->get();
	  
	  
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
		               ->where("tipe","=","tips")->groupBy("tagging.id_tag")->selectRaw("tagging.id_tag as id, tag.nama as nama, count(*) as jumlah")->orderBy("jumlah","desc")->limit(3)->get();
	}


}

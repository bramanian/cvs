<?php

class SmartController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout="layout.main";
	public function getIndex()
	{

		$hothread=Artikel::
		                                 join("kategori","kategori.id","=","artikel.id_kategori")
		                                 ->orderBy("created_at","desc")
										 ->selectRaw("artikel.judul as judul, artikel.id as id, artikel.created_at as created_at, kategori.small_image as small_image")->paginate(10);
		$this->layout->breadcrumbs=array("Home"=>"/","Smart Moms"=>"");
		    $this->layout->content=View::make("frontend.smartmom.content",array("hothreads"=>$hothread))->render();
	 
	}

	 public function searchKategori($id)
	 {
		 
		 
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
		
	}
	public static function getHotTagging(){
		
		return Tag::join("tagging","tagging.id_tag","=","tag.id")
		               ->where("tipe","=","artikel")->groupBy("tagging.id_tag")->selectRaw("tagging.id_tag as id, tag.nama as nama, count(*) as jumlah")->orderBy("jumlah","desc")->limit(3)->get();
	}


}

<?php

class ZoneController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	protected $layout="layout.main";
	
	
	public function index()
	{
	
	}

	
	public function getIndex(){
	$this->layout->breadcrumbs=array("Home"=>"/","Attack Zone"=>"");
	if(Agent::isMobile())
	{
		$this->layout->content=View::make("frontend.attackzone.mcontent")->render();
	}else{
		$this->layout->content=View::make("frontend.attackzone.content")->render();
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


}

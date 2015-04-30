<?php

class KategoriController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 protected $restful=true;
	 protected $client="ATTACK- Admin";
	 protected $layout="backend.layouts.main";
	 
	public function index()
	{ $this->layout->title=$this->client;
	  $datakategoris= Kategori::orderBy("nama","asc")->get();
	  $datatags=Tag::all();
	  $this->layout->content=View::make("backend.kategori.index",array("datakategoris"=>$datakategoris,"datatags"=>$datatags))->render();
	  
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
		$pesan=array(
		  "id"=>"",
		  "nama"=>"",
		  "status"=>""
		);
		$this->layout=null;
		$kategori=new Kategori();
		$kategori->nama=Input::get("namakategori");
	    if($kategori->save())
		{
			$pesan["id"]=$kategori->id;
			$pesan["nama"]=Input::get("namakategori");
			$pesan["status"]="success";
		}else{
			$pesan["nama"]=Input::get("namakategori");
			$pesan["status"]="gagal";
			
		}
		echo json_encode($pesan);
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
	  
		$this->layout=null;
		if(Request::ajax())
		{   $pesan=array("success"=>"false");
			$rule=array("nama"=>"required");
			$message=array("required"=>"<li> :attribute tidak boleh kosong </li>");
			$validator=Validator::make(Input::all(),$rule,$message);
		if($validator->fails())
		{   
			 $pesan=$validator->messages();
			 echo json_encode($pesan);
			}else{
			   $kategori=Kategori::find($id);
			   $kategori->nama=Input::get("nama");
			   if($kategori->save())
			   {
			      echo json_encode(array("nama"=>"<li> ".Input::get("nama")." Berhasil di Perbarui",
								  "success"=>"true")
								  );
			   }else{
				echo json_encode(array("nama"=>"<li> ".Input::get("nama")." Gagal di Perbarui",
								  "success"=>"false")
								  );
				     }
		}
		}
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
		$this->layout=null;
		$pesan=array(""=>"false");
		if(Request::ajax()){
		if(Kategori::find($id)->delete())
	     $pesan["success"]="true";
		echo json_encode($pesan);
		}else{
		echo json_encode($pesan);
		}
	
	}


}

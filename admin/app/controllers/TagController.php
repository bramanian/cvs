<?php

class TagController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  echo "berhasil";
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

	 if(Request::ajax()){
	 $nama= Input::get("nama");
	 $tag=new Tag();
	 $tag->nama=$nama;
	 if($tag->save()){
			$pesan["id"]=$tag->id;
			$pesan["nama"]=Input::get("nama");
			$pesan["status"]="success";
		}else{
			$pesan["nama"]=Input::get("nama");
			$pesan["status"]="gagal";
			
		}
		echo json_encode($pesan);
	 
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
			   $tag=Tag::find($id);
			   $tag->nama=Input::get("nama");
			   if($tag->save())
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
		$pesan=array(""=>"false");
		if(Request::ajax()){
		if(Tag::find($id)->delete())
	      $pesan["success"]="true";
		echo json_encode($pesan);
		}else{
		   echo json_encode($pesan);
		}
	}


}

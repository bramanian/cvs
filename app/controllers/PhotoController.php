<?php

class PhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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

		$data=[
			"status"=>"fails",
			"nama"=>"",
			"url"=>""
			]; 
	 
		$rules=array("uploadfile"=>"image");
		$tipe=Input::get("tipe");
		$message=array("image"=>" :attribut harus jpeg, png");
		$validator=Validator::make(Input::all(),$rules,$message);
		if($validator->fails())
		  echo "format file salah";
		else{
		if(Input::hasFile("uploadfile"))
		{	 
		 
			$destinationPath = public_path().'/photo/'.$tipe."/";
			$file=Input::file("uploadfile");
			$nama=$file->getClientOriginalName();
			$extension=$file->getClientOriginalExtension();
			$namafileasli=str_replace(".".$extension,"",$nama);
			$namaRegex=str_replace(' ', '%20', $namafileasli);
			$namafileasli = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $namafileasli);
			$namafileasli = strtolower(trim($namafileasli, '-'));
			$namafileasli = preg_replace("/[\/_|+ -]+/", '_', $namafileasli);
			$namaFile=str_random(15).$namaRegex.str_random(5).".".$extension;
			$data=[
			"status"=>"success",
			"nama"=>$nama,
			"url"=>URL::to('/photo/')."/".$tipe."/".$namaFile,
			"value"=>"/photo/".$tipe."/".$namaFile
			]; 
			if(Input:: file( 'uploadfile' )-> move( $destinationPath,$namaFile))		
			echo json_encode($data);
			else{
			$data=[
			"status"=>"fails",
			"nama"=>$nama,
			"url"=>URL::to('/photo/')."/".$tipe."/".$namaFile,
			"value"=>"/photo/".$tipe."/".$namaFile
			]; 		
			echo json_encode($data);
			}
			
			
		
		}
	}
	}

public function uploadProfile(){
		$data=[
			"status"=>"fails",
			"nama"=>"",
			"url"=>""
			]; 
	 
		$rules=array("uploadfile"=>"image");
		$tipe=Input::get("tipe");
		$message=array("image"=>" :attribut harus jpeg, png");
		$validator=Validator::make(Input::all(),$rules,$message);
		if($validator->fails())
		  echo "format file salah";
		else{
		if(Input::hasFile("uploadfile"))
		{	 
		 
			$destinationPath = public_path().'/photo/'.$tipe."/";
			$file=Input::file("uploadfile");
			$nama=$file->getClientOriginalName();
			$extension=$file->getClientOriginalExtension();
			$namafileasli=str_replace(".".$extension,"",$nama);
			$namaRegex=str_replace(' ', '%20', $namafileasli);
			$namafileasli = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $namafileasli);
			$namafileasli = strtolower(trim($namafileasli, '-'));
			$namafileasli = preg_replace("/[\/_|+ -]+/", '_', $namafileasli);
			$namaFile=str_random(15).$namaRegex.str_random(5).".".$extension;
			$data=[
			"status"=>"success",
			"nama"=>$nama,
			"url"=>URL::to('/photo/')."/".$tipe."/".$namaFile,
			"value"=>"/photo/".$tipe."/".$namaFile
			]; 
			if(Input:: file( 'uploadfile' )-> move( $destinationPath,$namaFile))		
			{
				$updateuser=DB::table("profile")
				            ->where("id_user","=",Auth::id())
							->where("tipe","=","user")
							->update(array("photo"=>'/photo/'.$tipe."/".$namaFile));
			   if($updateuser)
			   {
				   echo json_encode($data);
				}else {
				$data=[
				"status"=>"fails",
				"nama"=>$nama,
				"url"=>URL::to('/photo/')."/".$tipe."/".$namaFile,
				"value"=>"/photo/".$tipe."/".$namaFile
				]; 					
				 echo json_encode($data);
				}
			}
			else{
			$data=[
			"status"=>"fails",
			"nama"=>$nama,
			"url"=>URL::to('/photo/')."/".$tipe."/".$namaFile,
			"value"=>"/photo/".$tipe."/".$namaFile
			]; 		
			echo json_encode($data);
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

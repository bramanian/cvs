<?php

class NotificationController extends \BaseController {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout="backend.layout.main";
    public function setBreadcrumbs($data){
		
		$this->layout->breadcrumbs=$data;
	}
	
	public function index()
	{
		$notification=Notification::where("to_","=",Auth::id())->orderBy("created_at","desc")->orderBy("read_","asc")->get();
		$this->setBreadcrumbs(array("Home"=>"/home","Notification"=>""));
		$this->layout->content=View::make("backend.notification.index",array("notifications"=>$notification))->render();
	}
	
public function showKomentar($id){



	$notification=Notification::where("id_komentar","=",$id)->update(array("read_"=>"1"));
	$notification=Notification::where("id_komentar","=",$id)->first();
	
  return Redirect::to($notification->url);

	
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
	      $content=View::make("frontend.komentar.postreply",array("id"=>$id,"judul"=>$judul,"url"=>$url))->render();
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
	  $content=View::make("frontend.komentar.contentreplay",array("id"=>$id,"judul"=>$judul,"komentar"=>$komentar,"url"=>$url,"page"=>$page))->render();
	 return View::make('layout.main',array("content"=>$content,"breadcrumbs"=>array("Home"=>"/","<span class='text-capitalize'>".$judul."</span>"=>$url,"Komentar"=>"")));
   }
   
   public static function getNotification(){
		
	    return Notification::where("to_","=",Auth::id())->where("read_","=","0")->limit(3)->get();
   }
   public static function getNumnotification(){
	   
	   return Notification::where("to_","=",Auth::id())->where("read_","=","0")->count();
   }
   
}
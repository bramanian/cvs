<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $layout="backend.layout.main";
	   public function __construct(){
		   


		} 
		
		
public function home(){
	$this->layout=null;
	return View::make('frontend.main');
	

}

		
    public function showWelcome()
	{
		return View::make('hello');
	}
	public function index(){
		 $this->getBreadcrumbs(array("Home"=>"/home", "Profile" => ""));
	$profile=Profile::where("id_user","=",Auth::id())
	                 ->where("tipe","=","user")
					 ->join("users","users.id","=","profile.id_user")
					 ->first();
	
     	$this->layout->content=View::make("backend.home.index",array("profile"=>$profile))->render();
	}
	
	public function leaderboard(){
			$profile=Profile::where("id_user","=",Auth::id())
	                 ->where("tipe","=","user")
					 ->join("users","users.id","=","profile.id_user")
					 ->first(); 
		 $this->getBreadcrumbs(array("Home"=>"/home","Leader Board"=>""));
	
     	$this->layout->content=View::make("backend.leaderboard.index",array("profile"=>$profile))->render();
	}
	
	public function getBreadcrumbs($isi){
	 $this->layout->breadcrumbs=$isi;
	}
	public function create(){
        $provinsis=Provinsi::orderBy("name","asc")->get();
		$this->getBreadcrumbs(array("Home"=>"/home"));
	    $this->layout->content= View::make("backend.home.create",array("provinsis"=>$provinsis))->render();
		

	}
	public function bantuan(){
		$this->getBreadcrumbs(array("Home"=>"/home", "Guide" => ""));
	    $this->layout->content= View::make("backend.home.bantuan")->render();
		
		

	}
	public function store(){
		$this->layout=null;
           $rule=array(
		   "nama"=>"required",
		   "jeniskelamin"=>"required",
		    "provinsi"=>"required",
			"kota"=>"required",
			 "tanggal"=>"required",
			 "bulan"=>"required",
			 "tahun"=>"required",
			 "alamat"=>"required"
		   );
		   
		$messages=array("required"=>" :attribute tidak boleh kosong",
		                "jeniskelamin.required"=>" Jenis Kelamin tidak boleh kosong");
		$validator=Validator::make(Input::all(),$rule,$messages);
		if($validator->fails())
		{
		 Return Redirect::back()->withErrors($validator);

		}else{
			$profile=new Profile();
			$profile->id_user=Auth::id();
			$profile->nama=Input::get("nama");
			$profile->jenis_kelamin=Input::get("jeniskelamin");
			$profile->id_provinsi=Input::get("provinsi");
			$profile->id_kota=Input::get("kota");
			$profile->no_telepon=Input::get("notelepon");
			$profile->alamat=Input::get("alamat");
			$profile->photo="/img/avatar.jpg";
			$profile->tipe="user";
			$profile->tgl_lahir=Input::get("tahun")."-".Input::get("bulan")."-".Input::get("tanggal");
			$profile->poin=5;
			 if($profile->save())
			 {
				 Session::put("isprofile",1);
				 Session::put("nama",Input::get("nama"));
				 return Redirect::back()->with("success",Input::get("nama")." Berhasil di Simpan"); 

			 }else{
				 return Redirect::back()->with("error",Input::get("nama")." Gagal di Simpan");

			 }
        }

	}
	
	public function edit(){
		$this->getBreadcrumbs(array("Home"=>"/home","Update"=>""));
		$provinsis=Provinsi::orderBy("name","asc")->get();
		$profile=Profile::where("id_user","=",Auth::id())->first();
$this->layout->content=View::make("backend.home.update",array("profile"=>$profile,"provinsis"=>$provinsis))->render();
		

	}
	
	public function update(){
		$this->layout=null;
           $rule=array(
		   "nama"=>"required",
		   "jeniskelamin"=>"required",
		    "provinsi"=>"required",
			"kota"=>"required",
			 "tanggal"=>"required",
			 "bulan"=>"required",
			 "tahun"=>"required",
			 "alamat"=>"required"
		   );
		   
		$messages=array("required"=>" :attribute tidak boleh kosong",
		                "jeniskelamin.required"=>" Jenis Kelamin tidak boleh kosong");
		$validator=Validator::make(Input::all(),$rule,$messages);
		if($validator->fails())
		{
		 Return Redirect::back()->withErrors($validator);
		}else{
			
			$execprofile=Profile::where("id_user","=",Auth::id())
			                      ->update(array(
								            "nama"=>Input::get("nama"),
											"jenis_kelamin"=>Input::get("jeniskelamin"),
											"id_provinsi"=>Input::get("provinsi"),
											"id_kota"=>Input::get("kota"),
											"no_telepon"=>Input::get("notelepon"),
											"alamat"=>Input::get("alamat")
											));
		 if($execprofile)
		 {
			 Session::put("isprofile",1);
			 Session::put("nama",Input::get("nama"));
			 return Redirect::to("home")->with("success",Input::get("nama")." Berhasil di Simpan"); 
		 }else{
			 return Redirect::back()->with("error",Input::get("nama")." Gagal di Simpan");
		 }
        }
	}	
	
	public static function getMouth($date){
		switch($date){
			case 1: return "Januari"; break;
			case 2: return "Februari"; break;
			case 3: return "Maret"; break;
			case 4: return "April"; break;
			case 5: return "Mei"; break;
			case 6: return "Juni"; break;
			case 7: return "Juli"; break;
			case 8: return "Agustus"; break;
			case 9: return "September"; break;
			case 10: return "Oktober"; break;
			case 11: return "November"; break;
			case 12: return "Desember"; break;

		}
		

	}
	public static function setDateSql($data){
        $tanggallahir=$data;
		$date=new DateTime($tanggallahir);
	    return $date->format("Y-m-d");
		

	}

	public function contactus(){
		$this->getBreadcrumbs(array("Home"=>"/home"));
	
	 	$this->layout->content=View::make("backend.home.contactus")->render();
	}
	
}

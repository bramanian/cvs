<?php
use LaravelBook\Ardent\Ardent;
class Pesan extends Ardent {
	protected $fillable = ['nama','email','kontak','pesan'];
    protected $table="pesan";
	
		public static $rules = array( 
			'nama'=>'required|min:5|alpha_num',
			'email' => 'required|email',
			'kontak'=>'required|numeric|min:3',
			'pesan'=>'required|alpha_num|min:5'
 
		);
  public static $customMessages = array(
        'nama.required' => 'Nama tidak boleh kosong.',
		'nama.min' => 'Minimal nama 5 Alphanumeric.',
		'nama.alpha_num' => 'Nama harus Alphanumeric.',
        'email.required' => 'Email Tidak Boleh Kosong.',
		'email.email' => 'Email yang anda masukkan salah, contoh Example@xxxx.xxx',
		'email.required' => 'Email Tidak Boleh Kosong.',
		'kontak.required' => 'Kontak tidak boleh kosong.',
		'kontak.min' => 'Minimal kontak 3 angka.',
		'kontak.numeric' => 'Kontak harus Angka.',
		'pesan.required' => 'Pesan tidak boleh kosong.',
		'pesan.min' => 'Minimal pesan 5 Alphanumeric.',
		'pesan.alpha_num' => 'Pesan harus Alphanumeric.'
    );
 		
	public function selectAction(){
         return DB::table($this->table)->orderby("created_at","desc")->get();
    }
   public function deleteAction($id){
        return DB::table($this->table)->where("id","=",$id)->delete();
		 
    }
   
   public function searchAction($keyword){
	 
     $data=DB::table($this->table)->where("nama","like","%".$keyword."%")->orWhere("created_at",'like','%'.$keyword.'%')->orderby("created_at",'desc')->get();
	    return $data;
    }


   public function onlyread(){
    return DB::table($this->table)->where("status","1")->get();
    }
   
   public function onlynoread(){
    return DB::table($this->table)->where("status","0")->get(); 
    } 
   
   public function toread($id,$nama){
           DB::table($this->table)->where("id",$id)->where("nama",$nama)->update(array("status"=>"1"));
    return DB::table($this->table)->where("id",$id)->where("nama",$nama)->first();
    }     
  
   
  public function beforeSave() {  
    return true;
    //or don't return nothing, since only a boolean false will halt the operation
  }	
}
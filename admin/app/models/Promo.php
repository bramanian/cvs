<?php
use LaravelBook\Ardent\Ardent;
class Promo extends Ardent {
	protected $fillable = [];
	protected $table="promo";

		public static $rules = array();
  public static $customMessages = array();
 		
	public function selectAction(){
         return DB::table($this->table)->orderby("created_at","desc")->get();
    }
   public function deleteAction($id){
        return DB::table($this->table)->where("id","=",$id)->delete();
		 
    }
   
   public function searchAction($keyword){
	 
     $data=DB::table($this->table)->where("nama","like","%".$keyword."%")->orWhere("created_at",'like','%'.$keyword.'%')->orderby("created_at",'desc')->paginate(10);
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
<?php
class Tips extends Eloquent {
	protected $fillable = [];
	protected $table="tips";

  public static $rules = array();
  public static $customMessages = array();
 		
	public function selectAction(){
         return DB::table($this->table)->orderby("created_at","desc")->get();
    }
   public function deleteAction($id){
        return DB::table($this->table)->where("id","=",$id)->delete();
		 
    }
   
   public function searchAction($keyword){
	 
     $data=DB::table($this->table)->where("judul","like","%".$keyword."%")->orWhere("created_at",'like','%'.$keyword.'%')->orderby("created_at",'desc')->paginate(10);
	    return $data;
    }


   public function onlyread(){
    return DB::table($this->table)->where("status","1")->get();
    }
   
   public function onlynoread(){
    return DB::table($this->table)->where("status","0")->get(); 
    } 
   
   public function toread($id,$judul){
           DB::table($this->table)->where("id",$id)->where("judul",$judul)->update(array("status"=>"1"));
    return DB::table($this->table)->where("id",$id)->where("judul",$judul)->first();
    }     
  
   
  public function beforeSave() {  
    return true;
    //or don't return nothing, since only a boolean false will halt the operation
  }	
}
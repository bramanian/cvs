<?php

class Tagging extends \Eloquent {
	protected $fillable = [];
	protected $table="tagging";
	
	public function getRelationTagging($id){
	 return DB::table("tagging")
	         ->join("tag","tagging.id_tag","=","tag.id")
			 ->join("tips","tips.id","=","tagging.id_tulisan")
			 ->select("tag.id as id","tag.nama as nama")
			 ->where("tipe","=","tips")
			 ->where("tips.id","=",$id)->get();
	}
}
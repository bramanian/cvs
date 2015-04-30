<?php

class Tagging extends \Eloquent {
	protected $fillable = [];
	protected $table="tagging";
	public function getRelationTagging($id){
	 return DB::table("tagging")
	         ->join("tag","tagging.id_tag","=","tag.id")
			 ->join("artikel","artikel.id","=","tagging.id_tulisan")
			 ->select("tag.id as id","tag.nama as nama")
			 ->where("tipe","=","artikel")
			 ->where("artikel.id","=",$id)->get();
	}	
}
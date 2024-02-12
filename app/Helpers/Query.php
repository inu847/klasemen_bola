<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class Query {

	public static function getFirst($sql){

		$result = DB::select($sql);
		if (isset($result[0])) {
			// code...
			return $result[0];
		}else{
			return false;
		}
		
	}

	public static function getList($sql){

		$result = DB::select($sql);
		return $result;
	}

	public static function getCount($sql){

		$result = DB::select($sql);
		return count($result);
	}
}
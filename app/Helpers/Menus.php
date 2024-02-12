<?php
namespace App\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Crypt;
class Menus {

	public static function menuParent($role) {    
        $query = DB::table("menus as m")
                ->join("menus_roles as mr","m.kode", "=", "mr.kode_menus")
                ->join("roles as r","mr.kode_roles", "=", "r.kode")
                ->select("m.nama","m.icon","m.url","m.kode","m.tipe")
                ->whereNull('m.kode_parent')
                ->where('r.kode',$role)
                ->where('m.level',0)
                ->whereIn('mr.set_view',array('yes','own'))
                ->orderBy('m.num_sort','ASC')->get();
        return $query;
    }

    public static function menuLevelOne1($role,$kode) {    
        $query = DB::table("menus as m")
                ->join("menus_roles as mr","m.kode", "=", "mr.kode_menus")
                ->join("roles as r","mr.kode_roles", "=", "r.kode")
                ->select("m.nama","m.icon","m.url","m.kode","m.tipe")
                ->where('m.kode_parent',$kode)
                ->where('r.kode',$role)
                ->where('m.active','Y')
                ->where('m.level',1)
                ->whereIn('mr.set_view',array('yes','own'))
                ->orderBy('m.num_sort','ASC')->offset(0)->limit(11)->get();
        return $query;
    }

    public static function menuLevelOne2($role,$kode) {    
        $query = DB::table("menus as m")
                ->join("menus_roles as mr","m.kode", "=", "mr.kode_menus")
                ->join("roles as r","mr.kode_roles", "=", "r.kode")
                ->select("m.nama","m.icon","m.url","m.kode","m.tipe")
                ->where('m.kode_parent',$kode)
                ->where('r.kode',$role)
                ->where('m.active','Y')
                ->where('m.level',1)
                ->whereIn('mr.set_view',array('yes','own'))
                ->orderBy('m.num_sort','ASC')->offset(11)->limit(8)->get();
        return $query;
    }

    public static function menuLevelTwo($role,$kode) {    
        $query = DB::table("menus as m")
                ->join("menus_roles as mr","m.kode", "=", "mr.kode_menus")
                ->join("roles as r","mr.kode_roles", "=", "r.kode")
                ->select("m.nama","m.icon","m.url","m.kode","m.tipe")
                ->where('m.kode_parent',$kode)
                ->where('r.kode',$role)
                ->where('m.active','Y')
                ->where('m.level',2)
                ->whereIn('mr.set_view',array('yes','own'))
                ->orderBy('m.num_sort','ASC')->get();
        return $query;
    }

}
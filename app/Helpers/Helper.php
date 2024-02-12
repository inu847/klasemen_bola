<?php
namespace App\Helpers;

use App\Models\Kelas;

class Helper {
    public static function limitList($limit)
    {
        $limit = !empty($limit) ? $limit:10;

        return $limit;
    }

    public static function pageList($page, $limit)
    {
        $pages = isset($page) ? (int)$page : 1;
        $page_awal = ($pages>1) ? ($pages * $limit) - $limit : 0;

        return $page_awal;
    }

    public static function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    public static function getKelas($kelas_id)
    {
        $kelas = Kelas::find($kelas_id);
        $parent = '';
        if ($kelas->parent_id) {
            $parent = Kelas::find($kelas->parent_id)->nama;
            $parent = $parent.' - ';
        }

        return $parent.$kelas->nama;
    }

    public static function RemoveSpecialChar($str) {
      $res = preg_replace('/[^a-zA-Z0-9_ -]/s','',$str);
 
      // Returning the result
      return $res;
    }
}
?>
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klub extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kota',
        'description',
        'status',
    ];

    public function skorPertandingan()
    {
        return $this->hasMany(SkorPertandingan::class);
    }

    public function ma()
    {
        $id = $this->id;
        $main = SkorPertandingan::where('klub_id_1', $id)->OrWhere('klub_id_2', $id)->count();

        return $main;
    }

    public function me()
    {
        $id = $this->id;
        $menang1 = SkorPertandingan::where('klub_id_1', $id)->whereColumn('skor_klub_1', '>', 'skor_klub_2')->count();

        $menang2 = SkorPertandingan::where('klub_id_2', $id)->whereColumn('skor_klub_2', '>', 'skor_klub_1')->count();
        $menang = $menang1 + $menang2;

        return $menang;
    }

    public function s()
    {
        $id = $this->id;
        $seri_1 = SkorPertandingan::where('klub_id_1', $id)->whereColumn('skor_klub_1', '=', 'skor_klub_2')->count();
        $seri_2 = SkorPertandingan::where('klub_id_2', $id)->whereColumn('skor_klub_2', '=', 'skor_klub_1')->count();
        $seri = $seri_1 + $seri_2;

        return $seri;
    }

    public function k()
    {
        $id = $this->id;
        $kalah_1 = SkorPertandingan::where('klub_id_1', $id)->whereColumn('skor_klub_1', '<', 'skor_klub_2')->count();
        $kalah_2 = SkorPertandingan::where('klub_id_2', $id)->whereColumn('skor_klub_2', '<', 'skor_klub_1')->count();
        $kalah = $kalah_1 + $kalah_2;

        return $kalah;
    }

    public function gm()
    {
        $id = $this->id;
        $total_goal_1 = SkorPertandingan::where('klub_id_1', $id)->whereColumn('skor_klub_1', '>', 'skor_klub_2')->sum('skor_klub_1');
        $total_goal_2 = SkorPertandingan::where('klub_id_2', $id)->whereColumn('skor_klub_2', '>', 'skor_klub_1')->sum('skor_klub_2');
        $total_goal_menang = $total_goal_1 + $total_goal_2;

        return $total_goal_menang;
    }

    public function gk()
    {
        $id = $this->id;
        $total_goal_1 = SkorPertandingan::where('klub_id_1', $id)->whereColumn('skor_klub_1', '<', 'skor_klub_2')->sum('skor_klub_1');
        $total_goal_2 = SkorPertandingan::where('klub_id_2', $id)->whereColumn('skor_klub_2', '<', 'skor_klub_1')->sum('skor_klub_2');
        $total_goal_kalah = $total_goal_1 + $total_goal_2;

        return $total_goal_kalah;
    }
}

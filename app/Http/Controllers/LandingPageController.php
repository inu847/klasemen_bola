<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\Materi;
use App\Models\SkorPertandingan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $klubs = Klub::where('status', 1)->orderBy('id', 'desc')->get();

        foreach ($klubs as $key => $value) {
            $value['ma'] = $value->ma();
            $value['me'] = $value->me();
            $value['s'] = $value->s();
            $value['k'] = $value->k();
            $value['gm'] = $value->gm();
            $value['gk'] = $value->gk();
            $value['point'] = ($value['me'] * 3) + ($value['s'] * 1);
        }
        return view('front.landingpage', compact('klubs'));
    }

    public function show($id)
    {
        $klub = Klub::find($id);
        $pertandingan = SkorPertandingan::where('klub_id_1', $id)->orWhere('klub_id_2', $id)->get();
        
        $klub['ma'] = $klub->ma();
        $klub['me'] = $klub->me();
        $klub['s'] = $klub->s();
        $klub['k'] = $klub->k();
        $klub['gm'] = $klub->gm();
        $klub['gk'] = $klub->gk();
        $klub['point'] = ($klub['me'] * 3) + ($klub['s'] * 1);

        foreach ($pertandingan as $key => $value) {
            $value['klub1'] = $value->klub1->nama ?? null;
            $value['klub2'] = $value->klub2->nama ?? null;
        }

        return view('front.klub', compact('klub', 'pertandingan'));
    }
}

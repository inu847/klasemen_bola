<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Klub;
use App\Models\SkorPertandingan;
use Illuminate\Http\Request;

class SkorController extends Controller
{
    public function index(Request $request)
    {
        $limit = Helper::limitList($request->limit);
        $page = Helper::pageList($request->page, $limit);
        $columns = ['id', 'skor_klub_1', 'skor_klub_2', 'klub_id_1', 'klub_id_2', 'created_at'];
        $keyword = $request->search;

        $data = SkorPertandingan::orderBy('id', 'desc')
                    ->select($columns)
                    ->where(function($result) use ($keyword,$columns){
                        foreach($columns as $column)
                        {
                            if($keyword != ''){
                                $result->orWhere($column,'ILIKE','%'.$keyword.'%');
                            }
                        }
                    })
                    ->get();

        foreach ($data as $key => $value) {
            $value['klub1'] = $value->klub1->nama ?? null;
            $value['klub2'] = $value->klub2->nama ?? null;
        }

        return view('admin.skor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klubs = Klub::where('status', 1)->orderBy('nama', 'asc')->get();

        return view('admin.skor.create', compact('klubs'));
    }

    public function create_multiple()
    {
        $klubs = Klub::where('status', 1)->orderBy('nama', 'asc')->get();

        return view('admin.skor.create_multiple', compact('klubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $pertandingan_sama = SkorPertandingan::where('klub_id_1', $data['klub_id_1'])->where('klub_id_2', $data['klub_id_2'])->first();
            
            if ($pertandingan_sama) {
                return redirect()->route('skor.index')->with('danger', 'Pertandingan Sudah Ada');
            }

            return $this->atomic(function () use ($data) {
                $create =  SkorPertandingan::create($data);
                
                return redirect()->route('skor.index')->with('sucess', 'Data Berhasil Ditambahkan');
            });
        } catch (\Exception $e) {
            return redirect()->route('skor.index')->with('error', $e->getMessage());
        }
    }

    public function store_multiple(Request $request)
    {
        try {
            $data = $request->all();

            return $this->atomic(function () use ($data) {
                foreach ($data['klub_id_1'] as $key => $value) {
                    $child['klub_id_1'] = $value;
                    $child['klub_id_2'] = $data['klub_id_2'][$key];
                    $child['skor_klub_1'] = $data['skor_klub_1'][$key];
                    $child['skor_klub_2'] = $data['skor_klub_2'][$key];

                    // CHECK DATA SAME ON DATABASE
                    $pertandingan_sama = SkorPertandingan::where('klub_id_1', $child['klub_id_1'])->where('klub_id_2', $child['klub_id_2'])->first();
                    if ($pertandingan_sama) {
                        return redirect()->route('skor.index')->with('danger', 'Pertandingan Sudah Ada');
                    }else if ($child['klub_id_1'] == $child['klub_id_2']) {
                        return redirect()->route('skor.index')->with('danger', 'Klub Tidak Boleh Sama');
                    }

                    $create =  SkorPertandingan::create($child);
                }
                
                return redirect()->route('skor.index')->with('sucess', 'Data Berhasil Ditambahkan');
            });
        } catch (\Exception $e) {
            return redirect()->route('skor.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!is_numeric($id)) {
            return abort(404);
        }
        $data =  SkorPertandingan::findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(empty($id)) {
            return abort(404);
        }
        
        $data =  SkorPertandingan::find($id);
        $klubs = Klub::where('status', 1)->orderBy('nama', 'asc')->get();

        return view('admin.skor.edit', compact('data', 'klubs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();
            $this->validasiUpdate($request);

            return $this->atomic(function () use ($data, $id) {
                $update = SkorPertandingan::find($id)->update($data);

                return redirect()->route('skor.index')->with('sucess', 'Data Berhasil Diupdate');
            });
        } catch (\Exception $e) {
            return redirect()->route('skor.index')->with('danger', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $destroy = SkorPertandingan::find($id);
            $destroy->delete();

            return response()->json(['message' => 'Data Berhasil Dihapus']);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function validasi($request)
    {
        $this->validate($request, [
            'skor_klub_1'  => 'required',
            'skor_klub_2'  => 'required',
            'klub_id_1'  => 'required',
            'klub_id_2'  => 'required',
        ]);
    }

    public function validasiUpdate($request)
    {
        $this->validate($request, [
            'skor_klub_1'  => 'required',
            'skor_klub_2'  => 'required',
            'klub_id_1'  => 'required',
            'klub_id_2'  => 'required',
        ]);
    }
}

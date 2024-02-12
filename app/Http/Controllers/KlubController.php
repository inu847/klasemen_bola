<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Klub;
use Illuminate\Http\Request;

class KlubController extends Controller
{
    public function index(Request $request)
    {
        $limit = Helper::limitList($request->limit);
        $page = Helper::pageList($request->page, $limit);
        $columns = ['id', 'nama', 'description', 'kota', 'status', 'created_at'];
        $keyword = $request->search;

        $data = Klub::orderBy('id', 'desc')
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

        return view('admin.klub.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.klub.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            if ($request->has('status')) {
                $data['status'] = 1;
            }else{
                $data['status'] = 2;
            }

            return $this->atomic(function () use ($data) {
                $create =  Klub::create($data);
                
                return redirect()->route('klub.index')->with('sucess', 'Data Berhasil Ditambahkan');
            });
        } catch (\Exception $e) {
            return redirect()->route('klub.index')->with('error', $e->getMessage());
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
        $data =  Klub::findOrFail($id);

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
        
        $data =  Klub::find($id);

        return view('admin.klub.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();
            $this->validasiUpdate($request);

            if ($request->has('status')) {
                $data['status'] = 1;
            }else{
                $data['status'] = 2;
            }

            return $this->atomic(function () use ($data, $id) {
                $update = Klub::find($id)->update($data);

                return redirect()->route('klub.index')->with('sucess', 'Data Berhasil Diupdate');
            });
        } catch (\Exception $e) {
            return redirect()->route('klub.index')->with('danger', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $destroy = Klub::find($id);
            $destroy->delete();

            return view('admin.klub.index')->with('sucess', 'Data Berhasil Dihapus');
        } catch (\Throwable $e) {
            return view('admin.klub.index')->with('danger', $e->getMessage());
        }
    }

    public function check(Request $request)
    {
        try {
            $id = $request->id_exist;
            $data = Klub::where('status', 1)->whereNot('id', $id)->get();

            return response()->json($data);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function validasi($request)
    {
        $this->validate($request, [
            'nama'  => 'required|unique',
        ]);
    }

    public function validasiUpdate($request)
    {
        $this->validate($request, [
            'nama'  => 'required|unique:klubs,id,'.$request->id,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function lists(Request $request)
    {
        $limit = Helper::limitList($request->limit);
        $page = Helper::pageList($request->page, $limit);
        $columns = ['id', 'title', 'description', 'type'];
        $keyword = $request->search;

        $data = Materi::orderBy('id', 'desc')
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

        return response()->json($data);
    }
}

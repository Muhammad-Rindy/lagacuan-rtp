<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasaran;
use App\Models\Result;
use Illuminate\Http\Request;

class PasaranController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index_result()
    {
        $data = Pasaran::join('table_result', 'table_result.pasaran_id', '=', 'table_pasaran.id')
        ->select('table_result.id', 'name_pasaran', 'result', 'table_pasaran.image', 'table_result.created_at')
        ->orderBy('table_result.id', 'desc')
        ->get();

        $dataJson = $data->map(function ($item) {
            return [
                'id' => ($item->id),
                'name_pasaran' => ($item->name_pasaran),
                'result' => ($item->result),
                'image' => ($item->image),
                'created_at' => (($item->created_at)),
            ];
        });

        return response()->json($dataJson);
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Pasaran;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index_result()
    {
        if (request()->ajax()) {
            return datatables()->of(Result::join('table_pasaran', 'table_result.pasaran_id', '=', 'table_pasaran.id')
            ->select('table_result.*', 'table_pasaran.name_pasaran as pasaran_name'))
            ->addColumn('action', 'dashboards.results.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        $pasarans = Pasaran::pluck('name_pasaran', 'id');

        return view('dashboards.results.index', compact('pasarans'));
    }






    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function store_result(Request $request)
    {
        $request->all();

        $result = Result::create([
            'pasaran_id' => $request->pasaran_id,
            'result_1' => $request->result_1,
            'result_2' => $request->result_2,
            'result_3' => $request->result_3,
            'shio' => $request->shio,
        ]);

        return response()->json(['success' => true, 'result' => $result]);
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */


    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function getData($id) {
        $product = Result::find($id);
        return response()->json($product);


    }

    public function updateData(Request $request)
    {

        $product = Result::findOrFail($request->id);
        $product->update([
            'result_1' => $request->result_1,
            'result_2' => $request->result_2,
            'result_3' => $request->result_3,
            'shio' => $request->shio,
        ]);
        return response()->json(['success' => true]);
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy_result(Request $request)
    {
        $product = Result::where('id', $request->id)->delete();

        return Response()->json($product);
    }
}
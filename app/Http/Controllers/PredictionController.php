<?php

namespace App\Http\Controllers;

use App\Models\Pasaran;
use App\Models\Prediksi;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index_prediksi()
    {
        if (request()->ajax()) {
            return datatables()->of(Prediksi::with(["pasaran"])->orderBy("created_at", "desc"))
            ->addColumn('action', 'dashboards.prediction.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        $pasarans = Pasaran::pluck('name_pasaran', 'id');

        return view('dashboards.prediction.index', compact('pasarans'));
    }






    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function store_prediksi(Request $request)
    {
        $request->all();

        $result = Prediksi::create([
            'pasaran_id' => $request->pasaran_id,
            'angka_main' => $request->angka_main,
            'top_4d' => $request->top_4d,
            'top_3d' => $request->top_3d,
            'top_2d' => $request->top_2d,
            'colok_bebas' => $request->colok_bebas,
            'colok_2d' => $request->colok_2d,
            'shio_jitu' => $request->shio_jitu,
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
        $product = Prediksi::find($id);
        return response()->json($product);


    }

    public function updateData(Request $request)
    {

        $product = Prediksi::findOrFail($request->id);
        $product->update([
            'angka_main' => $request->angka_main,
            'top_4d' => $request->top_3d,
            'top_3d' => $request->top_3d,
            'top_2d' => $request->top_2d,
            'colok_bebas' => $request->colok_bebas,
            'colok_2d' => $request->colok_2d,
            'shio_jitu' => $request->shio_jitu,
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
    public function destroy_prediksi(Request $request)
    {
        $product = Prediksi::where('id', $request->id)->delete();

        return Response()->json($product);
    }

    public function randomPrediksi() {
        randomPasaran();
        return response()->json(["status" => true], 200);
    }
}

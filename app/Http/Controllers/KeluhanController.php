<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
         /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index_keluhan()
    {

        if(request()->ajax()) {
            return datatables()->of(Keluhan::select('*'))
            ->addColumn('action', 'dashboards.keluhan.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboards.keluhan.index');

    }

    public function store_keluhan(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'number_phone' => 'required',
            'title_keluhan' => 'required',
            'description_keluhan' => 'required',
        ]);

        $result = Keluhan::create([
            'username' => $request->username,
            'email' => $request->email,
            'number_phone' => $request->number_phone,
            'title_keluhan' => $request->title_keluhan,
            'description_keluhan' => $request->description_keluhan,
        ]);

        return response()->json(['success' => true, 'result' => $result]);
    }



    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */



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
    public function destroy_keluhan(Request $request)
    {
        $product = Keluhan::where('id', $request->id)->delete();

        return Response()->json($product);
    }
}

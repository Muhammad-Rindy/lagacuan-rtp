<?php

namespace App\Http\Controllers;

use App\Models\Shio;
use Illuminate\Http\Request;

class ShioController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */


    public function index_shio()
    {

        if(request()->ajax()) {
            return datatables()->of(Shio::select('*'))
            ->addColumn('action', 'dashboards.shio.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboards.shio.index');

    }

    public function generateShio(Request $request)
    {
        $angka = $request->input('angka');
        $twoDigitAngka = substr($angka, -2);

        $shio = Shio::where(function ($query) use ($twoDigitAngka) {
            $query->whereRaw("FIND_IN_SET('$twoDigitAngka', angka)")
            ->orWhere('angka', 'LIKE', "%,$twoDigitAngka,%")
            ->orWhere('angka', 'LIKE', "$twoDigitAngka,%")
            ->orWhere('angka', 'LIKE', "%,$twoDigitAngka");
        })->first();

        if ($shio) {
            return response()->json(['name' => $shio->name]);
        } else {
            return response()->json(['name' => 'Shio Tidak Ditemukan']);
        }
    }



    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function store_shio(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'angka' => 'required',
        ]);

        $bukti = Shio::create([
            'name' => $request->name,
            'angka' => $request->angka,
        ]);

        return response()->json(['success' => true, 'message' => 'Data stored successfully', 'bukti' => $bukti]);

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
        $product = Shio::find($id);
        return response()->json($product);
    }

    public function updateData(Request $request)
    {

        $product = Shio::findOrFail($request->id);
        $product->update([
            'shio' => $request->shio,
            'angka' => $request->angka,
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
    public function destroy_shio(Request $request)
    {
        $product = Shio::where('id', $request->id)->delete();

        return Response()->json($product);
    }
}
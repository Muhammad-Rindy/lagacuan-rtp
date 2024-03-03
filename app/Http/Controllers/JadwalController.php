<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index_jadwal()
    {

        if(request()->ajax()) {
            return datatables()->of(Jadwal::select('*'))
            ->addColumn('action', 'dashboards.jadwal.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboards.jadwal.index');

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_jadwal(Request $request)
    {
        $request->all();


        $bukti = Jadwal::create([
            'name_pasaran' => $request->name_pasaran,
            'jadwal_tutup' => $request->jadwal_tutup,
            'jadwal_undi' => $request->jadwal_undi,
            'situs_resmi' => $request->situs_resmi,
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
        $product = Jadwal::find($id);
        return response()->json($product);
    }

    public function updateData(Request $request)
    {

        $product = Jadwal::findOrFail($request->id);
        $product->update([
            'name_pasaran' => $request->name_pasaran,
            'jadwal_tutup' => $request->jadwal_tutup,
            'jadwal_undi' => $request->jadwal_undi,
            'situs_resmi' => $request->situs_resmi,
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
    public function destroy_jadwal(Request $request)
    {
        $product = Jadwal::where('id', $request->id)->delete();

        return Response()->json($product);
    }
}
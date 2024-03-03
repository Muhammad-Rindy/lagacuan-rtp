<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index_buku()
    {

        if(request()->ajax()) {
            return datatables()->of(Buku::select('*'))
            ->addColumn('action', 'dashboards.buku.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboards.buku.index');

    }




    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function store_buku(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $bukti = Buku::create([
            'description' => $request->description,
            'image' => $path
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
        $product = Buku::find($id);
        return response()->json($product);
    }

    public function updateData(Request $request)
    {
        $request->all();

        $product = Buku::findOrFail($request->id);
        $product->update([
            'description' => $request->description,
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
    public function destroy_buku(Request $request)
    {
        $product = Buku::where('id', $request->id)->delete();

        return Response()->json($product);
    }
}
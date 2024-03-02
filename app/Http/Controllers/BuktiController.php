<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class BuktiController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index_bukti()
    {

        if(request()->ajax()) {
            return datatables()->of(Bukti::select('*'))
            ->addColumn('action', 'dashboards.bukti.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboards.bukti.index-bukti');

    }




    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function store_bukti(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $bukti = Bukti::create([
            'title' => $request->title,
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
        $product = Bukti::find($id);
        return response()->json($product);
    }

    public function updateData(Request $request)
    {
        $request->all();

        $product = Bukti::findOrFail($request->id);
        $product->update([
            'title' => $request->title,
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
    public function destroy_bukti(Request $request)
    {
        $product = Bukti::where('id', $request->id)->delete();

        return Response()->json($product);
    }
}

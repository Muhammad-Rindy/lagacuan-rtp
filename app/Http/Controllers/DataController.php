<?php

namespace App\Http\Controllers;

use App\Models\Pasaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */


    public function index_data()
    {

        if(request()->ajax()) {
            return datatables()->of(Pasaran::select('*'))
            ->addColumn('action', 'dashboards.pasaran.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboards.pasaran.index');

    }




    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function store_data(Request $request)
    {
        $request->validate([
            'name_pasaran' => 'required',
            'alias' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);


        $file = $request->file('image');
        $path = $file->store('public/banners'); // Simpan gambar di dalam folder 'public/banners'

        $url = Storage::url($path); // Dapatkan URL lengkap dari gambar yang disimpan


        $bukti = Pasaran::create([
            'name_pasaran' => $request->name_pasaran,
            'alias' => $request->alias,
            'image' => $url
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
        $product = Pasaran::find($id);
        return response()->json($product);
    }

    public function updateData(Request $request)
    {

        $product = Pasaran::findOrFail($request->id);
        $product->update([
            'name_pasaran' => $request->name_pasaran,
            'alias' => $request->alias,
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
    public function destroy_data(Request $request)
    {
        $product = Pasaran::where('id', $request->id)->delete();

        return Response()->json($product);
    }
}

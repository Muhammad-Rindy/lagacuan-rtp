<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Jadwal;
use App\Models\Pasaran;
use App\Models\Bukti;
use App\Models\Result;
use Illuminate\Http\Request;

class PasaranController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function resultJson()
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
    public function prediksiJson()
    {
        $data = Pasaran::join('table_prediksi', 'table_prediksi.pasaran_id', '=', 'table_pasaran.id')
        ->orderBy('table_prediksi.id', 'desc')
        ->get();

        $dataJson = $data->map(function ($item) {
            return [
                'id' => ($item->id),
                'name_pasaran' => ($item->name_pasaran),
                'angka_main' => ($item->angka_main),
                'image' => ($item->image),
                'top_3d' => (($item->top_3d)),
                'top_2d' => (($item->top_2d)),
                'colok_bebas' => (($item->colok_bebas)),
                'colok_2d' => (($item->colok_2d)),
                'shio_jitu' => (($item->shio_jitu)),
                'created_at' => (($item->created_at)),
            ];
        });

        return response()->json($dataJson);
    }

    public function buktiJson()
    {
        $data = Bukti::all();

        $dataJson = $data->map(function ($item) {
            return [
                'id' => ($item->id),
                'image' => ($item->image),
                'title' => ($item->title),
                'description' => ($item->description),
                'created_at' => (($item->created_at)),
            ];
        });

        return response()->json($dataJson);
    }
    public function bukuJson()
    {
        $data = Buku::all();

        $dataJson = $data->map(function ($item) {
            return [
                'id' => ($item->id),
                'image' => ($item->image),
                'description' => ($item->description),
            ];
        });

        return response()->json($dataJson);
    }

    public function jadwalJson()
    {
        $data = Jadwal::all();

        $dataJson = $data->map(function ($item) {
            return [
                'id' => ($item->id),
                'name_pasaran' => ($item->name_pasaran),
                'jadwal_tutup' => ($item->jadwal_tutup),
                'jadwal_undi' => ($item->jadwal_undi),
                'situs_resmi' => ($item->situs_resmi),
            ];
        });

        return response()->json($dataJson);
    }

}
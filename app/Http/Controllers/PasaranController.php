<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use App\Models\Pasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_pasaran_home()
    {
        $data = Http::get('https://raw.githubusercontent.com/MR-Dragon1/jeder/main/public/data/result.json');
        $pasarans = $data->object();


        return view('home', compact('pasarans'));
    }

    public function index_live_home()
    {
        $data = Http::get('https://raw.githubusercontent.com/MR-Dragon1/jeder/main/public/data/result.json');
        $pasarans = $data->object();
        return view('live', compact('pasarans'));
    }
    public function index_prediksi_home()
    {
        $data = Http::get('https://raw.githubusercontent.com/MR-Dragon1/jeder/main/public/data/prediksi.json');
        $prediksies = $data->object();

        return view('prediksi', compact('prediksies'));
    }
    public function index_jadwal_home()
    {

        return view('jadwal');
    }
    public function index_result_home()
    {

        return view('result');
    }
    public function index_bukti_home()
    {

        $data = Http::get('https://raw.githubusercontent.com/MR-Dragon1/jeder/main/public/data/bukti.json');
        $buktis = $data->object();

        return view('bukti', compact('buktis'));
    }
    public function index_buku_home()
    {
        $data = Http::get('https://raw.githubusercontent.com/MR-Dragon1/jeder/main/public/data/buku.json');
        $bukus = $data->object();
        return view('buku', compact('bukus'));
    }
    public function index_promosi_home()
    {

        return view('promosi');
    }
    public function index_keluhan_home()
    {

        return view('keluhan');
    }
    public function index_paito_home()
    {

        return view('paito');
    }




}
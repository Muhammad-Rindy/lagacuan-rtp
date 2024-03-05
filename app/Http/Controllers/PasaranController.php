<?php

namespace App\Http\Controllers;

class PasaranController extends Controller
{

    public function index_pasaran_home()
    {
        return view('home');
    }
    public function index_live_home()
    {
        return view('live');
    }
    public function index_prediksi_home()
    {
        return view('prediksi');
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
        return view('bukti');
    }
    public function index_buku_home()
    {
        return view('buku');
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
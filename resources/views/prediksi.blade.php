@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD - PREDIKSI TOGEL HARI
            INI LENGKAP
            2024
        </h6>
    </main>
    <main class="container mb-5">
        @foreach ($prediksies as $prediksi)
            <div class="card w-100 mb-2"
                style="background-image: linear-gradient(180deg, #bd0002 50%, #7b0000 99%);border-radius: 10px;border: solid red 2px;">
                <div class="row g-0">
                    <div class="col-md-4"
                        style="display: flex; justify-content: center; align-items: center; text-align: center;">
                        <img src="{{ $prediksi->image }}" class="img-fluid rounded-start" alt="Gambar">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">PREDIKSI TOGEL {{ $prediksi->name_pasaran }} POOLS {{ $prediksi->date }}
                                JEDERWD</h5>
                            <p class="card-text">Prediksi Togel {{ $prediksi->name_pasaran }}, {{ $prediksi->description }}
                            </p>
                            <div style="display: flex; justify-content: flex-end;">
                                <button style="font-weight:bold; color:white" type="button"
                                    class="btn button-17 btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $prediksi->id }}">
                                    <i class="fa-solid fa-eye"></i> Lihat Prediksi
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal{{ $prediksi->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel{{ $prediksi->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2c2c2c; color:white">
                            <h1 class="modal-title fs-6" id="exampleModalLabel">LIVE DRAW {{ $prediksi->name_pasaran }}
                                POOLS
                            </h1>
                        </div>
                        <div class="modal-body" style="background-image: linear-gradient(#ff2d2d, #910505);">
                            <div class="container text-center mb-2">
                                <img src="{{ $prediksi->image }}" class="img-fluid" alt="...">
                            </div>
                            <hr>

                            <div class="container text-center mb-3">
                                <div class="row align-items-center">
                                    <div class="col" style="font-weight:bold; color:white">
                                        <h6>Angka Main :</h6>
                                        <h5>{{ $prediksi->angka_main }}</h5>
                                        <h6>TOP 4D (BB) :</h6>
                                        <h5>{{ $prediksi->top_4d }}</h5>
                                        <h6>TOP 3D (BB) :</h6>
                                        <h5>{{ $prediksi->top_3d }}</h5>
                                        <h6>TOP 2D (BB) :</h6>
                                        <h5>{{ $prediksi->top_2d }}</h5>
                                        <h6>COLOK BEBAS :</h6>
                                        <h5>{{ $prediksi->colok_bebas }}</h5>
                                        <h6>COLOK 2D :</h6>
                                        <h5>{{ $prediksi->colok_2d }}</h5>
                                        <h6>SHIO JITU :</h6>
                                        <h5>{{ $prediksi->shio_jitu }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color:#2c2c2c; color:white">
                            <button type="button" class="btn btn-secondary btn-sm bg-dark"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection

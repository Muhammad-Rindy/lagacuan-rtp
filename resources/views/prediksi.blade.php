@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD - PREDIKSI TOGEL HARI
            INI LENGKAP
            2024
        </h6>
    </main>
    <main class="container mb-5">
        <div id="results-container">

        </div>
    </main>
    <script>
        $(document).ready(function() {
            // AJAX request to fetch data


            $.ajax({
                url: 'http://127.0.0.1:8000/api/prediksi',
                method: 'GET',
                success: function(data) {
                    displayResults(data);
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });

            function displayResults(data) {
                var resultsContainer = $('#results-container');

                $.each(data, function(index, result) {
                    var pathImage = 'storage/' + result.image;
                    var resultCard = `
                            <div class="card w-100 mb-2"
                style="background-image: linear-gradient(180deg, #bd0002 50%, #7b0000 99%);border-radius: 10px;border: solid red 2px;">
                <div class="row g-0">
                    <div class="col-md-4"
                        style="display: flex; justify-content: center; align-items: center; text-align: center;">
                        <img src="${pathImage}" class="img-fluid rounded-start" alt="Gambar">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 style="font-weight:bolder" class="card-title">PREDIKSI TOGEL <span style="text-transform: uppercase">${result.name_pasaran}</span> POOLS
                                JEDERWD</h6>
                            <p class="card-text">Prediksi Togel <span style="text-transform: uppercase">${result.name_pasaran}</span> ${result.created_at},  Bocoran & Info Akurat yang pasti JP Togel Online Dari Bandar JEDERWD.
                            </p>
                            <div style="display: flex; justify-content: flex-end;">
                                <button style="font-weight:bold; font-size:13px;border:none;color:white" type="button"
                                    class="btn button-17 btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal${result.id}">
                                    <i class="fa-solid fa-eye"></i> Lihat Prediksi
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal${result.id}" tabindex="-1"
                aria-labelledby="exampleModalLabel${result.id}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2c2c2c; color:white">
                            <h1 class="modal-title fs-6" id="exampleModalLabel">LIVE DRAW <span style="text-transform: uppercase">${result.name_pasaran}</span>
                                POOLS
                            </h1>
                        </div>
                        <div class="modal-body" style="background-image: linear-gradient(#ff2d2d, #910505);">
                            <div class="container text-center mb-2">
                                <img src="${pathImage}" class="img-fluid" alt="...">
                            </div>
                            <hr>

                            <div class="container text-center mb-3">
                                <div class="row align-items-center">
                                    <div class="col" style="font-weight:bold; color:white">
                                        <h5>ANGKA MAIN :</h5>
                                        <h5 style="color: #161616; font-weight:bold">${result.angka_main}</h5>
                                        <h5>TOP 3D (BB) :</h5>
                                        <h5 style="color: #161616; font-weight:bold">${result.top_3d}</h5>
                                        <h5>TOP 2D (BB) :</h5>
                                        <h5 style="color: #161616; font-weight:bold">${result.top_2d}</h5>
                                        <h5>COLOK BEBAS :</h5>
                                        <h5 style="color: #161616; font-weight:bold">${result.colok_bebas}</h5>
                                        <h5>COLOK 2D :</h5>
                                        <h5 style="color: #161616; font-weight:bold">${result.colok_2d}</h5>
                                        <h5>SHIO JITU :</h5>
                                        <h5 style="color: #161616; font-weight:bold">${result.shio_jitu}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color:#2c2c2c;color:white">
                            <button type="button" class="btn btn-secondary btn-sm bg-dark"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                    `;

                    resultsContainer.append(resultCard);
                });
            }
        });
    </script>
@endsection

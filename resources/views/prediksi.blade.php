@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">⚜️ JEDERWD - PREDIKSI TOGEL
            HARI
            INI LENGKAP
            2024 ⚜️
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
                url: '/api/prediksi',
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
                var limitedData = data.slice(0, 44);

                $.each(limitedData, function(index, result) {
                    // var pathImage = 'storage/' + result.image;
                    var resultCard = `
                            <div class="mb-2 card w-100"
                style="background-image: linear-gradient(#0e69fb, #071b69);border-radius: 10px;border: solid #214dfd 2px;">
                <div class="row g-0">
                    <div class="col-md-4"
                        style="display: flex; justify-content: center; align-items: center; text-align: center;">
                        <img src="${result.image}" class="img-fluid rounded-start" alt="Gambar">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 style="font-weight:bolder;color: white;" class="card-title">PREDIKSI TOGEL <span style="text-transform: uppercase; font-weight:bold">${result.name_pasaran}</span> POOLS
                                JEDERWD</h6>
                            <p class="card-text" style="color:white">Prediksi Togel <span style="text-transform: uppercase; font-weight:bold;">${result.name_pasaran}</span> ${result.created_at},  Bocoran & Info Akurat yang pasti JP Togel Online Dari Bandar JEDERWD.
                            </p>
                            <div style="display: flex; justify-content: flex-end;">
                                <button style="font-weight:bold; font-size:13px;border:none;color:white" type="button"
                                    class="mb-2 btn button-17 btn-sm" data-bs-toggle="modal"
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
                            <button type="button" style="color: white;font-size: 10px;border: solid white 1px;background-color: white;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="background-image: linear-gradient(#0e69fb, #071b69);">
                            <div class="container mb-2 text-center">
                                <img src="${result.image}" class="img-fluid" alt="...">
                            </div>
                            <hr>

                            <div class="container mb-3 text-center" style="overflow-wrap: break-word;">
                                <div class="row align-items-center">
                                    <div class="col" style="font-weight:bold; color:white">
                                        <h5>ANGKA MAIN :</h5>
                                        <h5 style="color: #fff900; font-weight:bold; letter-spacing:1px">${result.angka_main}</h5>
                                        <h5>TOP 4D (BB) :</h5>
                                        <h5 style="color: #fff900; font-weight:bold; letter-spacing:1px">${result.top_4d !== null ? result.top_4d : "-"}</h5>
                                        <h5>TOP 3D (BB) :</h5>
                                        <h5 style="color: #fff900; font-weight:bold; letter-spacing:1px">${result.top_3d}</h5>
                                        <h5>TOP 2D (BB) :</h5>
                                        <h5 style="color: #fff900; font-weight:bold; letter-spacing:1px">${result.top_2d}</h5>
                                        <h5>COLOK BEBAS :</h5>
                                        <h5 style="color: #fff900; font-weight:bold; letter-spacing:1px">${result.colok_bebas}</h5>
                                        <h5>COLOK 2D :</h5>
                                        <h5 style="color: #fff900; font-weight:bold; letter-spacing:1px">${result.colok_2d}</h5>
                                        <h5>SHIO JITU :</h5>
                                        <h5 style="color: #fff900; font-weight:bold; letter-spacing:1px; text-transform:capitalize">${result.shio_jitu}</h5>
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

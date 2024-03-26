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
                    console.log(data);
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
                    var resultCard = `
                <div class="mb-2 card w-100" style="background-image: linear-gradient(#0e69fb, #071b69);border-radius: 10px;border: solid #214dfd 2px;">
                    <div class="row g-0">
                        <div class="col-md-4" style="display: flex; justify-content: center; align-items: center; text-align: center;">
                            <img src="${result.image}" class="img-fluid rounded-start" alt="Gambar">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 style="font-weight:bolder;color: white;" class="card-title">PREDIKSI TOGEL <span style="text-transform: uppercase; font-weight:bold">${result.name_pasaran}</span> POOLS JEDERWD</h6>
                                <p class="card-text" style="color:white">Prediksi Togel <span style="text-transform: uppercase; font-weight:bold;">${result.name_pasaran}</span> ${result.created_at},  Bocoran & Info Akurat yang pasti JP Togel Online Dari Bandar JEDERWD.</p>
                                <div style="display: flex; justify-content: flex-end;">
                                    <button style="font-weight:bold; font-size:13px;border:none;color:white" type="button"
                                    class="mb-2 btn button-17 btn-sm btn-sm btn-lihat-prediksi" data-pasaran="${result.name_pasaran}">
                                    <i class="fa-solid fa-eye"></i> Lihat Prediksi
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                    resultsContainer.append(resultCard);
                });

                // Event listener for the button
                $('.btn-lihat-prediksi').click(function() {
                    var pasaran = $(this).data('pasaran');
                    window.location.href = '/prediksi?pasaran=' + pasaran;
                });
            }
        });
    </script>
@endsection

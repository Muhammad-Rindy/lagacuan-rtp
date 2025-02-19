@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#101010eb; padding:5px 0px; color:white" class="judul-page">⚜️
            LAGACUAN - BUKTI JACKPOT
            KEMENANGAN PLAYER ⚜️
        </h6>
    </main>
    <main class="container" style="margin-top: -8px;flex: 1;">
        <div class="row row-cols-1 row-cols-md-4 g-4" id="results-container">

        </div>
    </main>
    <script>
        $(document).ready(function() {
            // AJAX request to fetch data
            $.ajax({
                url: '/api/bukti',
                method: 'GET',
                success: function(data) {
                    // Handle the successful response and update the results container
                    displayResults(data);
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });

            // Event handler for "Show" button click
            $(document).on('click', '.show-details', function() {
                var id = $(this).data('id');
                // Redirect to new page with ID and IDs of two previous data
                window.location.href = '/details?id=' + id;
            });

            function displayResults(data) {
                // Iterate through the data and append it to the results container
                var resultsContainer = $('#results-container');

                $.each(data, function(index, result) {
                    var resultCard = `
                <div class="col">
                    <div class="card h-100"
                        style="background-image: linear-gradient(225deg, #350000 0%, #fb1e1e 50%, #b90000 100%); color:white; border: solid #ff1b1b 3px; border-bottom-left-radius:20px; border-bottom-right-radius:20px;">
                        <img style="background-color: white" src="${result.image}" class="card-img-top" alt="Gambar">
                        <div class="card-body">
                            <div style="text-transform:uppercase" class="card-desc card-text h5">${result.title}</div>
                            <div style="text-transform:capitalize" class="card-desc card-text h5">${result.description}</div>
                            <hr/>
                            <div class="card-title h6">${result.tanggal}</div>
                                <div class="d-grid gap-2 mt-4">
                                    <button style="font-weight:bold; font-size:13px;border:none;color:white" type="button"
                                    class="mb-2 btn button-jp btn-sm btn-sm show-details" data-id="${result.id}">
                                     <span style="margin-right:10px">Read more</span><i class="fa-solid fa-circle-chevron-right"></i>
                                </button>
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

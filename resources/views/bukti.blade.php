@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">⚜️ JEDERWD - BUKTI JACKPOT
            KEMENANGAN PLAYER ⚜️
        </h6>
    </main>
    <main class="container mb-5">
        <div class="row row-cols-1 row-cols-md-4 g-4" id="results-container">

        </div>
    </main>
    <script>
        $(document).ready(function() {
            // AJAX request to fetch data

            var baseUrl = "{{ url('/') }}";

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

            function displayResults(data) {
                // Iterate through the data and append it to the results container
                var resultsContainer = $('#results-container');

                $.each(data, function(index, result) {
                    // var pathImage = 'storage/' + result.image;
                    var resultCard = `
                    <div class="col">
                <div class="card h-100"
                    style="background-color: #c70000; color:white; border:solid #ef0000 2px; border-bottom-left-radius:20px; border-bottom-right-radius:20px">
                    <img style="background-color: white" src="${result.image}" class="card-img-top" alt="Gambar">
                    <div class="card-body">
                        <div style="text-transform:uppercase" class="card-text h5">${result.title}</div>
                        <div class="card-title h6">${result.created_at}</div>
                        <div style="text-transform:capitalize" class="card-text h5">${result.description}</div>
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

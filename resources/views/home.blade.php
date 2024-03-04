@extends('layouts.master')

@section('content')
    <main class="container">
        <div id="results-container" class="row row-cols-1 row-cols-md-4 g-4 mb-5">

        </div>
    </main>


    <script>
        $(document).ready(function() {
            // AJAX request to fetch data
            $.ajax({
                url: 'http://127.0.0.1:8000/api/result',
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
                    var resultCard = `
                <div class="col">
                    <div class="card h-100 card-red">
                        <img style="padding: 25px 70px 0px 70px" src="${result.image}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div style="text-align: center; text-transform:uppercase">
                                <h6 class="card-title">${result.name_pasaran}</h6>
                            </div>
                            <div class="container-brunei">${result.result}</div>
                            <p class="mt-2" style="text-align: center; font-weight:bold; font-size:15px">
                                ${result.created_at}
                            </p>
                            <div style="text-decoration: none; color:white; font-weight:bold; cursor:context-menu">
                                <div class="button-1"><i class="fa-solid fa-circle-exclamation"></i> LIVEDRAW

                                </div>
                            </div>
                            <div style="text-decoration: none; color:white; font-weight:bold; cursor:context-menu">
                                <div class="button-1"><i class="fa-solid fa-circle-exclamation"></i> PREDIKSI

                                </div>
                            </div>
                            <div style="text-decoration: none; color:white; font-weight:bold; cursor:context-menu">
                                <div class="button-1"><i class="fa-solid fa-circle-exclamation"></i> RESULT

                                </div>
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

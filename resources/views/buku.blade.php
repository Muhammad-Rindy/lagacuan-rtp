@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">⚜️ JEDERWD - BUKU MIMPI ⚜️
        </h6>
    </main>
    <main class="container mb-5">
        <div id="results-container">

        </div>
    </main>
    <script>
        $(document).ready(function() {
            // AJAX request to fetch data

            var baseUrl = "{{ url('/') }}";

            $.ajax({
                url: '/api/buku',
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
                var resultsContainer = $('#results-container');
                var carouselInner = $('<div class="carousel-inner"></div>');

                $.each(data, function(index, result) {
                    var pathImage = 'storage/' + result.image;
                    var carouselItem = `
            <div class="carousel-item ${index === 0 ? 'active' : ''}">
                <img style="border-radius: 10px" src="${pathImage}" class="d-block w-100" alt="...">
                <div class="carousel-description">
                    <h6 class="mt-2" style="text-align: center; background-color: #181818;border-radius: 3px;text-align:left; padding:7px; color:white">${result.description}</h6>
                </div>
            </div>
        `;
                    carouselInner.append(carouselItem);
                });

                // Append the carousel inner to the results container
                resultsContainer.prepend('<div id="carouselExample" class="carousel slide"></div>');
                $('#carouselExample').append(carouselInner);

                // Add carousel controls
                $('#carouselExample').append(`
        <button style="font-weight: bolder" class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    `);

                // Initialize the carousel
                $('#carouselExample').carousel();
            }



        });
    </script>
@endsection

@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">⚜️ JEDERWD - BUKU MIMPI ⚜️
        </h6>
    </main>
    <main class="container mb-5">
        <div id="results-container"></div>
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
                let template = $(`
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">

                        </div>
                        <button style="font-weight: bolder" class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                `);

                data = data.map((e, i) => {
                    return `
                        <div class="carousel-item ${i == 0 ? 'active' : ''}">
                            <div class="pt-2 rounded" style="background-color: #181818; min-height: 200px">
                                <div class="px-4 mb-2 ${e.description != '' ? '' : 'd-none'}">
                                    <p>${e.description}</p>
                                </div>
                                ${e.image ? '<img src="'+e.image+'" class="w-100 rounded-bottom" alt="...">' : ''}
                            </div>
                        </div>
                    `;
                });

                template.find(".carousel-inner").html(data.join(""));

                // Initialize the carousel
                template.carousel();

                $("#results-container").html(template);
            }
        });
    </script>
@endsection

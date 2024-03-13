@extends('layouts.master')

@section('content')
    <main class="container">
        <div id="results-container" class="row row-cols-1 row-cols-md-4 mb-5">
        </div>
    </main>


    <script>
        $(document).ready(function() {
            // AJAX request to fetch data

            var baseUrl = "{{ url('/') }}";

            $.ajax({
                url: '/api/result',
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
                var limitedData = data.slice(0, 48);

                $.each(limitedData, function(index, result) {
                    var pathImage = 'storage/' + result.image;
                    var resultCard = `
                <div class="col" style="padding:8px">
                    <div class="card h-100 card-red">
                        <img style="padding: 25px 70px 0px 70px" src="${pathImage}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div style="text-align: center; text-transform:uppercase">
                                <h6 class="card-title"><span style="text-transform:uppercase;font-weight: bolder;color: #fff900;font-size: 18px;font-family: ubuntu, sans-serif">${result.name_pasaran}</span></h6>

                            </div>

                            <div class="position-relative container-brunei">
                                ${result.result_1}
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:14px;border: solid #ff2626 1px;letter-spacing:0.7px; margin-left:-20px; background-image: linear-gradient(225deg, #9f0000 0%, #ff3e42 46%, #9f0000 100%);">
                                    Prize 1
                                </span>
                            </div>
                             <div class="position-relative container-brunei">
                                ${result.result_2 !== null ? result.result_2 : "-"}  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:14px;border: solid #ff2626 1px;letter-spacing:0.7px; margin-left:-20px; background-image: linear-gradient(225deg, #9f0000 0%, #ff3e42 46%, #9f0000 100%);">
                                    Prize 2
                                </span>
                            </div>
                            <div class="position-relative container-brunei">
                                ${result.result_3 !== null ? result.result_3 : "-"}  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:14px;border: solid #ff2626 1px;letter-spacing:0.7px; margin-left:-20px; background-image: linear-gradient(225deg, #9f0000 0%, #ff3e42 46%, #9f0000 100%);">
                                    Prize 3
                                </span>
                            </div>
                            <p class="mt-2" style="text-align: center; font-weight:bolder; font-size:17.5px; color: #fff900;font-family: ubuntu, sans-serif; text-transform:capitalize; margin-bottom:5px">SHIO ${result.shio}</p>
                            <p class="" style="text-align: center; font-weight:bolder; font-size:17px; color: white;font-family: ubuntu, sans-serif">
                                ${result.created_at}
                            </p>
                            <div style="text-decoration: none; font-weight:bold; cursor:context-menu">
                                <a style="color:white;" href="${baseUrl}/live-draw">
                                    <div class="button-1"><i class="fa-solid fa-circle-exclamation"></i> LIVE DRAW <span style="text-transform:uppercase">${result.name_pasaran}</span></div>
                                </a>
                            </div>
                            <div style="text-decoration: none; font-weight:bold; cursor:context-menu">
                                <a style="color:white;" href="${baseUrl}/prediksi-togel">
                                    <div class="button-1"><i class="fa-solid fa-circle-exclamation"></i> PREDIKSI <span style="text-transform:uppercase">${result.name_pasaran}</span></div>
                                </a>
                            </div>
                            <div style="text-decoration: none; font-weight:bold; cursor:context-menu">
                                <a style="color:white;" href="${baseUrl}/data-result">
                                    <div class="button-1"><i class="fa-solid fa-circle-exclamation"></i> RESULT <span style="text-transform:uppercase">${result.name_pasaran}</span></div>
                                </a>
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

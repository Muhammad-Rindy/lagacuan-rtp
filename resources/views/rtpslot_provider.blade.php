@extends('layouts.master')
<style>
    .provider {
        background-image: linear-gradient(132deg, #fbf370 0%, #b18a06 85%);
        border-radius: 8px;
        padding: 0px 8px;
        border: solid #ffd800 2px;
        margin: 20px 0px;
    }

    .provider-game {
        background-image: linear-gradient(132deg, #fbf370 0%, #b18a06 85%);
        padding: 8px;
        border: solid #ffd800 2px;
        border-radius: 3px;
        transition: transform .2s;
    }

    .provider-game:hover {
        transform: scale(1.1);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>
@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD -
            {{ strtoupper($provider) }} RTPSLOT
        </h6>
    </main>
    <div class="container">
        <div class="container pb-3 pt-3 mb-2" style="background: #4f4f4fb8;border-radius: 10px;">

            <h4 class="text-center" style="color: white">
                {{ now()->format('l, F j, Y') }}
            </h4>
            <div class="d-flex align-item-center justify-content-around">
                <div class="provider">
                    <img class="provider" src={{ asset('/images/logo_provider/' . $provider . '.png') }} alt=""
                        width="75">
                </div>
            </div>
        </div>
    </div>
    <main class="container mb-5">
        <div class="row row-cols-1 row-cols-md-6 g-6 mb-5">
            @foreach ($games as $item)
                <div class="col mb-2">
                    <div class="card h-100 shadow lazy-image"
                        style="background-image: linear-gradient(90deg, #1b44c5 14%, #3b9ee4 70%);border: solid #198cf5 3px; color:white">
                        <a href="https://jederwd.org/#/index?category=home" class="provider-game">
                            <img style="" src="{{ asset($item['image']) }}" class="card-img-top" alt="...">
                        </a>
                        <hr>
                        <p class=""
                            style="text-align: center;
            font-weight: bold;
            background-image: linear-gradient(0deg, #16379f 14%, #50a7e5 70%);border: solid #198cf5 2px; border-radius:25px;
            margin: 5px 15px 15px 15px;">
                            Pola

                        </p>
                        <p style="font-family: math" class="text-center">{!! $item['pola'] !!}</p>

                    </div>
                </div>
            @endforeach
        </div>
    </main>
    <script>
        function lazyLoad() {
            const lazyImages = document.querySelectorAll('.lazy-image');

            lazyImages.forEach((lazyImage) => {
                if (lazyImage.getBoundingClientRect().top < window.innerHeight) {
                    lazyImage.classList.remove('lazy-image');
                }
            });
        }

        // Event listener untuk memicu lazy loading ketika scroll
        document.addEventListener('scroll', lazyLoad);

        // Memuat gambar secara lazy saat halaman dimuat
        window.addEventListener('DOMContentLoaded', lazyLoad);
    </script>
@endsection

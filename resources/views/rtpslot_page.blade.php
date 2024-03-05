@extends('layouts.master')
<style>
    .card {
        width: 13rem;
    }
</style>
@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD - RTPSLOT
        </h6>
    </main>
    <div class="container">
        <div class="container pb-3 pt-3 mb-2" style="background: #4f4f4fb8;border-radius: 10px;">

            <h4 class="text-center" style="color: white">
                {{ now()->format('l, F j, Y') }}
            </h4>
            <div class="d-flex align-item-center justify-content-around">
                @foreach ($provider as $item)
                    <a target="_blank" href="/rtpslot/{{ $item['provider_name'] }}">
                        <img src="{{ asset($item['img_url']) }}" alt={{ $item['provider_name'] }}>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <main class="container mb-5">
        <div class="row row-cols-1 row-cols-md-6 g-6 mb-5">
            @foreach ($data as $item)
                <div class="col mb-2">
                    <div class="card h-100 shadow lazy-image"
                        style="background-image: linear-gradient(#0e69fb, #071b69);border: solid #4369ff 2px; color:white">
                        <img style="" src="{{ asset($item['image']) }}" class="card-img-top" alt="...">

                        <hr>
                        <p class=""
                            style="text-align: center;
            font-weight: bold;
            background-color: #1c79e5;
            border-radius: 25px;
            border: solid #001aad 2px;
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

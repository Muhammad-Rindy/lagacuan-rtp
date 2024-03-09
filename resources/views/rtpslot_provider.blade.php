@extends('layouts.master')
<style>
    .provider {
        background-image: linear-gradient(132deg, #fbf370 0%, #998f11 85%);
        border-radius: 8px;
        padding: 15px;
        border: solid #ffd800 2px;
        margin: 30px 0px;
    }



    .provider-game:hover {
        transform: scale(1.1);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

    @media screen and (min-width: 900px) {

        .card-rtp-new {
            background-image: linear-gradient(45deg, #0d3cd1 14%, #396dff 70%);
            border: solid #198cf5 3px;
        }

        .pola-set {
            font-family: math;
            background-color: #00000096;
            margin: 5px 10px;
            padding: 5px 0px;
            border-radius: 5px;
            font-size: 13px;
        }

        .provider-game {
            background-image: linear-gradient(132deg, #fbf475 0%, #c3b60c 85%);
            padding: 8px;
            border: solid #ffd800 2px;
            border-radius: 3px;
            transition: transform .2s;
        }

        .bar-persen {
            margin: 0px 12px -8px 12px;
            height: 18px;
            border-radius: 20px
        }


        .img-rtp {
            height: 110px;
        }

        .box-pola {
            text-align: center;
            font-weight: bold;
            background-image: linear-gradient(0deg, #16379f 14%, #50a7e5 70%);
            border: solid #198cf5 2px;
            border-radius: 25px;
            margin: -5px 15px 5px 15px;
        }

        .box-pola-span {
            font-size: 14px;
            letter-spacing: 1px
        }
    }

    @media screen and (max-width: 900px) {

        .card-rtp-new {
            background-image: linear-gradient(45deg, #0d3cd1 14%, #396dff 70%);
            border: solid #198cf5 2px;
        }

        .pola-set {
            font-family: math;
            background-color: #00000096;
            margin: 5px 3px;
            padding: 5px 0px;
            border-radius: 5px;
            font-size: 11px;
        }

        .box-pola {
            text-align: center;
            font-weight: bold;
            background-image: linear-gradient(0deg, #16379f 14%, #50a7e5 70%);
            border: solid #198cf5 2px;
            border-radius: 25px;
            margin: -8px 3px 3px 3px;
        }

        .box-pola-span {
            font-size: 11px
        }

        .provider-game {
            background-image: linear-gradient(132deg, #fbf475 0%, #c3b60c 85%);
            padding: 1px;
            border: solid #ffd800 1px;
            border-radius: 3px;
        }

        .bar-persen {
            margin: 0px 3px -8px 3px;
        }

        .img-rtp {
            height: 110px;
        }
    }


    .bg-animasi {
        background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
    }
</style>
@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">⚜️ JEDERWD -
            {{ strtoupper($provider) }} RTPSLOT ⚜️
        </h6>
    </main>
    <div class="container">
        <div class="container pb-3 pt-3 mb-2" style="background: #4f4f4fb8;border-radius: 10px;">

            <h4 class="text-center" style="color: white">
                ⏱️ {{ now()->format('l, F j, Y') }}
            </h4>
            <div class="d-flex align-item-center justify-content-around">
                <div class="provider">
                    <img src={{ asset('/images/logo_provider/' . $provider . '.png') }} alt="" width="50">
                </div>
            </div>
        </div>
    </div>
    <main class="container mb-5">
        <div class="row row-cols-1 row-cols-md-6 g-6 mb-5">
            @foreach ($games as $item)
                <div class="col-4" style="padding: 7px;">
                    <div class="card h-100 shadow lazy-image card-rtp-new" style="color: white;border: solid #198cf5 3px">
                        <a href="{{ $item['url'] }}" class="provider-game">
                            <img src="{{ asset($item['image']) }}" class="card-img-top img-new" alt="...">
                        </a>
                        <div class="progress mt-2 bar-persen">
                            @php
                                $persentase = intval($item['persentase']);
                                $color = '';
                                if ($persentase >= 30 && $persentase <= 40) {
                                    $color = 'bg-danger bg-animasi';
                                } elseif ($persentase >= 41 && $persentase <= 60) {
                                    $color = 'bg-warning bg-animasi';
                                } elseif ($persentase >= 61 && $persentase <= 100) {
                                    $color = 'bg-success bg-animasi';
                                }
                            @endphp
                            <div class="progress-bar {{ $color }}" role="progressbar"
                                style="width: {{ $persentase }}%;" aria-valuenow="{{ $persentase }}" aria-valuemin="0"
                                aria-valuemax="100">{{ $persentase }}%</div>
                        </div>
                        <hr style="border-top: 5px double white;">
                        <a href="{{ $item['url'] }}" style="color: white; text-decoration:none">
                            <div class="box-pola" style=""><span class="box-pola-span">Pola</span></div>
                        </a>
                        <div style="" class="text-center pola-set">{!! $item['pola'] !!}</div>
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

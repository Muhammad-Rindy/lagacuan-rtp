@extends('layouts.master')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
    @media screen and (min-width: 950px) {
        .button-swip-right {
            margin-right: 300px;
            margin-top: 1090px;
            font-size: 5px;
        }

        .button-swip-left {
            margin-left: 300px;
            margin-top: 1090px;
        }

        .container-mobile {
            margin: 0px 450px;
        }

        .new-content {
            width: 90%;
            max-width: 1300px;
            margin: 0 auto;
            overflow: hidden;
        }
    }

    @media screen and (min-width: 420px) and (max-width: 950px) {
        .button-swip-right {
            margin-top: 1010px;

        }

        .button-swip-left {
            margin-top: 1010px;
        }

        .new-content {
            width: 90%;
            max-width: 330px;
            margin: 0 auto;
            overflow: hidden;
        }
    }



    @media screen and (min-width: 390px) and (max-width: 420px) {
        .button-swip-right {
            margin-top: 1050px;

        }

        .button-swip-left {
            margin-top: 1050px;
        }

        .new-content {
            width: 90%;
            max-width: 270px;
            margin: 0 auto;
            overflow: hidden;
        }
    }

    @media screen and (min-width: 100px) and (max-width: 390px) {
        .button-swip-right {
            margin-top: 2000px;

        }

        .button-swip-left {
            margin-top: 2000px;
        }

        .new-content {
            width: 90%;
            max-width: 270px;
            margin: 0 auto;
            overflow: hidden;
        }
    }
</style>
@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#101010eb; padding:5px 0px; color:white">⚜️ LAGACUAN - PREDIKSI TOGEL
            <span style="text-transform:uppercase">{{ $pasaran }}</span> TERLENGKAP 2024 ⚜️
        </h6>
    </main>
    <main class="container mb-5" style="text-align: center;padding: 10px;margin-top: -8px;flex: 1;">
        <div class="card-red container-mobile">
            <div class="mt-4" style="text-align: center; text-transform:uppercase">
                <h6 class="card-title"><span
                        style="text-transform:uppercase;font-weight: bolder;color: #fff900;font-size: 19px;font-family: ubuntu, sans-serif">{{ $pasaran }}</span>
                </h6>
                <div id="created_at" style="font-weight: bolder;font-size:14px; color:white">
                    {{ $data->first()->created_at }}</div>
            </div>
            <img width="180" style="margin: 13px" src="{{ $data->first()->image }}" alt="gambar">
            <div class="card-body">
                <div class=""
                    style="text-align: center; font-weight:bolder; font-size:19px; color: white;font-family: ubuntu, sans-serif">
                    Angka Main
                </div>
                <p id="angka-main"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: #fff900;font-family: ubuntu, sans-serif; text-transform:capitalize; margin-bottom:5px">
                    {{ $data->first()->angka_main }}</p>
                <div class="mt-2"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: white;font-family: ubuntu, sans-serif">
                    TOP 4D (BB)
                </div>
                <p id="top_4d"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: #fff900;font-family: ubuntu, sans-serif; text-transform:capitalize; margin-bottom:5px">
                    {{ $data->first()->top_4d }}</p>
                <div class="mt-2"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: white;font-family: ubuntu, sans-serif">
                    TOP 3D (BB)
                </div>
                <p id="top_3d"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: #fff900;font-family: ubuntu, sans-serif; text-transform:capitalize; margin-bottom:5px">
                    {{ $data->first()->top_3d }}</p>
                <div class="mt-2"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: white;font-family: ubuntu, sans-serif">
                    TOP 2D (BB)
                </div>
                <p id="top_2d"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: #fff900;font-family: ubuntu, sans-serif; text-transform:capitalize; margin-bottom:5px">
                    {{ $data->first()->top_2d }}</p>
                <div class="mt-2"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: white;font-family: ubuntu, sans-serif">
                    COLOK BEBAS
                </div>
                <p id="colok_bebas"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: #fff900;font-family: ubuntu, sans-serif; text-transform:capitalize; margin-bottom:5px">
                    {{ $data->first()->colok_bebas }}</p>
                <div class="mt-2"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: white;font-family: ubuntu, sans-serif">
                    COLOK 2D
                </div>
                <p id="colok_2d"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: #fff900;font-family: ubuntu, sans-serif; text-transform:capitalize; margin-bottom:5px">
                    {{ $data->first()->colok_2d }}</p>
                <div class="mt-2"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: white;font-family: ubuntu, sans-serif">
                    SHIO JITU
                </div>
                <p id="shio_jitu" class="mb-4"
                    style="text-align: center; font-weight:bolder; font-size:19px; color: #fff900;font-family: ubuntu, sans-serif; text-transform:capitalize; margin-bottom:5px">
                    {{ $data->first()->shio_jitu }}</p>
            </div>
        </div>
    </main>


    <!-- Sertakan Swiper.js -->
@endsection

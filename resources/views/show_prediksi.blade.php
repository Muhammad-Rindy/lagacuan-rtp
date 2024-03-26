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
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">⚜️ JEDERWD - PREDIKSI TOGEL
            <span style="text-transform:uppercase">{{ $pasaran }}</span> TERLENGKAP 2024 ⚜️
        </h6>
    </main>
    <main class="container"
        style="text-align: center;background-color: #8989894a;border-radius: 10px 10px 0px 0px;padding: 10px;">
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
    <main class="container" style="text-align: center;background-color: #8989894a;">
        <div style="text-align: center; padding:5px 0px; color:white; font-weight:bold">PREDIKSI TANGGAL SEBELUMNYA
        </div>
    </main>
    <main class="container mb-3"
        style="text-align: center;background-color: #8989894a;border-radius: 0px 0px 10px 10px;padding: 10px;">
        <div class="swiper-container new-content">
            <div class="swiper-wrapper" style="height:350px">
                @foreach ($data as $index => $prediksi)
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card card-red" style="border-radius:6px">
                                <div class="mt-4" style="text-align: center; text-transform:uppercase">
                                    <h6 class="card-title"><span
                                            style="text-transform:uppercase;font-weight: bolder;color: #fff900;font-size: 19px;font-family: ubuntu, sans-serif">{{ $pasaran }}</span>
                                    </h6>
                                </div>
                                <img style="padding: 10px 70px 0px 70px" src="{{ $prediksi->image }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body">

                                    <div class=""
                                        style="text-align: left; font-weight:bolder; font-size:15px; color: white;font-family: ubuntu">
                                        Prediksi <span
                                            style="color: #fff900; text-transform:capitalize">{{ $prediksi->name_pasaran }}</span>
                                        Tanggal
                                        <span style="color: #fff900">{{ $prediksi->created_at }}</span> di <span
                                            style="color: #fff900">JederWD</span>.
                                        <br>

                                    </div>
                                </div>
                                <button style="margin: 5px; border-radius:100px; font-size:12px"
                                    class="button-17 show-button" data-angka-main="{{ $prediksi->angka_main }}"
                                    data-top-4d="{{ $prediksi->top_4d }}" data-colok_bebas="{{ $prediksi->colok_bebas }}"
                                    data-top_2d="{{ $prediksi->top_2d }}" data-top_2d="{{ $prediksi->top_2d }}"
                                    data-colok_2d="{{ $prediksi->colok_2d }}" data-shio_jitu="{{ $prediksi->shio_jitu }}"
                                    data-top-3d="{{ $prediksi->top_3d }}" data-top-3d="{{ $prediksi->top_3d }}"
                                    data-created_at="{{ $prediksi->created_at }}"><i class="fa-solid fa-eye"></i> Lihat
                                    Prediksi
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next button-swip-right"></div>
            <div class="swiper-button-prev button-swip-left"></div>
        </div>


        <!-- Navigasi slider -->

    </main>
    <!-- Sertakan Swiper.js -->

    <script>
        // Inisialisasi Swiper
        var swiper = new Swiper('.swiper-container', {
            // Konfigurasi tambahan jika diperlukan
            slidesPerView: 4,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // Mendengarkan perubahan ukuran layar
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 768) {
                swiper.params.slidesPerView = 1;
            } else {
                swiper.params.slidesPerView = 4;
            }
            swiper.update();
        });



        // Event untuk menampilkan data saat tombol diklik
        var showButtons = document.querySelectorAll('.show-button');

        showButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var angkaMain = this.getAttribute('data-angka-main');
                var top4d = this.getAttribute('data-top-4d');
                var top3d = this.getAttribute('data-top-3d');
                var colok_bebas = this.getAttribute('data-colok_bebas');
                var top_2d = this.getAttribute('data-top_2d');
                var colok_2d = this.getAttribute('data-colok_2d');
                var shio_jitu = this.getAttribute('data-shio_jitu');
                var created_at = this.getAttribute('data-created_at');

                document.querySelector('#angka-main').innerText = angkaMain;
                document.querySelector('#top_4d').innerText = top4d;
                document.querySelector('#top_3d').innerText = top3d;
                document.querySelector('#colok_bebas').innerText = colok_bebas;
                document.querySelector('#top_2d').innerText = top_2d;
                document.querySelector('#colok_2d').innerText = colok_2d;
                document.querySelector('#created_at').innerText = created_at;
            });
        });
    </script>
@endsection

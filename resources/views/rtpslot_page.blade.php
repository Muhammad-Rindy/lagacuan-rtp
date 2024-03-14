@extends('layouts.master')
<style>
    .provider {
        background-image: linear-gradient(132deg, #fbf370 0%, #998f11 85%);
        border-radius: 8px;
        padding: 20px;
        margin: 30px 0px;
        border: solid #ffd800 2px;
        transition: transform .2s;
    }

    .provider:hover {
        transform: scale(1.5);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

    .provider.active {
        transform: scale(1.2);
    }

    .provider-game {
        background-image: linear-gradient(132deg, #fbf475 0%, #c3b60c 85%);
        padding: 8px;
        border-radius: 3px;
        border: solid #ffd800 2px;
        transition: transform .2s;
    }

    .provider-game:hover{
        transform: scale(1.1);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

    @media screen and (min-width: 900px) {
        .img-rtp {
            height: 110px;
        }

        .provider-img {
            display: flex;
        }

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

        .box-pola {
            text-align: center;
            font-weight: bold;
            background-image: linear-gradient(0deg, #16379f 14%, #50a7e5 70%);
            border: solid #198cf5 2px;
            border-radius: 25px;
            margin: -5px 15px 5px 15px;
        }

        .box-pola,
        span {
            font-size: 14px;
            letter-spacing: 1px
        }


    }

    @media screen and (max-width: 900px) {

        .provider-game {
            background-image: linear-gradient(132deg, #fbf475 0%, #c3b60c 85%);
            padding: 1px;
            border: solid #ffd800 1px;
            border-radius: 3px;
        }

        .provider-img {
            display: grid;
            grid-template-columns: auto auto auto;
        }

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
            font-size: 11px;
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

    }

    .bg-animasi {
        background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
    }

    @keyframes pulse {
        50% {
            opacity: .5;
        }
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(.4,0,.6,1) infinite;
    }
</style>
@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">⚜️ JEDERWD - RTPSLOT ⚜️
        </h6>
    </main>
    <div class="container">
        <div class="container pt-3 pb-3 mb-2" style="background: #4f4f4fb8;border-radius: 10px;">

            <h4 class="text-center" style="color: white">
                ⏱️ {{ now()->format('l, F j, Y') }}
            </h4>
            <div class="align-item-center justify-content-around provider-img">
                @foreach ($provider as $item)
                    <a class="provider" href="javascript:void(0);" data-name="{{ $item->provider_name }}">
                        <img src="{{ asset($item->img_url) }}" alt={{ $item->provider_name }}>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <input type="text" class="form-control" placeholder="Cari game disini..." id="cariGame">
    </div>
    <main class="container mb-5">
        <div class="mb-5 row row-cols-1 row-cols-md-6 g-6" id="loading">
            @for ($i=0; $i < 12; $i++)
                <div class="col-4 data_rtp" style="padding: 7px;">
                    <div class="shadow card h-100 lazy-image card-rtp-new" style="color: white;border: solid #198cf5 3px">
                        <div style="width: 100%; height: 100px; background: #e2e8f0; border-radius: 3px" class="animate-pulse"></div>
                        <div class="mt-2 progress bar-persen animate-pulse" style="background: #e2e8f0"></div>
                        <hr style="border-top: 5px double white;">
                        <div class="box-pola animate-pulse" style="height: 25px;"></div>
                        <div class="text-center pola-set animate-pulse" style="height: 70px"></div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="mb-5 row row-cols-1 row-cols-md-6 g-6" id="rtpArea" style="display: none">
        </div>
    </main>
    <script>
        let provider = "all";
        let search = "";
        let loading = $("#loading");
        let rtpArea = $("#rtpArea");

        $(".provider").click(function(e) {
            let dtProvider = $(this).attr("data-name");
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                provider = "all";
            }else{
                $(this).closest(".provider-img").find(".provider").removeClass("active");
                $(this).addClass("active");
                provider = dtProvider;
            }

            getData();
        });

        $("#cariGame").keyup(function (e) {
            search = e.target.value;
            if (search.length == 0 || search.length >= 3) {
                getData();
            }
        });

        getData();

        function getData() {
            loading.show();
            rtpArea.hide();
            let url = `/rtpslot/${provider}?q=`+search;
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function (res) {
                    res = res.map(e => {
                        return `
                            <div class="col-4 data_rtp" style="padding: 7px;">
                                <div class="shadow card h-100 lazy-image card-rtp-new" style="color: white;border: solid #198cf5 3px">
                                    <a href="${e.url}" class="provider-game">
                                        <img src="${e.image}" class="card-img-top img-new" alt="...">
                                    </a>
                                    <div class="mt-2 progress bar-persen">
                                        <div class="progress-bar ${
                                            e.persentase >= 30 && e.persentase <= 40 ? 'bg-danger bg-animasi' :
                                            e.persentase >= 41 && e.persentase <= 60 ? 'bg-warning bg-animasi' :
                                            e.persentase >= 61 && e.persentase <= 100 ? 'bg-success bg-animasi' : ''
                                        }" role="progressbar" style="width: ${e.persentase}%;" aria-valuenow="${e.persentase}" aria-valuemin="0" aria-valuemax="100">${e.persentase}%</div>
                                    </div>
                                    <hr style="border-top: 5px double white;">
                                    <a href="${e.url}" style="color: white; text-decoration:none">
                                        <div class="box-pola" style=""><span class="box-pola-span">${e.name != '' ? e.name : 'Pola'}</span></div>
                                    </a>
                                    <div style="" class="text-center pola-set">${e.pola}</div>
                                </div>
                            </div>
                        `;
                    });

                    rtpArea.html(res.join(""));
                    setTimeout(() => {
                        loading.hide();
                        rtpArea.show();
                    }, 1000);
                }
            });
        }

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

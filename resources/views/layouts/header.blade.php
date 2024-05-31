<header class="py-3 lh-1" style="padding: 20px 25px;background-color: #101010eb;border-bottom: solid #ffcf00 2px">
    <div id="results-contact">

    </div>
</header>

{{-- Desktop --}}
<div class="py-1 mb-1 nav-scroller nav-desktop" style="border-bottom: solid #ffcf00 2px; background-color:#313131c2">
    <nav class="nav nav-underline justify-content-between">
        <a @if (request()->is('/')) class="actives" @endif class="nav-item nav-link no-actived" href="/"
            style="margin-left:15px;">
            <span class="head-2">
                <i class="fa-solid fa-house"></i>
                HOME
            </span>
        </a>
        <a @if (request()->is('live-draw')) class="actives" @endif class="nav-item nav-link no-actived"
            href="/live-draw" style="">
            <span class="head-2">
                LIVE DRAW 🔥
            </span>
        </a>
        <a @if (request()->is('prediksi-togel')) class="actives" @endif class="nav-item nav-link no-actived"
            href="prediksi-togel" style="">
            <span class="head-2">
                PREDIKSI TOGEL
            </span>
        </a>

        <a @if (request()->is('data-result')) class="actives" @endif class="nav-item nav-link no-actived"
            href="/data-result" style="">
            <span class="head-2">
                DATA RESULT
            </span>
        </a>
        <a @if (request()->is('bukti-jackpot')) class="actives" @endif class="nav-item nav-link no-actived"
            href="/bukti-jackpot" style="">
            <span class="head-2">
                BUKTI JACKPOT 🔥
            </span>
        </a>
        <a @if (request()->is('buku-mimpi')) class="actives" @endif class="nav-item nav-link no-actived"
            href="/buku-mimpi" style="">
            <span class="head-2">
                BUKU MIMPI
            </span>
        </a>

        <a @if (request()->is('keluhan')) class="actives" @endif class="nav-item nav-link no-actived" href="/keluhan"
            style="">
            <span class="head-2">KELUHAN</span>
        </a>
        <a href="{{ env('DOMAIN_UTAMA_ACTIVE') }}/#/gameRules" @if (request()->is('cara-bermain')) class="actives" @endif
            target="_blank" class="nav-item nav-link no-actived" style="margin-right:15px">
            <span class="head-2">
                CARA BERMAIN
            </span>
        </a>
    </nav>
</div>
</div>
<main class="container">
    <div class="mb-1 d-flex">
        <i class="fa-solid fa-bullhorn" style="color:#ffcf00;padding:5px 10px; background: #181818"></i>
        <div class="marquee ft-marquee">
            <span>SELAMAT DATANG DI JEDERWD BANDAR TOGEL, LIVE CASINO & SLOT TERBAIK DAN TERPERCAYA DI INDONESIA RAIH
                KEMENANGAN TANPA BATAS BERSAMA KAMI.</span>
        </div>
    </div>
</main>

<main class="container">
    <div id="results-banner" domain="{{ env('DOMAIN_UTAMA_ACTIVE') }}">

    </div>

    {{-- Mobile --}}
    <div class="container mb-2 text-center nav-mobile">
        <div class="mb-1 row align-items-center">
            <div class="col" style="padding: 0px; margin-right:2px">
                <a href="/"><button @if (request()->is('/')) class="actives-mobile" @endif
                        class="button-15" role="button">
                        HOME</button></a>
            </div>
            <div class="col" style="padding: 0px;margin-left:2px">
                <a href="/live-draw"><button @if (request()->is('live-draw')) class="actives-mobile" @endif
                        class="button-15" role="button">
                        LIVE DRAW</button></a>
            </div>
        </div>
        <div class="mb-1 row align-items-center">
            <div class="col" style="padding: 0px; margin-right:2px">
                <a href="/prediksi-togel"><button @if (request()->is('prediksi-togel')) class="actives-mobile" @endif
                        class="button-15" role="button">
                        PREDIKSI TOGEL</button></a>
            </div>
            <div class="col" style="padding: 0px;margin-left:2px">
                <a href="/buku-mimpi"><button @if (request()->is('buku-mimpi')) class="actives-mobile" @endif
                        class="button-15" role="button">
                        BUKU MIMPI</button></a>
            </div>
        </div>
        <div class="mb-1 row align-items-center">
            <div class="col" style="padding: 0px; margin-right:2px">
                <a href="/data-result"><button @if (request()->is('data-result')) class="actives-mobile" @endif
                        class="button-15" role="button">
                        DATA RESULT</button></a>
            </div>
            <div class="col" style="padding: 0px;margin-left:2px">
                <a href="/bukti-jackpot"><button @if (request()->is('bukti-jackpot')) class="actives-mobile" @endif
                        class="button-15" role="button">
                        BUKTI JACKPOT</button></a>
            </div>
        </div>
        <div class="mb-1 row align-items-center">
            <div class="col" style="padding: 0px; margin-right:2px">
                <a href="/keluhan"><button @if (request()->is('keluhan')) class="actives-mobile" @endif
                        class="button-15" role="button">
                        KELUHAN</button></a>
            </div>
            <div class="col" style="padding: 0px;margin-left:2px">
                <a href="{{ env("DOMAIN_UTAMA_ACTIVE") }}/#/gameRules"><button
                        @if (request()->is('cara-bermain')) target="_blank" class="actives-mobile" @endif
                        class="button-15" role="button">
                        CARA BERMAIN</button></a>
            </div>
        </div>
    </div>

    <div class="container mb-1 text-center">
        <div class="row align-items-center">
            <div class="col" style="padding: 0px;">
                <a href="{{ env('DOMAIN_UTAMA_ACTIVE') }}/#/index?category=home"><button class="button-15"
                        style="letter-spacing: 0.5px" role="button"> <i class="fa-solid fa-right-to-bracket"></i>
                        Login</button></a>
            </div>
            <div class="col" style="padding: 0px 7px">
                <a href="{{ env('DOMAIN_UTAMA_ACTIVE') }}/#/activity"><button class="button-16" style="letter-spacing: 0.5px"
                        role="button"> <i class="fa-solid fa-hand-holding-dollar"></i>
                        Promo</button></a>
            </div>
            <div class="col" style="padding: 0px">
                <a href="/rtpslot"><button @if (request()->is('rtpslot')) class="actives-mobile-2" @endif
                        class="button-15" style="letter-spacing: 0.5px" role="button"> <i
                            class="fa-solid fa-gamepad"></i> RTP slot
                    </button></a>
            </div>
        </div>
    </div>
    <div class="mb-1">
        <div class="input-group">
            <span style="border: solid #214dfd 2px; color:white" class="input-group-text winner" style=""
                id="basic-addon3"><i style="margin-right:5px" class="fa-solid fa-trophy"></i> Winner Togel</span>
            <input style="border: solid #214dfd 2px; background-color:#181818; color:white;" type="text"
                class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" disabled>
        </div>
    </div>
    <div class="container mb-1 text-center">
        <div class="row align-items-center">
            <div class="col" style="padding: 0px; margin-right:3px">
                <a href="/"><button @if (request()->is('/')) class="actives-mobile-2" @endif
                        class="button-15" style="letter-spacing: 0.5px" role="button">
                        <i class="fa-solid fa-chart-column"></i> Result Togel</button></a>
            </div>

            <div class="col" style="padding: 0px;margin-left:3px">
                <a href="/jadwal-togel"><button @if (request()->is('jadwal-togel')) class="actives-mobile-2" @endif
                        class="button-15" style="letter-spacing: 0.5px" role="button"> <i
                            class="fa-regular fa-calendar-days"></i>
                        Jadwal
                        Togel
                    </button></a>
            </div>
        </div>
    </div>
</main>
<script>
    var names = ['Hen*** Jackpot NEWYORK-MID Sebesar Rp.60.573.371', 'Wir*** Jackpot HUAHIN Sebesar Rp.20.400.571',
        'Ran*** Jackpot CHELSEA Sebesar Rp.45.258.424', 'Den*** Jackpot POIPET Sebesar Rp.71.150.105',
        'Bob*** Jackpot TOTOMACAU Sebesar Rp.25.457.205', 'Raj*** Jackpot BRUNEI Sebesar Rp.17.105.058',
        'Andi** Jackpot CAROLINA Sebesar Rp.55.405.825',
        'Hen*** Jackpot NEWYORK-MID Sebesar Rp.60.573.371',
        'Wir*** Jackpot HUAHIN Sebesar Rp.20.400.571',
        'Bob*** Jackpot TOTOMACAU Sebesar Rp.25.457.205',
        'Jan*** Jackpot POIPET Sebesar Rp.104.405.102',
        'Pol*** Jackpot HUAHIN Sebesar Rp.10.473.102',
        'Vio*** Jackpot NEWYORK-MID Sebesar Rp.40.105.054',
        'Erd*** Jackpot CHELSEA Sebesar Rp.275.452.205',
        'Wen*** Jackpot OREGON Sebesar Rp.35.104.477',
    ];

    var index = 0;

    // Fungsi untuk mengubah nilai input
    function updateInputValue() {
        document.getElementById('basic-url').value = names[index];
        index = (index + 1) % names.length; // Memastikan agar index tidak melebihi panjang array
    }

    // Memanggil fungsi updateInputValue setiap 2 detik
    setInterval(updateInputValue, 2000);
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/api/contact',
            method: 'GET',
            success: function(data) {
                displayResults(data);
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });

        function displayResults(data) {
            var resultsContainer = $('#results-contact');
            var domainUtama = $('#results-banner').attr('domain');

            $.each(data, function(index, result) {

                var resultCard = `
                <div class="bottom-0 mb-3 position-fixed end-0 me-3 bd-mode-toggle">
                <a target="_blank" href="https://wa.me/+${result.number_wa}"><img width="60" src="{{ asset('logo-wa.png') }}" alt="whatsapp"></a>
            </div>
            <div class="head-1"><a   href="${result.link_apk}"><img width="18px" src="{{ asset('icon-apk.webp') }}" alt="apk">
                    DOWNLOAD
                    APLIKASI TOGEL </a> <span style="color: white"> || </span> <i style="color: white"
                    class="fa-brands fa-telegram"></i> <a target="_blank" href="tg://resolve?domain=${result.number_tele}"> TELEGRAM </a> <span style="color: white"> ||
                </span> <i style="color: white" class="fa-solid fa-comments"></i>
                <a target="_blank" href="${result.live_chat}"> LIVE CHAT </a>
            </div>
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="pt-1 mt-1 mb-1 col-4">
                    <img style="height: 53px" src="{{ asset('logo.png') }}" alt="logo">
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a href="${domainUtama}/#/register" class="Btn" target="_blank"></a>
                </div>
            </div>
            `;

                resultsContainer.append(resultCard);
            });
        }
    });



    $(document).ready(function() {
        $.ajax({
            url: '/api/banner',
            method: 'GET',
            success: function(data) {
                displayResults(data);
                // Memulai otomatis sliding setiap 2 detik setelah data dimuat
                $('#carouselExampleAutoplaying').carousel({
                    interval: 2500
                });
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });

        function displayResults(data) {
            var resultsContainer = $('#results-banner');
            var carouselInner = '';


            $.each(data, function(index, result) {
                carouselInner += `
                <div class="carousel-item ${index === 0 ? 'active' : ''}">
                    <img src="${result.image}" class="d-block w-100 img-fluid" alt="gambar">
                </div>
            `;
            });

            var resultCard = `
            <div id="carouselExampleAutoplaying" class="mb-2 carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-inner">
                    ${carouselInner}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        `;

            resultsContainer.append(resultCard);
        }
    });
</script>

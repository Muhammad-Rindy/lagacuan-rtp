@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#101010eb; padding:5px 0px; color:white">⚜️ LAGACUAN - DETAIL BUKTI
            JACKPOT
            KEMENANGAN PLAYER ⚜️
        </h6>
    </main>
    <main class="container mb-5" style="background-color:#8989894a; padding:15px; border-radius:7px">
        <div class="row">
            <div class="col-md-9">
                <div class="card h-100"
                    style="background-color:azure; color:black; border: solid #ff1b1b 3px; border-bottom-left-radius:20px; border-bottom-right-radius:20px;">
                    <img id="main-data-image" class="data-image" style="background-color: white"
                        src="{{ $data->first()->image }}" class="card-img-top" alt="Gambar">

                    <div class="card-body">
                        <div style="text-transform:uppercase" id="main-data-title" class="card-text h5">
                            {{ $data->first()->title }}</div>
                        <div class="card-title h5" id="main-data-tanggal">Tanggal Jackpot: {{ $data->first()->tanggal }}
                        </div>
                        <hr>
                        <div style="text-transform:capitalize; text-align:justify" id="main-data-description"
                            class="card-text h5">
                            {{ $data->first()->description }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-jp">Bukti Jackpot Lainnya</div>
                <div class="row">
                    @foreach ($data as $item)
                        @if ($item->id !== $data->first()->id)
                            <div class="col-md-12" style="margin:15px 0px">
                                <div id="li" data-description="{{ $item->description }}"
                                    data-title="{{ $item->title }}" data-tanggal="{{ $item->tanggal }}"
                                    data-image="{{ $item->image }}">
                                    <div class="card h-100"
                                        style="background-image: linear-gradient(225deg, #350000 0%, #fb1e1e 50%, #b90000 100%); color:white; border: solid #ff1b1b 2px; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
                                        <img class="data-image" style="background-color: white" src="{{ $item->image }}"
                                            class="card-img-top" alt="Gambar">

                                        <div class="card-body">
                                            <div style="text-transform:uppercase; font-size:15px" class="card-text h5"
                                                data-title="{{ $item->title }}"><span
                                                    class="data-title">{{ $item->title }}</span></div>
                                            <div class="card-title h6" data-tanggal="{{ $item->tanggal }}">
                                                <span class="data-tanggal">Tanggal Jackpot: {{ $item->tanggal }}</span>
                                            </div>
                                            <hr>
                                            <div style="text-transform:capitalize"
                                                data-description="{{ $item->description }}" class="card-desc card-text h5">
                                                <span class="data-description">{{ $item->description }}</span>
                                            </div>
                                            <div class="d-grid gap-2 mt-3">
                                                <button style="font-weight:bold; font-size:13px;border:none;color:white"
                                                    type="button" class="btn button-jp btn-sm btn-sm show-button"><span
                                                        style="margin-right:15px">Details</span><i
                                                        class="fa-solid fa-circle-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('.show-button').click(function() {
                var parent = $(this).closest('#li');
                var description = parent.data('description');
                var title = parent.data('title');
                var tanggal = parent.data('tanggal');
                var image = parent.data('image'); // Perbaiki menjadi 'image'

                // Mengambil data utama saat ini
                var mainDescription = $('#main-data-description').text();
                var mainTitle = $('#main-data-title').text();
                var mainTanggal = $('#main-data-tanggal').text();
                var mainImage = $('#main-data-image').attr('src'); // Perbaiki menjadi 'attr()'

                // Memperbarui data utama dengan data yang dipilih
                $('#main-data-description').text(description);
                $('#main-data-title').text(title);
                $('#main-data-tanggal').text(tanggal);
                $('#main-data-image').attr('src', image); // Perbaiki menjadi 'attr()'

                // Memperbarui data kedua dengan data utama yang sebelumnya
                parent.data('description', mainDescription);
                parent.data('title', mainTitle);
                parent.data('tanggal', mainTanggal);
                parent.data('image', mainImage); // Perbaiki menjadi 'image'
                parent.find('.data-description').text(mainDescription);
                parent.find('.data-title').text(mainTitle);
                parent.find('.data-tanggal').text(mainTanggal);
                parent.find('.data-image').attr('src', mainImage); // Perbaiki menjadi 'attr()'
            });
        });
    </script>
@endsection

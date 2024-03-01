@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD - BUKTI JACKPOT
            KEMENANGAN PLAYER
        </h6>
    </main>
    <main class="container mb-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($buktis as $bukti)
                <div class="col">
                    <div class="card h-100"
                        style="background-color: #c70000; color:white; border:solid #ef0000 2px; border-bottom-left-radius:20px; border-bottom-right-radius:20px">
                        <img style="background-color: white" src="{{ $bukti->image }}" class="card-img-top" alt="Gambar">
                        <div class="card-body">
                            <div class="card-text h5">{{ $bukti->title }}</div>
                            <div class="card-title h6">{{ $bukti->date }}</div>
                            <div class="card-text h5">{{ $bukti->description }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD - BUKU MIMPI
        </h6>
    </main>
    <main class="container mb-5">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($bukus as $key => $buku)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img style="border-radius: 15px" src="{{ $buku->image }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            <button style="font-weight: bolder" class="carousel-control-prev" type="button"
                data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



    </main>
@endsection

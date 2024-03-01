@extends('layouts.master')

@section('content')
    <main class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
            @foreach ($pasarans as $pasaran)
                <div class="col">
                    <div class="card h-100 card-red">
                        <img style="padding: 25px 70px 0px 70px" src="{{ $pasaran->image }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <div style="text-align: center">
                                <h6 class="card-title">{{ $pasaran->name_pasaran }}</h6>
                            </div>
                            <div class="container-brunei">{{ $pasaran->result }}</div>
                            <p class="mt-2" style="text-align: center; font-weight:bold">Result:
                                {{ $pasaran->created_at }}
                            </p>
                            <div style="text-decoration: none; color:white; font-weight:bold; cursor:context-menu">
                                <div class="button-1"><i class="fa-solid fa-circle-exclamation"></i> LIVEDRAW
                                    {{ $pasaran->name_pasaran }}
                                </div>
                            </div>
                            <div style="text-decoration: none; color:white; font-weight:bold; cursor:context-menu">
                                <div class="button-1"><i class="fa-solid fa-circle-exclamation"></i> PREDIKSI
                                    {{ $pasaran->name_pasaran }}
                                </div>
                            </div>
                            <div style="text-decoration: none; color:white; font-weight:bold; cursor:context-menu">
                                <div class="button-1"><i class="fa-solid fa-circle-exclamation"></i> RESULT
                                    {{ $pasaran->name_pasaran }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection

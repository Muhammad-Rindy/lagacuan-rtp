@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD - LIVE DRAW PASARAN
            TOGEL ONLINE
            LENGKAP</h6>
    </main>
    <main class="container mb-5">
        <!-- Button trigger modal -->
        @foreach ($pasarans as $pasaran)
            <button style="text-align: left; font-weight:bold; color:white" type="button" class="btn button-15 mb-2"
                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pasaran->id }}"><i
                    class="fa-solid fa-arrow-up-right-from-square"></i>
                LIVE DRAW {{ $pasaran->name_pasaran }} POOLS
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $pasaran->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel{{ $pasaran->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2c2c2c; color:white">
                            <h1 class="modal-title fs-6" id="exampleModalLabel">LIVE DRAW {{ $pasaran->name_pasaran }} POOLS
                            </h1>
                        </div>
                        <div class="modal-body" style="background-image: linear-gradient(#ff2d2d, #910505);">
                            <div class="container text-center">
                                <img src="{{ $pasaran->image }}" class="img-fluid" alt="...">
                            </div>
                            <div class="container text-center mb-3">
                                <div class="row align-items-center">
                                    <div class="col" style="font-weight:bold; color:white">
                                        {{ $pasaran->created_at }}
                                    </div>
                                </div>
                            </div>
                            <div class="container text-center mb-3">
                                <div class="row align-items-center">
                                    <div class="col" style="font-weight:bold;font-size:22px; color:white">
                                        Prize #1
                                    </div>
                                    <div class="col" style="font-weight:bold;font-size:22px; color:white">
                                        {{ $pasaran->result }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color:#2c2c2c; color:white">
                            <button type="button" class="btn btn-secondary btn-sm bg-dark"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection

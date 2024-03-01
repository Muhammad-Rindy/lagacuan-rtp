@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD - KELUHAN PLAYER
        </h6>
    </main>
    <main class="container mb-5" style="padding: 12px; border-radius:7px; background-color:#181818">
        <div style="color: white; text-align:center"><i class="fa-solid fa-circle-info"></i> Ajukan Keluhan</div>
        <form>
            <div class="mb-3">
                <label style="color: white" for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control bg-light text-black" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label style="color: white" for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control bg-light text-black" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label style="color: white" for="exampleInputEmail1" class="form-label">No. Whatsapp Aktif</label>
                <input type="number" class="form-control bg-light text-black" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label style="color: white" for="exampleInputEmail1" class="form-label">Kode Keluhan</label>
                <input type="text" class="form-control bg-light text-black" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label style="color: white" for="exampleInputEmail1" class="form-label">Judul Keluhan</label>
                <input type="text" class="form-control bg-light text-black" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-4">
                <label style="color: white" for="exampleInputEmail1" class="form-label">Kode Keluhan</label>
                <textarea class="form-control bg-light text-black" placeholder="Leave a complaint here" id="floatingTextarea2"
                    style="height: 100px" required></textarea>
            </div>
            <div class="d-grid gap-2 col-4 mx-auto mb-3">
                <button style="border-radius:25px" type="submit" class="btn btn-primary"><i
                        class="fa-solid fa-paper-plane"></i> Submit</button>
            </div>
        </form>
    </main>
@endsection

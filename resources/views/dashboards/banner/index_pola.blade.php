@extends('dashboards.layouts.master')
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
    table,
    td {
        text-transform: capitalize;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div class="m-6">
                    <div class="card card-flush">
                        <div class="card-header pt-7">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">RTP SLOT</span>
                            </h3>
                        </div>
                        <div class="card-body">

                            <form id="urlRtp">
                                @csrf

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">URL Target</span>
                                    <input type="text" id="newUrl" name="newUrl" class="form-control"
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                        placeholder="Use Https://">
                                    <button type="submit" style="margin: 0px 5px"
                                        class="btn btn-primary btn-sm text-center">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body pt-2" style="text-align: -webkit-center;">
                            <div class="col-md-4 mb-4">
                                <div class="card" style="width: 19rem;">
                                    <img src="https://demigod-assets.sgp1.cdn.digitaloceanspaces.com/landingpages/common/zeus-petir.gif"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">RTPSLOT RANDOM GENERATOR</h5>
                                        <div class="text-center">
                                            <form id="storeData" method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm text-center">Random</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_footer" class="app-footer mt-5">
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2024&copy;</span>
                    <a href="/" target="_blank" class="text-gray-800 text-hover-primary">JederWD</a>
                </div>
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <div target="_blank" class="menu-link px-2">About</div>
                    </li>
                    <li class="menu-item">
                        <div target="_blank" class="menu-link px-2">Support</div>
                    </li>
                    <li class="menu-item">
                        <div target="_blank" class="menu-link px-2">Purchase</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#urlRtp').submit(function(e) {
                e.preventDefault();

                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: '/admin/input-url',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Jika success

                        Swal.fire({
                            title: '<span class="your-custom-css-class" style="color:#b5b7c8">Are you sure?</span>',
                            text: 'This will update the pattern RTP',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: "#006ae6",
                            cancelButtonColor: "#f8285a",
                            confirmButtonText: 'Yes, update it!',
                            preConfirm: () => {
                                return new Promise((resolve) => {
                                    // Menampilkan loading sebelum mengirim permintaan asinkron
                                    Swal.showLoading();

                                    // Menggunakan Fetch API untuk mengirim permintaan asinkron
                                    fetch("/admin/input-url", {
                                            method: "POST",
                                            body: new FormData(document
                                                .getElementById(
                                                    'urlRtp'))
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            // Menutup loading dan menampilkan pemberitahuan berhasil jika sukses
                                            Swal.close();
                                            Swal.fire('Success!',
                                                'Your pattern has been updated',
                                                'success');
                                            resolve(true);
                                        })
                                        .catch(error => {
                                            console.error('Error:',
                                                error);

                                            // Menutup loading dan menampilkan pemberitahuan gagal jika terjadi kesalahan
                                            Swal.close();
                                            Swal.fire('Failed!',
                                                'Error: Ada kesalahan',
                                                'error');
                                            resolve(false);
                                        });
                                });
                            }
                        });
                    },

                });
            });
        });

        $(document).ready(function() {
            $('#storeData').submit(function(e) {
                e.preventDefault();

                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: '/admin/rand-rtp',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Jika success
                        Swal.fire({
                            title: '<span class="your-custom-css-class" style="color:#b5b7c8">Are you sure?</span>',
                            text: 'This will update the pattern RTP',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: "#006ae6",
                            cancelButtonColor: "#f8285a",
                            confirmButtonText: 'Yes, update it!',
                            preConfirm: () => {
                                return new Promise((resolve) => {
                                    // Menampilkan loading sebelum mengirim permintaan asinkron
                                    Swal.showLoading();

                                    // Menggunakan Fetch API untuk mengirim permintaan asinkron
                                    fetch("/admin/rand-rtp", {
                                            method: "POST",
                                            body: new FormData(document
                                                .getElementById(
                                                    'storeData'))
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            // Menutup loading dan menampilkan pemberitahuan berhasil jika sukses
                                            Swal.close();
                                            Swal.fire('Success!',
                                                'Your pattern has been updated',
                                                'success');
                                            resolve(true);
                                        })
                                        .catch(error => {
                                            console.error('Error:',
                                                error);

                                            // Menutup loading dan menampilkan pemberitahuan gagal jika terjadi kesalahan
                                            Swal.close();
                                            Swal.fire('Failed!',
                                                'Error: Ada kesalahan',
                                                'error');
                                            resolve(false);
                                        });
                                });
                            }
                        });
                    },

                });
            });
        });
    </script>
@endsection

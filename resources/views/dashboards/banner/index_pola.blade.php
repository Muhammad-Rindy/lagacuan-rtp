@extends('dashboards.layouts.master')
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
    table,
    td {
        text-transform: capitalize;
    }

    .loading .spinner-border {
        display: block !important;
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
                                <span class="text-gray-800 card-label fw-bold">RTP SLOT</span>
                            </h3>
                            <div class="d-flex align-items-center">
                                <button type="button" class="text-center btn btn-primary btn-sm me-3"
                                    id="randomAllRtp">Random All RTP</button>
                                <button type="button" class="btn btn-success btn-sm me-3" id="addRtp">+ Add RTP</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="width: 100%; font-size:14px"
                                    class="table align-middle table-row-dashed fs-6 gy-3" id="table-rtp">
                                    <thead>
                                        <tr class="text-gray-500 text-start fw-bold fs-6 gs-0">
                                            <th style="width: 5%; text-align: center; text-transform:capitalize">Index
                                            </th>
                                            <th style="text-align: center;text-transform:capitalize">Provider</th>
                                            <th style="text-align: center;text-transform:capitalize">Nama</th>
                                            <th style="text-align:center;text-transform:capitalize">Image</th>
                                            <th style="text-align:center;text-transform:capitalize">url</th>
                                            <th style="text-align:center;text-transform:capitalize">persentase</th>
                                            <th style="text-align:center;text-transform:capitalize">pola</th>
                                            <th style="text-align:center;text-transform:capitalize">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            {{-- <form id="urlRtp">
                                @csrf

                                <div class="mb-3 input-group">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">URL Target</span>
                                    <input type="text" id="newUrl" name="newUrl" class="form-control"
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                        placeholder="Use Https://">
                                    <button type="submit" style="margin: 0px 5px"
                                        class="text-center btn btn-primary btn-sm">Submit</button>
                                </div>
                            </form> --}}
                        </div>
                        {{-- <div class="pt-2 card-body" style="text-align: -webkit-center;">
                            <div class="mb-4 col-md-4">
                                <div class="card" style="width: 19rem;">
                                    <img src="https://demigod-assets.sgp1.cdn.digitaloceanspaces.com/landingpages/common/zeus-petir.gif"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="text-center card-title">RTPSLOT RANDOM GENERATOR</h5>
                                        <div class="text-center">
                                            <form id="storeData" method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="text-center btn btn-primary btn-sm">Random</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_footer" class="mt-5 app-footer">
            <div class="py-3 app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack">
                <div class="order-2 text-gray-900 order-md-1">
                    <span class="text-muted fw-semibold me-1">2024&copy;</span>
                    <a href="/" target="_blank" class="text-gray-800 text-hover-primary">JederWD</a>
                </div>
                <ul class="order-1 menu menu-gray-600 menu-hover-primary fw-semibold">
                    <li class="menu-item">
                        <div target="_blank" class="px-2 menu-link">About</div>
                    </li>
                    <li class="menu-item">
                        <div target="_blank" class="px-2 menu-link">Support</div>
                    </li>
                    <li class="menu-item">
                        <div target="_blank" class="px-2 menu-link">Purchase</div>
                    </li>
                </ul>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalGlobal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content position-relative">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editModalLabel" style="text-transform: capitalize"> Create New RTP</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="loadingForm"
                        class="top-0 position-absolute w-100 h-100 d-flex align-items-center justify-content-center d-none"
                        style="z-index: 9999; background: #ffffff21; cursor: wait;">
                        <div class="spinner-border text-warning me-3 spinner-border-sm"></div>
                        <span>Saving data</span>
                    </div>
                    <form id="storeData" enctype="multipart/form-data" action="/rtp" class="needs-validation" novalidate>
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Provider:</label>
                                <select name="provider" class="form-control form-control-sm text-uppercase">
                                    @foreach (getProvider() as $item)
                                        <option value="{{ $item->provider_name }}" class="text-uppercase">
                                            {{ $item->provider_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Game</label>
                                <input type="text" name="name" class="form-control form-control-sm"
                                    placeholder="Nama Game" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control form-control-sm"
                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                    accept="image/png, image/gif, image/jpeg">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3 d-none" id="previewImg">
                                <img src="#" class="rounded " style="max-width: 100px">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">URL Game</label>
                                <textarea name="url" class="form-control form-control-sm" placeholder="URL Game"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Urutan Game</label>
                                <input type="number" name="urutan" class="form-control form-control-sm"
                                    placeholder="Urutan Game">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="my-4 separator"></div>
                            <button type="button"
                                class="mb-3 text-center d-flex btn btn-primary btn-sm align-items-center"
                                id="randomRtpSingle">
                                <div class="spinner-border text-warning me-3 spinner-border-sm d-none"></div>
                                <span>Random RTP</span>
                            </button>
                            <div class="mb-3 progress bar-persen">
                                @php $p = rand(0, 85); @endphp
                                <div class="progress-bar bg-animasi {{ $p >= 0 && $p <= 40
                                    ? 'bg-danger'
                                    : ($p >= 41 && $p <= 60
                                        ? 'bg-warning'
                                        : ($p >= 61 && $p <= 85
                                            ? 'bg-success'
                                            : '')) }}"
                                    role="progressbar" id="progresArea" style="width: {{ $p }}%;"
                                    aria-valuenow="{{ $p }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $p }}%</div>
                            </div>
                            <div class="mb-3">
                                <div class="px-3 py-2 border rounded" id="rtpArea">{!! randomRtp() !!}</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <form id="formDelete" class="d-none">@csrf @method('DELETE')</form>

        <script>
            $(document).ready(function() {

                let progresArea = $("#progresArea");
                let rtpArea = $("#rtpArea");
                let formGlobal = $("#storeData");
                let modal = $("#modalGlobal");
                let titleModal = $("#editModalLabel");
                let previewImg = $("#previewImg");
                let loadingForm = $("#loadingForm");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                let table = $('#table-rtp').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/rtp/datatable',
                    columns: [{
                            className: "text-center",
                            data: "index",
                            name: "index",
                            orderable: false,
                            searchable: false
                        },
                        {
                            className: "text-center",
                            data: "provider",
                            name: "provider",
                        },
                        {
                            className: "text-center",
                            data: "name",
                            name: "name",
                        },
                        {
                            className: "text-center",
                            data: "image",
                            name: "image",
                            render: function(data, type, full, meta) {
                                return `<img src="${data}" style="border-radius: 5px; width: 50px;">`;
                            },
                        },
                        {
                            className: "text-center",
                            data: "url",
                            name: "url",
                            render: function(data, type, full, meta) {
                                return `<span class="d-inline-block text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" data-bs-placement="top" title="${data}">${data}</span>`;
                            },
                        },
                        {
                            className: "text-center",
                            data: "persentase",
                            name: "persentase",
                        },
                        {
                            className: "text-center",
                            data: "pola",
                            name: "pola",
                        },
                        {
                            className: "text-center",
                            data: 'action',
                            name: 'action',
                            orderable: false
                        },
                    ],
                    order: [
                        [0, 'asc']
                    ],
                    drawCallback: () => {
                        let x = document.querySelectorAll('[data-bs-toggle="tooltip"]');
                        [...x].forEach(item => new bootstrap.Tooltip(item));

                        $(".edit").click(function() {
                            let tr = $(this).closest("tr");
                            let data = table.row(tr).data();

                            titleModal.text("Update RTP");
                            formGlobal.attr("action", "/rtp/" + data.id);
                            formGlobal.find('input[name="_method"]').val("PUT");

                            previewImg.removeClass('d-none');
                            previewImg.find("img").attr("src", data.image);

                            formGlobal.find('[name="provider"]').val(data.provider);
                            formGlobal.find('[name="name"]').val(data.name);
                            formGlobal.find('[name="url"]').val(data.url);
                            formGlobal.find('[name="urutan"]').val(data.index);

                            progresArea.removeClass("bg-danger");
                            progresArea.removeClass("bg-warning");
                            progresArea.removeClass("bg-success");

                            if (data.persentase >= 0 && data.persentase <= 40) progresArea
                                .addClass("bg-danger");
                            if (data.persentase >= 41 && data.persentase <= 60) progresArea
                                .addClass("bg-warning");
                            if (data.persentase >= 61 && data.persentase <= 85) progresArea
                                .addClass("bg-success");

                            progresArea.attr("aria-valuenow", data.persentase);
                            progresArea.css({
                                width: data.persentase + "%"
                            });
                            progresArea.text(data.persentase + "%");

                            rtpArea.html(data.pola);

                            modal.modal("show");
                        });

                        $(".delete").click(function() {
                            let tr = $(this).closest("tr");
                            let data = table.row(tr).data();
                            Swal.fire({
                                title: '<span class="your-custom-css-class" style="color:#b5b7c8">Are you sure?</span>',
                                text: 'You wont be able to revert this! ' + data.name,
                                icon: 'info',
                                showCancelButton: true,
                                confirmButtonColor: "#006ae6",
                                cancelButtonColor: "#f8285a",
                                confirmButtonText: 'Yes, delete it!',
                                cancelButtonText: 'Cancel',
                                preConfirm: () => {
                                    return new Promise((resolve) => {
                                        // Menampilkan loading sebelum mengirim permintaan asinkron
                                        Swal.showLoading();

                                        // Menggunakan Fetch API untuk mengirim permintaan asinkron
                                        fetch("/rtp/" + data.id, {
                                                method: "POST",
                                                body: new FormData(document
                                                    .getElementById(
                                                        'formDelete'))
                                            }).then(response => response.json())
                                            .then(e => {
                                                // Menutup loading dan menampilkan pemberitahuan berhasil jika sukses
                                                Swal.close();
                                                Swal.fire('Success!',
                                                    'Data RTP ' + data
                                                    .name +
                                                    " has been deleted.",
                                                    'success');
                                                table.draw();
                                                resolve(true);
                                            }).catch(error => {
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
                        })
                    }
                });

                $('input[name="image"]').change(e => {
                    let {
                        files
                    } = e.target;
                    if (files.length > 0) {
                        previewImg.removeClass('d-none');
                        previewImg.find("img").attr("src", URL.createObjectURL(files[0]));
                    } else {
                        previewImg.addClass('d-none');
                    }
                })

                $("#addRtp").click(() => {
                    titleModal.text("Create New RTP");
                    formGlobal.trigger("reset");
                    formGlobal.attr("action", "/rtp");
                    formGlobal.find('input[name="_method"]').val("POST");
                    previewImg.addClass('d-none');
                    $("#randomRtpSingle").click();
                    modal.modal("show");
                });

                $("#randomRtpSingle").click(() => {
                    $("#randomRtpSingle").addClass('loading');
                    $.ajax({
                        type: "get",
                        url: "rtp/randomSingle",
                        dataType: "json",
                        success: function(res) {
                            $("#randomRtpSingle").removeClass('loading');
                            const {
                                rtp,
                                persen
                            } = res;
                            progresArea.removeClass("bg-danger");
                            progresArea.removeClass("bg-warning");
                            progresArea.removeClass("bg-success");

                            if (persen >= 0 && persen <= 40) progresArea.addClass("bg-danger");
                            if (persen >= 41 && persen <= 60) progresArea.addClass("bg-warning");
                            if (persen >= 61 && persen <= 85) progresArea.addClass("bg-success");

                            progresArea.attr("aria-valuenow", persen);
                            progresArea.css({
                                width: persen + "%"
                            });
                            progresArea.text(persen + "%");

                            rtpArea.html(rtp);
                        }
                    });
                });

                formGlobal.submit(function(e) {
                    e.preventDefault();
                    loadingForm.removeClass("d-none");
                    var formData = new FormData(e.target);
                    formData.append("persen", Number(progresArea.attr("aria-valuenow")));
                    formData.append("pola", rtpArea.html());
                    $.ajax({
                        type: "POST",
                        url: formGlobal.attr('action'),
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            loadingForm.addClass("d-none");
                            modal.modal("hide");
                            table.draw();
                        },
                        error: (e) => {
                            loadingForm.addClass("d-none");
                            const {
                                provider,
                                name,
                                url,
                                urutan,
                                image
                            } = e.responseJSON;
                            if (provider) formGlobal.find('[name="provider"]').addClass(
                                "is-invalid").parent().find(".invalid-feedback").text(provider);
                            if (name) formGlobal.find('[name="name"]').addClass("is-invalid")
                                .parent().find(".invalid-feedback").text(name);
                            if (url) formGlobal.find('[name="url"]').addClass("is-invalid").parent()
                                .find(".invalid-feedback").text(url);
                            if (urutan) formGlobal.find('[name="urutan"]').addClass("is-invalid")
                                .parent().find(".invalid-feedback").text(urutan);
                            if (image) formGlobal.find('[name="image"]').addClass("is-invalid")
                                .parent().find(".invalid-feedback").text(image);
                        }
                    });
                });

                $("#randomAllRtp").click(() => {
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
                                fetch("/rtp/randomAll").then(response => response.json())
                                    .then(data => {
                                        // Menutup loading dan menampilkan pemberitahuan berhasil jika sukses
                                        Swal.close();
                                        Swal.fire('Success!',
                                            'Your pattern has been updated',
                                            'success');
                                        table.draw();
                                        resolve(true);
                                    }).catch(error => {
                                        console.error('Error:', error);

                                        // Menutup loading dan menampilkan pemberitahuan gagal jika terjadi kesalahan
                                        Swal.close();
                                        Swal.fire('Failed!', 'Error: Ada kesalahan',
                                            'error');
                                        resolve(false);
                                    });
                            });
                        }
                    });
                })
            });
        </script>
    @endsection

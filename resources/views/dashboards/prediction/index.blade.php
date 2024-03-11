@extends('dashboards.layouts.master')
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
    table,
    td {
        text-transform: uppercase;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->

                <div class="m-6">
                    <!--begin::Table Widget 4-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Predictions Lottery</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Actions-->
                            <button type="button" class="btn btn-success btn-sm mb-3 mt-1" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                + Add Prediction
                            </button>
                            <!--end::Actions-->
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="editModalLabel" style="text-transform: capitalize">
                                            Create New Prediction</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="formResult">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Choose Lottery :</label>
                                                <select name="pasaran_id" id="pasaran_select" class="form-control">
                                                    <option selected disabled>Select your lottery</option>
                                                    @foreach ($pasarans as $pasaranId => $pasaranName)
                                                        <option style="text-transform: uppercase"
                                                            value="{{ $pasaranId }}">{{ $pasaranName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Angka Main</label>
                                                <input type="text" name="angka_main" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">TOP_4D</label>
                                                <input type="text" name="top_4d" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">TOP_3D</label>
                                                <input type="text" name="top_3d" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">TOP_2D</label>
                                                <input type="text" name="top_2d" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Colok Bebas</label>
                                                <input type="text" name="colok_bebas" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Colok 2D</label>
                                                <input type="text" name="colok_2d" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Shio Jitu</label>
                                                <input type="Text" name="shio_jitu" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
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

                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-2">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table style="width: 100%; font-size:14px"
                                    class="table align-middle table-row-dashed fs-6 gy-3" id="table-pasaran">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-6 gs-0">
                                            <th style="width:5%;text-align: center; text-transform:capitalize">No.</th>
                                            <th style="text-align: center;text-transform:capitalize">Name Lottery</th>
                                            <th style="text-align: center;text-transform:capitalize">Angka Main</th>
                                            <th style="width:10%;text-align: center;text-transform:capitalize">TOP 4D</th>
                                            <th style="text-align: center;text-transform:capitalize">TOP 3D</th>
                                            <th style="text-align: center;text-transform:capitalize">TOP 2D</th>
                                            <th style="text-align: center;text-transform:capitalize">Colok Bebas</th>
                                            <th style="text-align: center;text-transform:capitalize">Colok 2D</th>
                                            <th style="text-align: center;text-transform:capitalize">Shio Jitu</th>
                                            <th style="text-align: center;text-transform:capitalize">Created At</th>
                                            <th style="width:20%;text-align:center;text-transform:capitalize">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer mt-5">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-gray-900 order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2024&copy;</span>
                    <a href="/" target="_blank" class="text-gray-800 text-hover-primary">JederWD</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
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
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>


    <script type="text/javascript">
        // Get data
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#table-pasaran').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/index-prediksi',
                columns: [{
                        className: "text-center",
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'pasaran_name',
                        name: 'table_pasaran.name_pasaran' // Sesuaikan dengan nama kolom yang benar
                    },
                    {
                        data: 'angka_main',
                        name: 'table_prediksi.angka_main' // Sesuaikan dengan nama kolom yang benar
                    },
                    {
                        data: 'top_4d',
                        name: 'table_prediksi.top_4d' // Sesuaikan dengan nama kolom yang benar
                    },
                    {
                        data: 'top_3d',
                        name: 'table_prediksi.top_3d' // Sesuaikan dengan nama kolom yang benar
                    },
                    {
                        data: 'top_2d',
                        name: 'table_prediksi.top_2d' // Sesuaikan dengan nama kolom yang benar
                    },
                    {
                        data: 'colok_bebas',
                        name: 'table_prediksi.colok_bebas' // Sesuaikan dengan nama kolom yang benar
                    },
                    {
                        data: 'colok_2d',
                        name: 'table_prediksi.colok_2d' // Sesuaikan dengan nama kolom yang benar
                    },
                    {
                        data: 'shio_jitu',
                        name: 'table_prediksi.shio_jitu' // Sesuaikan dengan nama kolom yang benar
                    },
                    {
                        data: 'created_at',
                        name: 'table_prediksi.created_at' // Sesuaikan dengan nama kolom yang benar
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
            });

        });

        // Store data
        $(document).ready(function() {
            $('#formResult').submit(function(e) {
                e.preventDefault();

                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: '/store-prediksi',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Jika success
                        $('#exampleModal').modal('hide');
                        $('#formResult')[0].reset();
                        $('.modal-backdrop.show').css('display', 'none');
                        Swal.fire({
                            title: '<span class="your-custom-css-class" style="color:#b5b7c8">Success!</span>',
                            text: "Your file has been saved",
                            icon: "success",
                        });
                        $('#table-pasaran').DataTable().ajax.reload();
                    },
                    error: function(error) {
                        console.log(error);
                        $('#exampleModal').modal('hide');
                        $('#formResult')[0].reset();
                        $('.modal-backdrop.show').css('display', 'none');
                        Swal.fire({
                            title: '<span class="your-custom-css-class" style="color:#b5b7c8">Failed!</span>',
                            text: "Error: " + "Please fill all the input fields",
                            icon: "error",
                        });

                    }
                });
            });
        });

        // Get data berdasarkan id

        function loadData(id) {
            $.ajax({
                url: '/get-data-prediksi/' + id,
                type: 'GET',
                success: function(response) {
                    // Mengisi formulir dengan data yang diterima
                    $('#editId').val(response.id);
                    $('#angka_main').val(response.angka_main);
                    $('#top_4d').val(response.top_4d);
                    $('#top_3d').val(response.top_3d);
                    $('#top_2d').val(response.top_2d);
                    $('#colok_bebas').val(response.colok_bebas);
                    $('#colok_2d').val(response.colok_2d);
                    $('#shio_jitu').val(response.shio_jitu);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Update data
        function updateData() {
            $.ajax({
                url: '/update-prediksi',
                type: 'POST',
                data: $('#editForm').serialize(),
                success: function(response) {
                    // Jika success
                    $('#editModal').modal('hide');
                    $('.modal-backdrop.show').css('display', 'none');
                    Swal.fire({
                        title: '<span class="your-custom-css-class" style="color:#b5b7c8">Success!</span>',
                        text: "Your file has been successfully edited",
                        icon: "success",
                    });
                    $('#table-pasaran').DataTable().ajax.reload();

                },
                error: function(error) {
                    console.log(error);
                    $('#exampleModal').modal('hide');
                    $('#storeData')[0].reset();
                    $('.modal-backdrop.show').css('display', 'none');
                    Swal.fire({
                        title: '<span class="your-custom-css-class" style="color:#b5b7c8">Failed!</span>',
                        text: "Error: " + error.message,
                        icon: "error",
                    });
                }
            });
        }

        // Destroy data
        function deleteData(id) {
            Swal.fire({
                title: '<span class="your-custom-css-class" style="color:#b5b7c8">Are you sure?</span>',
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#006ae6",
                cancelButtonColor: "#f8285a",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "/destroy-prediksi",
                        data: {
                            id: id,
                        },
                        dataType: "json",
                        success: function(response) {
                            // Jika success
                            Swal.fire({
                                title: '<span class="your-custom-css-class" style="color:#b5b7c8">Deleted!</span>',
                                text: "Your file has been deleted.",
                                icon: "success",
                            });
                            $('#table-pasaran').DataTable().ajax.reload();
                        },
                    });
                }
            });
        }
    </script>
@endsection

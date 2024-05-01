@extends('dashboards.layouts.master')
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div class="m-6">
                    <div class="card card-flush">
                        <div class="card-header pt-7">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="text-gray-800 card-label fw-bold">Data Domain</span>
                            </h3>
                            <button type="button" class="mt-1 mb-3 btn btn-success btn-sm" id="btnAdd"> + Add Domain</button>
                        </div>

                        <div class="pt-2 card-body">
                            <div class="table-responsive">
                                <table style="w-100" class="table align-middle table-row-dashed fs-6 gy-3" id="tableDomain">
                                    <thead>
                                        <tr class="text-gray-500 text-start fw-bold fs-6 gs-0 text-uppercase">
                                            <th>No.</th>
                                            <th>Name Domain</th>
                                            <th>Redirect</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
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

    </div>

     <!-- Modal -->
    <div class="modal fade" id="modalDomain" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-capitalize"> Create New Result</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formDomain" action="/domain">
                    @csrf
                    @method("POST")
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Domain</label>
                            <input type="text" name="domain" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Redirect</label>
                            <input type="text" name="redirect" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/js/domain.js"></script>
@endsection

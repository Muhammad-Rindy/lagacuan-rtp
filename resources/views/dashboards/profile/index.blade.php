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
    <div class="app-main flex-column flex-row-fluid m-6" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->

                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Profile Details</h3>
                        </div>
                        {{-- @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif --}}
                        <!--end::Card title-->
                        <!--begin::Action-->
                        <button type="button" class="btn btn-sm btn-primary align-self-center" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Edit Profile
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('update-profile') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <div style="text-align: left">
                                                    <label for="exampleInputEmail1" class="form-label"
                                                        style="text-transform: capitalize;">Name</label>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $profile->name }}"
                                                    name="name" id="name">
                                            </div>
                                            <div class="mb-3">
                                                <div style="text-align: left">
                                                    <label for="exampleInputEmail1" class="form-label"
                                                        style="text-transform: capitalize;">Email
                                                        Address</label>
                                                </div>
                                                <input type="email" class="form-control" value="{{ $profile->email }}"
                                                    name="email" id="email">
                                            </div>
                                            <div class="mb-3">
                                                <div style="text-align: left">
                                                    <label for="exampleInputEmail1" class="form-label"
                                                        style="text-transform: capitalize;">Password</label>
                                                </div>
                                                <input type="password" value="{{ $profile->password }}" class="form-control"
                                                    name="password" id="password">
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ $profile->name }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $profile->email }}</span>
                                <span class="badge badge-success">Verified</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Password
                                <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                    <i class="ki-outline ki-information fs-7"></i>
                                </span></label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bold fs-6 text-gray-800 me-2">********</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->

                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Allow Changes</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-semibold fs-6 text-gray-800">Yes</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                            <!--begin::Icon-->
                            <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Hallo Brother!</h4>
                                    <div class="fs-6 text-gray-700">Thankyou</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Card body-->
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
@endsection

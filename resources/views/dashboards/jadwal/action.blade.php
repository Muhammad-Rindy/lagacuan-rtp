@include('dashboards.layouts.header')

<a href="javascript:void(0)" onClick="loadData({{ $id }})" title="Edit"
    class="h-auto btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary justify-content-end"
    data-bs-toggle="modal" data-bs-target="#editModal">
    <i style="font-size: 19px; color:#006ae6" class="fa-solid fa-pen-to-square"></i>
</a>

<a href="javascript:void(0)" onClick="deleteData({{ $id }})" data-toggle="tooltip" data-original-title="Delete"
    class="h-auto btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary justify-content-end">
    <i style="font-size: 19px; color:#e42855; margin:0px 7px" class="fa-solid fa-trash"></i>
    {{-- <i style="font-size: 19px; color:#e42855; margin:0px 7px" class="fa-regular fa-square-minus"></i> --}}
</a>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel" style="text-transform: capitalize">Edit Schedule</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="editForm">
                    <!-- Add hidden input for ID -->
                    <input type="hidden" id="editId" name="id">
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
                    <!-- Form fields (name, color, number) go here -->
                    <div class="mb-3">
                        <div style="text-align: left">
                            <label for="exampleInputEmail1" class="form-label"
                                style="text-transform: capitalize;">Closing Schedule</label>
                        </div>
                        <input type="time" class="form-control" name="jadwal_tutup" id="jadwal_tutup">
                    </div>
                    <div class="mb-3">
                        <div style="text-align: left">
                            <label for="exampleInputEmail1" class="form-label"
                                style="text-transform: capitalize;">Lottery Schedule</label>
                        </div>
                        <input type="time" class="form-control" name="jadwal_undi" id="jadwal_undi">
                    </div>

                    <div class="mb-3">
                        <div style="text-align: left">
                            <label for="exampleInputEmail1" class="form-label"
                                style="text-transform: capitalize;">Official Site</label>
                        </div>
                        <input type="text" class="form-control" name="situs_resmi" id="situs_resmi">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="updateData()">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@include('dashboards.layouts.header')

<a href="javascript:void(0)" style="padding: 9px;margin:0px 5px;" onClick="loadData({{ $id }})" title="Edit"
    class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
    <i style="padding: 0;" class="fa-solid fa-pen-to-square"></i>
</a>



<a href="javascript:void(0)" style="padding: 9px;margin:0px 5px;" onClick="deleteData({{ $id }})"
    data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-sm">
    <i style="padding: 0;" class="fa-solid fa-trash-can"></i>
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
                    <!-- Form fields (name, color, number) go here -->
                    <div class="mb-3">
                        <div style="text-align: left">
                            <label for="exampleInputEmail1" class="form-label" style="text-transform: capitalize;">Name
                                Lottery</label>
                        </div>
                        <input type="text" class="form-control" name="name_pasaran" id="name_pasaran">
                    </div>
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

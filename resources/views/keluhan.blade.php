@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD - KELUHAN PLAYER
        </h6>
    </main>
    <main class="container mb-5" style="padding: 12px; border-radius:7px; background-color:#181818">
        <div style="color: white; text-align:center"><i class="fa-solid fa-circle-info"></i> Ajukan Keluhan</div>
        <form id="storeData">
            @csrf
            <div class="mb-3">
                <label style="color: white" for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control  text-white" name="username" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label style="color: white" for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control  text-white" name="email" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label style="color: white" for="exampleInputEmail1" class="form-label">No. Whatsapp Active</label>
                <input type="text" name="number_phone" class="form-control  text-white" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label style="color: white" for="exampleInputEmail1" class="form-label">Title Complaint</label>
                <input type="text" name="title_keluhan" class="form-control  text-white" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-5">
                <label style="color: white" for="exampleInputEmail1" class="form-label">Description Complaint</label>
                <div class="form-floating">
                    <textarea class="form-control text-white" name="description_keluhan" placeholder="Leave a comment here"
                        id="floatingTextarea2" style="height: 100px" maxlength="255"></textarea>
                    <label for="floatingTextarea2">Max. 255 Characters</label>
                </div>
            </div>
            <div class="d-grid gap-2 col-3 mx-auto mb-3">
                <button style="border-radius:25px" type="submit" class="btn btn-primary"><i
                        class="fa-solid fa-paper-plane"></i> Submit</button>
            </div>
        </form>
    </main>
    <script>
        // store data
        $(document).ready(function() {
            $('#storeData').submit(function(e) {
                e.preventDefault();

                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: '/store-keluhan',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Jika success
                        $('#storeData')[0].reset();
                        Swal.fire({
                            title: '<span class="your-custom-css-class" style="color:#b5b7c8">Success!</span>',
                            text: "Terima kasih atas ketersediaan Anda mengisi kolom ulasan. Semua kritik dan saran yang disampaikan akan menjadi bahan evaluasi bagi kami.",
                            icon: "success",
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            title: '<span class="your-custom-css-class" style="color:#b5b7c8">Failed!</span>',
                            text: "Error: " + "Ada kesalahan",
                            icon: "error",
                        });

                    }
                });
            });
        });
    </script>
@endsection

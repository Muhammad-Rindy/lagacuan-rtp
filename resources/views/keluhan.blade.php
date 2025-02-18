@extends('layouts.master')

@section('content')
    <main class="container">
        <h6 style="text-align: center; background-color:#101010eb; padding:5px 0px; color:white">⚜️ LAGACUAN - KELUHAN PLAYER
            ⚜️
        </h6>
    </main>
    <main class="container mb-5"
        style="padding: 12px;border-bottom-left-radius:8px;border-bottom-right-radius:8px; background-color:#181818;flex: 1;">
        <div style="color: white; text-align:center"><i class="fa-solid fa-circle-info"></i> Ajukan
            Keluhan</div>
        <form id="storeData">
            @csrf
            <div class="mb-3">
                <label style="color: white;" for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" style="color: white; background-color:#212529" name="username"
                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label style="color: white;" for="exampleInputEmail1" class="form-label">Email
                    Address</label>
                <input type="email" class="form-control" style="color: white; background-color:#212529" name="email"
                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label style="color: white;" for="exampleInputEmail1" class="form-label">No.
                    Whatsapp Active</label>
                <input type="text" name="number_phone" class="form-control"
                    style="color: white; background-color:#212529" id="exampleInputEmail1" aria-describedby="emailHelp"
                    required>
            </div>
            <div class="mb-3">
                <label style="color: white;" for="exampleInputEmail1" class="form-label">Title
                    Complaint</label>
                <input type="text" name="title_keluhan" class="form-control"
                    style="color: white; background-color:#212529" id="exampleInputEmail1" aria-describedby="emailHelp"
                    required>
            </div>
            <div class="mb-4">
                <label style="color: white;" for="exampleInputEmail1" class="form-label">Description Complaint</label>
                <div class="form-floating">
                    <textarea class="form-control text-white" name="description_keluhan" placeholder="Leave a comment here"
                        id="floatingTextarea2" style="height: 100px;color: white; background-color:#212529" maxlength="255"></textarea>
                    <label for="floatingTextarea2">Max. 255 Characters</label>
                </div>
            </div>
            <div class="d-grid gap-2 col-3 mx-auto mb-3">
                <button
                    style="border-radius: 25px;background-image: linear-gradient(45deg, #7a0000 0%, #ff1313 52%, #a60000 90%);font-family: auto;letter-spacing: 2px;font-size: 13px;border: solid #ff0000 2px;"
                    type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> SUBMIT</button>
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

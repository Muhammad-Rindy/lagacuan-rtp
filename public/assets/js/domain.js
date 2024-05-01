let btnAdd = $('#btnAdd');
let tableDomain = $('#tableDomain');
let modalDomain = $('#modalDomain');
let formDomain = $('#formDomain');
let method = formDomain.find('input[name="_method"]');

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

let table = tableDomain.DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '/domain/json'
    },
    columns: [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            orderable: false,
            searchable: false
        },
        {
            data: "domain",
            name: "domain",
        },
        {
            data: "redirect",
            name: "redirect",
        },
        {
            data: "action",
            name: "action",
            orderable: false,
        }
    ],
    drawCallback: function (e) {
        $(e.nTable).find('.edit').click(function() {
            let data = table.row($(this).closest('tr')).data();
            modalDomain.find('.modal-title').text('Form edit domain');
            method.val('PUT');
            formDomain.attr('action', '/domain/'+data.id);
            formDomain.find('input[name="domain"]').val(data.domain);
            formDomain.find('input[name="redirect"]').val(data.redirect);
            modalDomain.modal("show");
        });

        $(e.nTable).find('.delete').click(function() {
            let data = table.row($(this).closest('tr')).data();
            Swal.fire({
                title: `<span class="your-custom-css-class" style="color:#b5b7c8">Are you sure ?</span>`,
                text: "You won't be able to revert this! "+data.domain,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#006ae6",
                cancelButtonColor: "#f8285a",
                confirmButtonText: "Yes, delete it!",
                showLoaderOnConfirm: true,
                preConfirm: async (login) => {
                    let res = await new Promise((r, j) => {
                        $.ajax({
                            type: "DELETE",
                            url: "/domain/"+data.id,
                            dataType: "json",
                            beforeSend: function(request) {
                                request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                            },
                            success: function(response) {
                                r({status: true});
                            },
                            error: function(error) {
                                const {responseJSON, statusText, status} = error;
                                if (status == 400) {
                                    const {message} = responseJSON;
                                    r({status: false, message});
                                }else{
                                    r({status: false, message:statusText});
                                }
                            }
                        });
                    });

                    if (res.status) {
                        return res;
                    }else{
                        Swal.showValidationMessage(` Request failed: ${res.message}`);
                    }
                  },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    table.draw();
                    Toast.fire({
                        icon: "success",
                        title: 'Your file has been deleted.'
                    });
                }
            });
        });
    }
});

modalDomain.on("hidden.bs.modal", () => {
    formDomain.trigger("reset");
});

btnAdd.click(() => {
    modalDomain.find('.modal-title').text('Form add domain');
    method.val('POST');
    formDomain.attr('action', '/domain');
    modalDomain.modal("show");
});

formDomain.submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: formDomain.attr('action'),
        type: 'POST',
        data: formDomain.serialize(),
        success: function(response) {
            Toast.fire({
                icon: "success",
                title: method.val() == "POST" ? 'Add successfully' :'Update successfully'
            });
            modalDomain.modal("hide");
            table.draw();
        },
        error: function(error) {
            const {responseJSON, statusText, status} = error;
            if (status == 400) {
                const {message, domain} = responseJSON;
                if (message) {
                    Toast.fire({
                        icon: "error",
                        title: message
                    });
                }else{
                    Toast.fire({
                        icon: "error",
                        title: domain.join(', ')
                    });
                }
            }else{
                Toast.fire({
                    icon: "error",
                    title: statusText
                });
            }
        }
    });
});

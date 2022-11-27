$(document).ready(function () {
    const scrollContainer = document.querySelector(".dataTables_wrapper");
    if (scrollContainer.offsetWidth <= 750) {
        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY * (50 / 100);
        });
    }

    addEventListener("resize", (event) => {
        event.preventDefault();
        $('.table.dataTable').css('width', scrollContainer.offsetWidth);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.verifikasi', function (e) {
        e.preventDefault();
        var postData = new FormData($(this.parentElement.parentElement).find('.form-verifikasi')[0]);
        span = $(this).find('span');
        spin = $(this).find('.spin');
        $(span).hide();
        $(spin).show();
        $.ajax({
            type: 'POST',
            url: url('/provinsi/manajemen-user/struktural/' + $(this).data('user') + '/verification'),
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                $(span).show();
                $(spin).hide();
                swal("Selesai!", response.message, "success").then(() => {
                    location.reload();
                });
            },
            error: ajaxError
        });
    });

    var ajaxError = function (jqXHR, xhr, textStatus, errorThrow, exception) {
        if (jqXHR.status === 0) {
            swal("Error!", 'Not connect.\n Verify Network.', "error");
        } else if (jqXHR.status == 400) {
            swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
        } else if (jqXHR.status == 404) {
            swal('Error!', 'Requested page not found. [404]', "error");
        } else if (jqXHR.status == 500) {
            swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
        } else if (exception === 'parsererror') {
            swal('Error!', 'Requested JSON parse failed.', "error");
        } else if (exception === 'timeout') {
            swal('Error!', 'Time out error.', "error");
        } else if (exception === 'abort') {
            swal('Error!', 'Ajax request aborted.', "error");
        } else if (jqXHR.status == 422) {
            swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
        } else {
            swal('Error!', jqXHR.responseText, "error");
        }
        $('.verifikasi span').show();
        $('.verifikasi .spin').hide();
    };
});
function tolak(id) {
    swal({
        title: "Tolak?",
        text: "Masukan alasan kenapa ditolak!",
        type: "warning",
        input: 'text',
        inputPlaceholder: 'Catatan',
        showCancelButton: true,
        cancelButtonText: "Batal",
        confirmButtonText: 'Ya, tolak!',
        reverseButtons: true,
        showLoaderOnConfirm: true,
        inputValidator: (value) => {
            if (!value) {
                return 'Catatan tidak boleh kosong!'
            }
        },
        preConfirm: async (value) => {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            return await $.ajax({
                type: 'POST',
                url: url('/provinsi/manajemen-user/struktural/' + id + '/reject'),
                data: {
                    _token: CSRF_TOKEN,
                    catatan: value
                },
                dataType: 'JSON'
            });
        },
    }).then(function (e) {
        if (e.value.success == 200) {
            swal({
                type: 'success',
                title: 'Berhasil',
                html: 'Akun Dinyatakan <b style="font-weight: bold; color:red;">DITOLAK</b>'
            }).then(() => {
                $('#User-table').DataTable().ajax
                    .reload()
            });
        } else {
            swal("Error!", e.value.message, "error");
        }
    })
}

function verifikasi(id) {
    swal({
        title: "Verifikasi?",
        text: "Harap Pastikan Dan Kemudian Verifikasi!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Ya, verfikasi!",
        cancelButtonText: "Batal",
        reverseButtons: !0,
        showLoaderOnConfirm: true,
        preConfirm: async () => {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            return await $.ajax({
                type: 'POST',
                url: url('/provinsi/manajemen-user/struktural/' + id + '/verification'),
                data: {
                    _token: CSRF_TOKEN
                },
                dataType: 'JSON'
            });
        },
    }).then(function (e) {
        if (e.value.success == 200) {
            swal({
                type: 'success',
                title: 'Berhasil',
                html: 'Akun Berhasil <b style="font-weight: bold; color:green;">DIVERIFIKASI</b>'
            }).then(() => {
                $('#User-table').DataTable().ajax
                    .reload()
            });
        } else {
            swal("Error!", e.value.message, "error");
        }
    }, function (dismiss) {
        return false;
    })
}

function hapus(id) {
    swal({
        title: "Hapus?",
        text: "Harap Pastikan Dan Kemudian Hapus!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        reverseButtons: !0,
        showLoaderOnConfirm: true,
        preConfirm: async () => {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            return await $.ajax({
                type: 'DELETE',
                url: url('/provinsi/manajemen-user/struktural/' + id + '/destroy'),
                data: {
                    _token: CSRF_TOKEN
                },
                dataType: 'JSON'
            });
        },
    }).then(function (e) {
        if (e.value.success == 200) {
            swal("Selesai!", e.value.message, "success").then(() => {
                $('#User-table').DataTable().ajax
                    .reload()
            });
        } else {
            swal("Error!", e.value.message, "error");
        }
    }, function (dismiss) {
        return false;
    })
}

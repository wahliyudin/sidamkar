$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.tolak-kegiatan').each(function (index, element) {
        $(element).click(function (e) {
            e.preventDefault();
            // const input = document.querySelector(".catatan");
            // input.blur();
            // console.log(input);
            $('#lihat' + $(element).data('id')).modal('hide');
            tolak($(element).data('id'))

        });
    });
    $('.revisi-kegiatan').each(function (index, element) {
        $(element).click(function (e) {
            e.preventDefault();
            $('#lihat' + $(element).data('id')).modal('hide');
            revisi($(element).data('id'))
        });
    });
    $('.verifikasi-kegiatan').each(function (index, element) {
        $(element).click(function (e) {
            e.preventDefault();
            verifikasi($(element).data('id'))
        });
    });
    function tolak(id) {
        swal({
            title: "Tolak?",
            text: "Masukan alasan kenapa ditolak!",
            type: "warning",
            input: 'text',
            inputPlaceholder: 'Catatan',
            showCancelButton: true,
            confirmButtonText: 'Ya, tolak!',
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Catatan tidak boleh kosong!'
                }
            },
            preConfirm: async (value) => {
                return await $.ajax({
                    type: 'POST',
                    url: url("/atasan-langsung/pengajuan-kegiatan/" + id + "/tolak"),
                    data: {
                        catatan: value
                    },
                    dataType: 'JSON'
                });
            },
        }).then(function (e) {
            if (e.dismiss == 'cancel') {
                $('#lihat' + id).modal('show');
                swal.close()
            }
            if (e.value.status == 200) {
                swal("Selesai!", e.value.message, "success").then(() => {
                    location.reload()
                });
            } else {
                swal("Error!", e.value.message, "error");
            }
        })
    }

    function revisi(id) {
        swal({
            title: "Revisi?",
            text: "Masukan alasan kenapa harus direvisi!",
            type: "warning",
            input: 'textarea',
            inputPlaceholder: 'Catatan',
            showCancelButton: true,
            confirmButtonText: 'Ya, Revisi!',
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Catatan tidak boleh kosong!'
                }
            },
            preConfirm: async (value) => {
                return await $.ajax({
                    type: 'POST',
                    url: url("/atasan-langsung/pengajuan-kegiatan/" + id + "/revisi"),
                    data: {
                        catatan: value
                    },
                    dataType: 'JSON'
                });
            },
        }).then(function (e) {
            if (e.dismiss == 'cancel') {
                $('#lihat' + id).modal('show');
                swal.close()
            }
            if (e.value.status == 200) {
                swal("Selesai!", e.value.message, "success").then(() => {
                    location.reload()
                });
            } else {
                swal("Error!", e.value.message, "error");
            }
        })
    }

    function verifikasi(id) {
        swal({
            title: "Perifikasi?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, verfikasi!",
            cancelButtonText: "Batal",
            reverseButtons: !0,
            showLoaderOnConfirm: true,
            preConfirm: async () => {
                return await $.ajax({
                    type: 'POST',
                    url: url("/atasan-langsung/pengajuan-kegiatan/" + id + "/verifikasi"),
                    dataType: 'JSON'
                });
            },
        }).then(function (e) {
            if (e.dismiss == 'cancel') {
                $('#lihat' + id).modal('show');
                swal.close()
            }
            if (e.value.status == 200) {
                swal("Selesai!", e.value.message, "success").then(() => {
                    location.reload()
                });
            } else {
                swal("Error!", e.value.message, "error");
            }
        })
    }
});

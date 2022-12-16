$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
        },
        autoplay: {
            delay: 5000,
        },
    });
    $('.tolak-kegiatan').each(function (index, element) {
        $(element).click(function (e) {
            e.preventDefault();
            $('#riwayatKegiatan' + $(this).data('laporan')).modal('hide');
            tolak($(this).data('laporan'))
        });
    });

    $('.revisi-kegiatan').each(function (index, element) {
        $(element).click(function (e) {
            e.preventDefault();
            $('#riwayatKegiatan' + $(this).data('laporan')).modal('hide');
            revisi($(this).data('laporan'), $(this).data('user'))
        });
    });

    $('.verifikasi-kegiatan').each(function (index, element) {
        $(element).click(function (e) {
            e.preventDefault();
            verifikasi($(this).data('laporan'));
        });
    });

    function tolak(id, current_date) {
        swal({
            title: "Tolak?",
            text: "Masukan alasan kenapa ditolak!",
            type: "warning",
            input: 'text',
            inputPlaceholder: 'Catatan',
            showCancelButton: true,
            confirmButtonText: 'Ya, tolak!',
            cancelButtonText: "Batal",
            reverseButtons: true,
            showLoaderOnConfirm: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Catatan tidak boleh kosong!'
                }
            },
            preConfirm: async (value) => {
                return await $.ajax({
                    type: 'POST',
                    url: url("/atasan-langsung/verifikasi-kegiatan/penunjang/" + id + "/tolak"),
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
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    html: 'Laporan Dinyatakan <b style="font-weight: bold; color:black;">DITOLAK</b>'
                }).then(() => {
                    location.reload()
                });
            } else {
                swal("Error!", e.value.message, "error");
            }
        })
    }

    function revisi(id, user_id, current_date) {
        swal({
            title: "Revisi?",
            text: "Masukan alasan kenapa harus direvisi!",
            type: "warning",
            input: 'textarea',
            inputPlaceholder: 'Catatan',
            showCancelButton: true,
            confirmButtonText: 'Ya, Revisi!',
            cancelButtonText: "Batal",
            reverseButtons: true,
            showLoaderOnConfirm: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Catatan tidak boleh kosong!'
                }
            },
            preConfirm: async (value) => {
                return await $.ajax({
                    type: 'POST',
                    url: url("/atasan-langsung/verifikasi-kegiatan/penunjang/" + id + "/" + user_id + "/revisi"),
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
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    html: 'Laporan Perlu <b style="font-weight: bold; color:#884414;">DIREVISI</b>'
                }).then(() => {
                    location.reload()
                });
            } else {
                swal("Error!", e.value.message, "error");
            }
        })
    }

    function verifikasi(id, current_date) {
        swal({
            title: "Verifikasi?",
            text: "Pastikan Data Yang Dicek Sudah Benar!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, verfikasi!",
            cancelButtonText: "Batal",
            reverseButtons: !0,
            showLoaderOnConfirm: true,
            preConfirm: async () => {
                return await $.ajax({
                    type: 'POST',
                    url: url("/atasan-langsung/verifikasi-kegiatan/penunjang/" + id + "/verifikasi"),
                    dataType: 'JSON'
                });
            },
        }).then(function (e) {
            if (e.dismiss == 'cancel') {
                $('#lihat' + id).modal('show');
                swal.close()
            }
            if (e.value.status == 200) {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    html: 'Laporan Dinyatakan <b style="font-weight: bold; color:green;">SELESAI</b>'
                }).then(() => {
                    location.reload()
                });
            } else {
                swal("Error!", e.value.message, "error");
            }
        })
    }
});

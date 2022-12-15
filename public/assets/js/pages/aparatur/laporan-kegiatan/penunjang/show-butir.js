$(document).ready(function () {
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
        },
        autoplay: {
            delay: 5000,
        },
    });
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
    $.fn.filepond.registerPlugin(FilePondPluginFilePoster);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var pond = FilePond.create(document.querySelector('#laporkan input[name="doc_kegiatan_tmp[]"]'));
    pond.setOptions({
        acceptedFileTypes: [
            'image/*',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/doc',
            'application/pdf',
            '.docx'
        ],
        server: {
            process: '/laporan-kegiatan/jabatan/tmp-file',
            revert: '/laporan-kegiatan/jabatan/revert',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
    });

    $('.simpan-kegiatan').click(function (e) {
        e.preventDefault();
        var postData = new FormData($(".form-kegiatan")[0]);
        $('.simpan-kegiatan span').hide();
        $('.simpan-kegiatan .spin').show();

        $.ajax({
            type: 'POST',
            url: url('/laporan-kegiatan/jabatan/' + $('input[name="butir_kegiatan"]').val() + '/butir-kegiatan/store'),
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                $('.simpan-kegiatan span').show();
                $('.simpan-kegiatan .spin').hide();
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    html: 'Kegiatan Berhasil <b style="font-weight: bold; color:red;">DILAPORKAN</b>'
                }).then(() => {
                    location.reload();
                });
            },
            error: ajaxError
        });
    });
    $("#laporkan").on('hide.bs.modal', function () {
        pond.removeFiles();
    });

    $(document).on('click', '.detail-revisi', function (e) {
        e.preventDefault();
        var pondEdit = FilePond.create(document.querySelector(`#revisiKegiatan${$(this).data('laporan')} input[name="doc_kegiatan_tmp[]"]`));
        $.ajax({
            type: "GET",
            url: url("/laporan-kegiatan/jabatan/" + $(this).data('laporan') + "/edit"),
            dataType: "JSON",
            success: function (response) {
                pondEdit.setOptions({
                    files: response.data,
                });
                pondEdit.setOptions({
                    server: {
                        process: '/laporan-kegiatan/jabatan/tmp-file',
                        revert: '/laporan-kegiatan/jabatan/revert',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    },
                });
            }
        });
    });

    $(document).on('click', '.revisi-kegiatan', function (e) {
        e.preventDefault();
        var postData = new FormData($(".form-kegiatan" + $(this).data('laporan'))[0]);
        $('.revisi-kegiatan span').hide();
        $('.revisi-kegiatan .spin').show();
        $.ajax({
            type: 'POST',
            url: url("/laporan-kegiatan/jabatan/" + $(this).data('laporan') + "/update"),
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                $('.revisi-kegiatan span').show();
                $('.revisi-kegiatan .spin').hide();
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    html: 'Revisi Berhasil <b style="font-weight: bold; color:#884414;">DILAPORKAN</b>'
                }).then(
                    () => {
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
        $('.simpan-kegiatan span').show();
        $('.simpan-kegiatan .spin').hide();
        $('.revisi-kegiatan span').show();
        $('.revisi-kegiatan .spin').hide();
    };
});

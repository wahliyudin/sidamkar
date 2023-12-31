$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
    pond = FilePond.create(document.querySelector('input[type="file"]'), {
        chunkUploads: true
    });
    pond.setOptions({
        server: {
            process: '/laporan-kegiatan/profesi/tmp-file',
            revert: '/laporan-kegiatan/profesi/revert',
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
        butirKegiatan = $('#laporkan input[name="butir_kegiatan"]').val();
        $.ajax({
            type: 'POST',
            url: url('/laporan-kegiatan/profesi/' + butirKegiatan + '/store'),
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                $('.simpan-kegiatan span').show();
                $('.simpan-kegiatan .spin').hide();
                if (response.status == 200) {
                    swal({
                        type: 'success',
                        title: 'Berhasil',
                        html: 'Kegiatan Berhasil <b style="font-weight: bold; color:red;">DILAPORKAN</b>'
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    swal("Error!", response.message, "error");
                }
            },
            error: ajaxError
        });
    });
    $("#laporkan").on('hide.bs.modal', function () {
        pond.removeFiles();
    });
    $("#laporkan").on('hide.bs.modal', function () {
        pond.removeFiles();
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
    };
});

$(document).ready(function () {
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
    pond = FilePond.create(document.querySelector('input[type="file"]'), {
        chunkUploads: true
    });
    pond.setOptions({
        server: {
            process: '/laporan-kegiatan/jabatan/tmp-file',
            revert: '/laporan-kegiatan/jabatan/revert',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.laporkan', function (e) {
        e.preventDefault();
        $('input[name="rencana_butir_kegiatan"]').val($(this).data('rencana'));
        $('input[name="current_date"]').val($('input[name="tanggal"]').val());
    });

    $('.simpan-kegiatan').click(function (e) {
        e.preventDefault();
        var postData = new FormData($(".form-kegiatan")[0]);
        $('.simpan-kegiatan span').hide();
        $('.simpan-kegiatan .spin').show();
        // $.ajax({
        //     xhr: function() {
        //         var xhr = new window.XMLHttpRequest();

        //         // Upload progress
        //         xhr.upload.addEventListener("progress", function(evt) {
        //             if (evt.lengthComputable) {
        //                 var percentComplete = evt.loaded / evt.total;
        //                 //Do something with upload progress
        //                 console.log(percentComplete);
        //             }
        //         }, false);

        //         // Download progress
        //         xhr.addEventListener("progress", function(evt) {
        //             if (evt.lengthComputable) {
        //                 var percentComplete = evt.loaded / evt.total;
        //                 // Do something with download progress
        //                 console.log(percentComplete);
        //             }
        //         }, false);

        //         return xhr;
        //     },
        //     type: 'POST',
        //     url: "{{ route('laporan-kegiatan.jabatan.store-laporan') }}",
        //     processData: false,
        //     contentType: false,
        //     data: postData,
        //     success: function(data) {
        //         $('.simpan-kegiatan span').show();
        //         $('.simpan-kegiatan .spin').hide();
        //         if (response.status == 200) {
        //             swal("Selesai!", response.message, "success").then(() => {
        //                 location.reload();
        //             });
        //         } else {
        //             swal("Error!", response.message, "error");
        //         }
        //     },
        //     error: ajaxError
        // });
        $.ajax({
            type: 'POST',
            url: url('/laporan-kegiatan/jabatan/store'),
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                $('.simpan-kegiatan span').show();
                $('.simpan-kegiatan .spin').hide();
                if (response.status == 200) {
                    swal("Selesai!", response.message, "success").then(() => {
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
    $(document).on('click', '.btn-revisi', function (e) {
        e.preventDefault();
        pondEdit = FilePond.create(document.querySelector(
            'input[name="doc_kegiatan_tmp[]"]'), {
            chunkUploads: true
        });
        pondEdit.setOptions({
            server: {
                process: '/laporan-kegiatan/jabatan/tmp-file',
                revert: '/laporan-kegiatan/jabatan/revert',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content')
                }
            },
        });
        $('input[name="current_date"]').val($('input[name="tanggal"]').val());
        $('#revisi' + $(this).data('rencana')).modal('show');
        $.ajax({
            type: "POST",
            url: url("/laporan-kegiatan/jabatan/" + $(this).data('rencana') + "/" + $(
                'input[name="tanggal"]').val() + "/edit"),
            dataType: "json",
            success: function (response) {
                pondEdit.removeFile();
                response.data.laporan_kegiatan_jabatan.dokumen_kegiatan_pokoks.forEach((
                    element,
                    i) => {
                    pondEdit.addFile(element.file, {
                        index: i
                    });
                });
            }
        });
    });

    $(document).on('click', '.revisi-kegiatan', function (e) {
        e.preventDefault();
        var postData = new FormData($(".form-kegiatan" + $(this).data('rencana'))[
            0]);
        $('.revisi-kegiatan span').hide();
        $('.revisi-kegiatan .spin').show();
        $.ajax({
            type: 'POST',
            url: url("/laporan-kegiatan/jabatan/" + $(this).data('rencana') +
                "/update"),
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                $('.revisi-kegiatan span').show();
                $('.revisi-kegiatan .spin').hide();
                if (response.status == 200) {
                    swal("Selesai!", response.message, "success").then(
                        () => {
                            location.reload();
                        });
                } else {
                    swal("Error!", response.message, "error");
                }
            },
            error: ajaxError
        });
    });

    var ajaxError = function (jqXHR, xhr, textStatus, errorThrow, exception) {
        if (jqXHR.status === 0) {
            swal("Error!", 'Not connect.\n Verify Network.', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
        } else if (jqXHR.status == 400) {
            swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
        } else if (jqXHR.status == 404) {
            swal('Error!', 'Requested page not found. [404]', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
        } else if (jqXHR.status == 500) {
            swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
        } else if (exception === 'parsererror') {
            swal('Error!', 'Requested JSON parse failed.', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
        } else if (exception === 'timeout') {
            swal('Error!', 'Time out error.', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
        } else if (exception === 'abort') {
            swal('Error!', 'Ajax request aborted.', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
        } else if (jqXHR.status == 422) {
            swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
        } else {
            swal('Error!', jqXHR.responseText, "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
        }
    };
});

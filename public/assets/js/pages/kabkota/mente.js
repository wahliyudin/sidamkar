$(document).ready(function () {
    $('#table-fungsional').DataTable({
        responsive: true,
    });
    // $(document).ready(function () {
    //     $('#Mente-table').on('click', 'tbody > tr > td:not(.action)', function () {
    //         window.location.replace(url(
    //             `/kab-kota/data-mente/${$($(this).find('.nama')).data('detail')}/show`
    //         ));
    //     });
    // });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#editMentee").on('hide.bs.modal', function () {
        $("#table-fungsional-edit tbody").children().remove();
    });
    $(document).on('click', '.edit-mente', function () {
        $($('#editMentee').find('.simpan-edit-mente')).data('id', $(this).data('id'));
        $.ajax({
            type: "GET",
            url: url('/kab-kota/data-mente/' + $(this).data('id') + '/edit'),
            dataType: "json",
            success: function (response) {
                $('.mente-fungsional-edit select[name="atasan_langsung"]').val(response.data);
                $('#editMentee').modal('show');
            },
            error: ajaxError
        });

    });

    $('.simpan-mente').click(function (e) {
        e.preventDefault();
        var postData = new FormData($(".mente-fungsional")[0]);
        $('.simpan-mente span').hide();
        $('.simpan-mente .spin').show();
        $.ajax({
            type: 'POST',
            url: url("/kab-kota/data-mente/store"),
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                $('.simpan-mente span').show();
                $('.simpan-mente .spin').hide();
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

    $('.simpan-edit-mente').click(function (e) {
        e.preventDefault();
        var atasan_langsung = $('.mente-fungsional-edit select[name="atasan_langsung"]').val();
        $.ajax({
            type: 'PUT',
            url: url("/kab-kota/data-mente/" + $(this).data('id') + "/update"),
            data: {
                atasan_langsung: atasan_langsung
            },
            dataType: 'json',
            beforeSend: function () {
                $('.simpan-edit-mente span').hide();
                $('.simpan-edit-mente .spin').show();
            },
            success: function (response) {
                $('.simpan-edit-mente span').show();
                $('.simpan-edit-mente .spin').hide();
                if (response.status == 200) {
                    swal("Selesai!", response.message, "success").then(() => {
                        $('#editMentee').modal('hide');
                        $('#Mente-table').DataTable().ajax.reload();
                    });
                } else {
                    swal("Error!", response.message, "error");
                }
            },
            error: ajaxError
        });
    });

    $('.penilai-damkar').click(function (e) {
        e.preventDefault();
        $('#tambahPenilai input[name="jenis_aparatur"]').val('damkar');
        $('#tambahPenilai input[name="penilai_penetap"]').val('penilai');
    });

    $('.penilai-analis').click(function (e) {
        e.preventDefault();
        $('#tambahPenilai input[name="jenis_aparatur"]').val('analis');
        $('#tambahPenilai input[name="penilai_penetap"]').val('penilai');
    });

    $('.penetap-damkar').click(function (e) {
        e.preventDefault();
        $('#tambahPenetap input[name="jenis_aparatur"]').val('damkar');
        $('#tambahPenetap input[name="penilai_penetap"]').val('penetap');
    });

    $('.penetap-analis').click(function (e) {
        e.preventDefault();
        $('#tambahPenetap input[name="jenis_aparatur"]').val('analis');
        $('#tambahPenetap input[name="penilai_penetap"]').val('penetap');
    });

    var ajaxError = function (jqXHR, xhr, textStatus, errorThrow, exception) {
        if (jqXHR.status === 0) {
            swal("Error!", 'Not connect.\n Verify Network.', "error");
            $('.simpan-mente span').show();
            $('.simpan-mente .spin').hide();
        } else if (jqXHR.status == 400) {
            swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
            $('.simpan-mente span').show();
            $('.simpan-mente .spin').hide();
        } else if (jqXHR.status == 404) {
            swal('Error!', 'Requested page not found. [404]', "error");
            $('.simpan-mente span').show();
            $('.simpan-mente .spin').hide();
        } else if (jqXHR.status == 500) {
            swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
            $('.simpan-mente span').show();
            $('.simpan-mente .spin').hide();
        } else if (exception === 'parsererror') {
            swal('Error!', 'Requested JSON parse failed.', "error");
            $('.simpan-mente span').show();
            $('.simpan-mente .spin').hide();
        } else if (exception === 'timeout') {
            swal('Error!', 'Time out error.', "error");
            $('.simpan-mente span').show();
            $('.simpan-mente .spin').hide();
        } else if (exception === 'abort') {
            swal('Error!', 'Ajax request aborted.', "error");
            $('.simpan-mente span').show();
            $('.simpan-mente .spin').hide();
        } else if (jqXHR.status == 422) {
            swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
            $('.simpan-mente span').show();
            $('.simpan-mente .spin').hide();
        } else {
            swal('Error!', jqXHR.responseText, "error");
            $('.simpan-mente span').show();
            $('.simpan-mente .spin').hide();
        }
    };
});

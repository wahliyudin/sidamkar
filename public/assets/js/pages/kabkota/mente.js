$(document).ready(function () {
    $('#table-fungsional').DataTable({
        responsive: true,
    });
    $(document).ready(function () {
        $('#Mente-table').on('click', 'tbody > tr', function () {
            window.location.replace(url(
                `/kab-kota/data-mente/${$($(this).find('.nama')).data('detail')}/show`
            ));
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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

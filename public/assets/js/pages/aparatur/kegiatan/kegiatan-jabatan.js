
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    loadData();
    $('input[name="search"]').keyup(function (e) {
        loadData(e.target.value);
    });

    function loadData(search = null) {
        $.ajax({
            type: "POST",
            url: url('/kegiatan/jabatan/search'),
            data: {
                search: search,
            },
            dataType: "json",
            success: function (response) {
                $('.rencana-container').html(rencanas(response.data));
            }
        });
    }

    function rencanas(rencanas) {
        return $.map(rencanas, function (rencana, indexOrKey) {
            return `
                <div class="rencana-item">
                    <p>${rencana.nama}</p>
                    <div class="rencana-buttons">
                        <button class="rencana-button me-2">
                            <i class="fa-regular fa-pen-to-square cursor-pointer text-green" data-id=""></i>
                        </button>
                        <button class="rencana-button">
                            <i class="fa-solid fa-trash-can cursor-pointer text-red" data-id=""></i>
                        </button>
                    </div>
                </div>
            `;
        }).join('')
    }

    $('.simpan-rencana').click(function (e) {
        e.preventDefault();
        $('.simpan-rencana span').hide();
        $('.simpan-rencana .spin').show();
        rencana = $('textarea[name="rencana"]').val();
        $.ajax({
            type: "POST",
            url: url('/kegiatan/jabatan/rencana-kinerja/store'),
            data: {
                rencana: rencana
            },
            dataType: "json",
            success: function (response) {
                $('.simpan-rencana span').show();
                $('.simpan-rencana .spin').hide();
                swal({ type: 'success', title: 'Berhasil', html: 'Rencana Berhasil <b style="font-weight: bold; color:#18b882;">DISIMPAN</b>' }).then(() => {
                    location.reload();
                });
            },
            error: ajaxError
        });
    });

    var ajaxError = function (jqXHR, xhr, textStatus, errorThrow, exception) {
        if (jqXHR.status === 0) {
            swal("Error!", 'Not connect.\n Verify Network.', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
        } else if (jqXHR.status == 400) {
            swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
        } else if (jqXHR.status == 404) {
            swal('Error!', 'Requested page not found. [404]', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
        } else if (jqXHR.status == 500) {
            swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
        } else if (exception === 'parsererror') {
            swal('Error!', 'Requested JSON parse failed.', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
        } else if (exception === 'timeout') {
            swal('Error!', 'Time out error.', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
        } else if (exception === 'abort') {
            swal('Error!', 'Ajax request aborted.', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
        } else if (jqXHR.status == 422) {
            swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
        } else {
            swal('Error!', jqXHR.responseText, "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
        }
    };
});

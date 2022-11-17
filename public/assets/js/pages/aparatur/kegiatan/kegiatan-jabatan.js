
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
                        <button data-rencana="${rencana.id}" class="rencana-button me-2 edit-rencana">
                            <i class="fa-regular fa-pen-to-square cursor-pointer text-green" data-id=""></i>
                        </button>
                        <button data-rencana="${rencana.id}" class="rencana-button hapus-rencana">
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

    $('.update-rencana').click(function (e) {
        e.preventDefault();
        $('.update-rencana span').hide();
        $('.update-rencana .spin').show();
        rencana = $('#editRencana textarea[name="rencana"]').val();
        $.ajax({
            type: "PUT",
            url: url('/kegiatan/jabatan/rencana-kinerja/' + $('#editRencana input[name="__rencana"]').val() + '/update'),
            data: {
                rencana: rencana
            },
            dataType: "json",
            success: function (response) {
                $('.update-rencana span').show();
                $('.update-rencana .spin').hide();
                swal({ type: 'success', title: 'Berhasil', html: 'Rencana Berhasil <b style="font-weight: bold; color:#18b882;">DIUBAH</b>' }).then(() => {
                    location.reload();
                });
            },
            error: ajaxError
        });
    });

    $(document).on('click', '.edit-rencana', function () {
        $.ajax({
            type: "GET",
            url: url('/kegiatan/jabatan/rencana-kinerja/' + $(this).data('rencana') + '/edit'),
            dataType: "json",
            success: function (response) {
                $('#editRencana textarea[name="rencana"]').val(response.rencana.nama);
                $('#editRencana input[name="__rencana"]').val(response.rencana.id);
                $('#editRencana').modal('show');
            },
            error: ajaxError
        });
    });

    $(document).on('click', '.hapus-rencana', function () {
        swal({
            title: "Yakin ingin menghapus?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, yakin!",
            cancelButtonText: "Batal",
            reverseButtons: !0,
            showLoaderOnConfirm: true,
            preConfirm: async () => {
                return await $.ajax({
                    type: 'DELETE',
                    url: url('/kegiatan/jabatan/rencana-kinerja/' + $(this).data('rencana') + '/destroy'),
                    dataType: 'JSON'
                });
            },
        }).then(function (e) {
            swal("Selesai!", e.value.message, "success").then(() => {
                location.reload();
            });
        })
    });

    var ajaxError = function (jqXHR, xhr, textStatus, errorThrow, exception) {
        if (jqXHR.status === 0) {
            swal("Error!", 'Not connect.\n Verify Network.', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
            $('.update-rencana span').show();
            $('.update-rencana .spin').hide();
        } else if (jqXHR.status == 400) {
            swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
            $('.update-rencana span').show();
            $('.update-rencana .spin').hide();
        } else if (jqXHR.status == 404) {
            swal('Error!', 'Requested page not found. [404]', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
            $('.update-rencana span').show();
            $('.update-rencana .spin').hide();
        } else if (jqXHR.status == 500) {
            swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
            $('.update-rencana span').show();
            $('.update-rencana .spin').hide();
        } else if (exception === 'parsererror') {
            swal('Error!', 'Requested JSON parse failed.', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
            $('.update-rencana span').show();
            $('.update-rencana .spin').hide();
        } else if (exception === 'timeout') {
            swal('Error!', 'Time out error.', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
            $('.update-rencana span').show();
            $('.update-rencana .spin').hide();
        } else if (exception === 'abort') {
            swal('Error!', 'Ajax request aborted.', "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
            $('.update-rencana span').show();
            $('.update-rencana .spin').hide();
        } else if (jqXHR.status == 422) {
            swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
            $('.update-rencana span').show();
            $('.update-rencana .spin').hide();
        } else {
            swal('Error!', jqXHR.responseText, "error");
            $('.simpan-rencana span').show();
            $('.simpan-rencana .spin').hide();
            $('.update-rencana span').show();
            $('.update-rencana .spin').hide();
        }
    };
});

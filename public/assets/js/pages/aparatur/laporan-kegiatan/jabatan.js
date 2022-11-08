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

    $(document).on('click', '.send-rekap', function (e) {
        e.preventDefault();
        $.ajax({
            beforeSend: function () {
                $('.send-rekap span').hide();
                $('.send-rekap .spin').show();
            },
            type: 'POST',
            url: url('/laporan-kegiatan/jabatan/rekapitulasi/send-rekap'),
            dataType: "json",
            success: function (response) {
                $('.send-rekap span').show();
                $('.send-rekap .spin').hide();
                swal("Selesai!", response.message, "success").then(
                    () => {
                        location.reload();
                    });
            },
            error: ajaxError
        });
    });

    $(document).on('click', '.rekap', function (e) {
        e.preventDefault();
        $.ajax({
            beforeSend: function () {
                $('#rekap .bg-spin').show();
            },
            type: 'POST',
            url: url('/laporan-kegiatan/jabatan/rekapitulasi'),
            dataType: "json",
            success: function (response) {
                $('.review-rekap').attr('src', response.data);
                $('#rekap .bg-spin').hide();
                swal("Selesai!", response.message, "success");
            },
            error: ajaxError
        });
    });

    var ajaxError = function (jqXHR, xhr, textStatus, errorThrow, exception) {
        if (jqXHR.status === 0) {
            swal("Error!", 'Not connect.\n Verify Network.', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
            $('#rekap .bg-spin').hide();
            $('.send-rekap span').show();
            $('.send-rekap .spin').hide();
        } else if (jqXHR.status == 400) {
            swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
            $('#rekap .bg-spin').hide();
            $('.send-rekap span').show();
            $('.send-rekap .spin').hide();
        } else if (jqXHR.status == 404) {
            swal('Error!', 'Requested page not found. [404]', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
            $('#rekap .bg-spin').hide();
            $('.send-rekap span').show();
            $('.send-rekap .spin').hide();
        } else if (jqXHR.status == 500) {
            swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
            $('#rekap .bg-spin').hide();
            $('.send-rekap span').show();
            $('.send-rekap .spin').hide();
        } else if (exception === 'parsererror') {
            swal('Error!', 'Requested JSON parse failed.', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
            $('#rekap .bg-spin').hide();
            $('.send-rekap span').show();
            $('.send-rekap .spin').hide();
        } else if (exception === 'timeout') {
            swal('Error!', 'Time out error.', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
            $('#rekap .bg-spin').hide();
            $('.send-rekap span').show();
            $('.send-rekap .spin').hide();
        } else if (exception === 'abort') {
            swal('Error!', 'Ajax request aborted.', "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
            $('#rekap .bg-spin').hide();
            $('.send-rekap span').show();
            $('.send-rekap .spin').hide();
        } else if (jqXHR.status == 422) {
            swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
            $('#rekap .bg-spin').hide();
            $('.send-rekap span').show();
            $('.send-rekap .spin').hide();
        } else {
            swal('Error!', jqXHR.responseText, "error");
            $('.simpan-kegiatan span').show();
            $('.simpan-kegiatan .spin').hide();
            $('#rekap .bg-spin').hide();
            $('.send-rekap span').show();
            $('.send-rekap .spin').hide();
        }
    };

    if (localStorage.getItem('search_date')) {
        loadData(null, localStorage.getItem('search_date'));
        $('input[name="tanggal"]').val(localStorage.getItem('search_date'));
    } else {
        loadData();
    }
    $('input[name="search"]').keyup(function (e) {
        loadData(e.target.value, $('input[name="tanggal"]').val());
    });

    $('input[name="tanggal"]').change(function (e) {
        e.preventDefault();
        localStorage.setItem('search_date', e.target.value);
        loadData($('input[name="search"]').val(), e.target.value);
    });

    function loadData(search = null, date = null) {
        $.ajax({
            type: "POST",
            url: url('/laporan-kegiatan/jabatan/load-data'),
            data: {
                search: search,
                search_date: date,
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
                <div class="row">
                    <div class="col-md-4">
                        <h5>${rencana.nama}</h5>
                    </div>
                </div>
                <div class="card-body accordion-container">
                    <div class="accordion" id="accordion-parent">
                        ${rencanaUnsurs(rencana.rencana_unsurs)}
                    </div>
                </div>
            `;
        }).join('')
    }

    function rencanaUnsurs(rencanaUnsurs) {
        return $.map(rencanaUnsurs, function (rencanaUnsur, indexOrKey) {
            return `
                <div class="accordion-item">
                    <div class="d-flex justify-content-between accordion-header py-3 px-2"
                        id="unsur${rencanaUnsur.id}${rencanaUnsur.unsur.id}">
                        <div class="d-flex align-items-center justify-content-between w-100"
                            style="color: #000000;">
                            <p class="accordion-title">
                                ${rencanaUnsur.unsur.nama}
                            </p>
                        </div>
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#contentUnsur${rencanaUnsur.id}${rencanaUnsur.unsur.id}"
                            aria-expanded="false"
                            aria-controls="contentUnsur${rencanaUnsur.id}${rencanaUnsur.unsur.id}">
                        </button>
                    </div>
                    <div id="contentUnsur${rencanaUnsur.id}${rencanaUnsur.unsur.id}" class="accordion-collapse collapse"
                        aria-labelledby="unsur${rencanaUnsur.id}${rencanaUnsur.unsur.id}"
                        style="">
                        <div class="accordion-body">
                            <div class="accordion" id="accordion-child">
                                ${rencanaSubUnsurs(rencanaUnsur.rencana_sub_unsurs)}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join('')
    }

    function rencanaSubUnsurs(rencanaSubUnsurs) {
        return $.map(rencanaSubUnsurs, function (rencanaSubUnsur, indexOrKey) {
            return `
                <div class="accordion-item">
                    <div class="d-flex justify-content-between accordion-header py-1 px-1"
                        id="subUnsur${rencanaSubUnsur.sub_unsur.id}">
                        <div class="d-flex align-items-center"
                            style="color: #000000;">
                            <h6 class="accordian-title">
                                ${rencanaSubUnsur.sub_unsur.nama}
                            </h6>
                        </div>
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#contentchildSubUnsur${rencanaSubUnsur.sub_unsur.id}"
                            aria-expanded="false"
                            aria-controls="contentchildSubUnsur${rencanaSubUnsur.sub_unsur.id}">
                        </button>
                    </div>
                    <div id="contentchildSubUnsur${rencanaSubUnsur.sub_unsur.id}"
                        class="accordion-collapse collapse"
                        aria-labelledby="subUnsur${rencanaSubUnsur.sub_unsur.id}"
                        style="">
                        <div class="accordion-body">
                            <ul class="ms-0">
                                ${butirKegiatans(rencanaSubUnsur.rencana_butir_kegiatans)}
                            </ul>
                        </div>
                    </div>
                </div>
            `;
        }).join('')
    }

    function butirKegiatans(rencanaButirKegiatans) {
        return $.map(rencanaButirKegiatans, function (rencanaButirKegiatan, indexOrKey) {
            return `
                <li class="accordian-list">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="accordian-title">
                            ${rencanaButirKegiatan.butir_kegiatan.nama}
                        </h6>
                        <div class="d-flex align-items-center">
                            ${rencanaButirKegiatan.button}
                        </div>
                    </div>
                </li>
            `;
        }).join('')
    }
});

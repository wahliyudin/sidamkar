$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.tolak-kegiatan', function (e) {
        e.preventDefault();
        $('#lihat' + $(this).data('id')).modal('hide');
        tolak($(this).data('id'))
    });
    $(document).on('click', '.revisi-kegiatan', function (e) {
        e.preventDefault();
        $('#lihat' + $(this).data('id')).modal('hide');
        revisi($(this).data('id'))
    });
    $(document).on('click', '.verifikasi-kegiatan', function (e) {
        e.preventDefault();
        verifikasi($(this).data('id'))
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
            url: url('/atasan-langsung/pengajuan-kegiatan/' + $('input[name="user"]').val() + '/load-data'),
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

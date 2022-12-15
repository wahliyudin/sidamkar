$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
            url: url('/laporan-kegiatan/profesi/load-data'),
            data: {
                search: search,
                current_date: date,
            },
            dataType: "json",
            success: function (response) {
                $('.unsur-container').html(unsurs(response.unsurs));
            }
        });
    }

    function unsurs(unsurs) {
        return $.map(unsurs, function (unsur, indexOrKey) {
            return `
                <div class="accordion-item">
                    <div class="d-flex justify-content-between accordion-header py-3 px-2"
                        id="unsur${unsur.id}">
                        <div class="d-flex align-items-center justify-content-between w-100"
                            style="color: #000000;">
                            <p class="accordion-title">
                                ${unsur.nama}
                            </p>
                        </div>
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#contentUnsur${unsur.id}"
                            aria-expanded="false"
                            aria-controls="contentUnsur${unsur.id}">
                        </button>
                    </div>
                    <div id="contentUnsur${unsur.id}" class="accordion-collapse collapse"
                        aria-labelledby="unsur${unsur.id}"
                        style="">
                        <div class="accordion-body">
                            <div class="accordion" id="accordion-child">
                                ${subUnsurs(unsurs)}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join('')
    }

    function subUnsurs(subUnsurs) {
        return $.map(subUnsurs, function (subUnsur, indexOrKey) {
            return `
                <div class="accordion-item">
                    <div class="d-flex justify-content-between accordion-header py-1 px-1"
                        id="subUnsur${subUnsur.id}">
                        <div class="d-flex align-items-center"
                            style="color: #000000;">
                            <h6 class="accordian-title">
                                ${subUnsur.nama}
                            </h6>
                        </div>
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#contentchildSubUnsur${subUnsur.id}"
                            aria-expanded="false"
                            aria-controls="contentchildSubUnsur${subUnsur.id}">
                        </button>
                    </div>
                    <div id="contentchildSubUnsur${subUnsur.id}"
                        class="accordion-collapse collapse"
                        aria-labelledby="subUnsur${subUnsur.id}"
                        style="">
                        <div class="accordion-body">
                            <ul class="ms-0">
                                ${butirKegiatans(subUnsur.butir_kegiatans)}
                            </ul>
                        </div>
                    </div>
                </div>
            `;
        }).join('')
    }

    function butirKegiatans(butirKegiatans) {
        return $.map(butirKegiatans, function (butirKegiatan, indexOrKey) {
            if (butirKegiatan.sub_butir_kegiatans.length > 0) {
                return `
                    <div class="accordion-item">
                        <div class="d-flex justify-content-between accordion-header py-1 px-2"
                            id="ButirKegiatan${butirKegiatan.id}">
                            <div class="d-flex align-items-center"
                                style="color: #000000;width: calc(100% - 4rem);">
                                <h6 class="accordian-title">
                                    ${butirKegiatan.nama}
                                </h6>
                            </div>
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#contentchildButirKegiatan${butirKegiatan.id}"
                                aria-expanded="false"
                                aria-controls="contentchildButirKegiatan${butirKegiatan.id}">
                            </button>
                        </div>
                        <div id="contentchildButirKegiatan${butirKegiatan.id}"
                            class="accordion-collapse collapse"
                            aria-labelledby="ButirKegiatan${butirKegiatan.id}"
                            style="">
                            <div class="accordion-body">
                                <ul class="ms-0">
                                    ${subButirKegiatans(butirKegiatan.sub_butir_kegiatans)}
                                </ul>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                return `
                    <div class="d-flex ms-2 align-items-center justify-content-between"
                        style="width: calc(100% - 4rem);">
                        <h6 class="accordian-title">
                            ${butirKegiatan.nama}
                        </h6>
                        <div class="d-flex align-items-center">
                            ${butirKegiatan.button}
                        </div>
                    </div>
                `;
            }
        }).join('')
    }

    function subButirKegiatans(subButirKegiatans) {
        return $.map(subButirKegiatans, function (subButirKegiatan, indexOrKey) {
            return `
                <li class="accordian-list">
                    <div
                        class="d-flex align-items-center justify-content-between">
                        <h6
                            class="accordian-title">
                            ${subButirKegiatan.nama}
                        </h6>
                        <div class="d-flex align-items-center">
                            ${subButirKegiatan.button}
                        </div>
                    </div>
                </li>
            `;
        }).join('')
    }

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

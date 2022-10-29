$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    getData();
    $('input[name="search"]').keyup(function (e) {
        getData(e.target.value);
    });

    function getData(search = null) {
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
                <div class="row">
                    <div class="form-group col-md-4">
                        <input class="form-control" type="text" value="${rencana.nama}"
                            name="rencana_kinerja">
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
                        <h6 class="accordian-title"
                            style="color: #1AD598;">
                            ${rencanaButirKegiatan.butir_kegiatan.score}
                        </h6>
                    </div>
                </li>
            `;
        }).join('')
    }
});

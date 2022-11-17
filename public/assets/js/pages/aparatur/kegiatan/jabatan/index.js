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
            url: url('/laporan-kegiatan/jabatan/load-data'),
            data: {
                search: search
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
                    <div class="d-flex flex-column accordion-header py-3 px-2" id="unsur${unsur.id}">
                        <div class="d-flex justify-content-between align-items-center ps-2 mb-1">
                            <span class="bg-green text-sm text-white font-bold py-1 px-2 rounded-md label-role">
                                ${unsur.role?.display_name}
                            </span>
                            <div class="d-flex align-items-center">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#contentUnsur${unsur.id}" aria-expanded="false"
                                    aria-controls="contentUnsur${unsur.id}">
                                </button>
                            </div>
                        </div>
                        <div class="ps-2 pt-2">
                            <h6 class="accordian-title" style="color: #000000;">${unsur.nama}</h6>
                        </div>
                    </div>
                    <div id="contentUnsur${unsur.id}" class="accordion-collapse collapse"
                        aria-labelledby="unsur${unsur.id}"
                        style="">
                        <div class="accordion-body pt-0">
                            <div class="accordion" id="accordion-child">
                                ${subUnsurs(unsur.sub_unsurs)}
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
            return `
                <li class="accordian-list">
                    <a href="" class="d-flex align-items-center justify-content-between link-butir">
                        <h6 class="accordian-title">
                            ${butirKegiatan.nama}
                        </h6>
                        <div class="d-flex align-items-center">

                        </div>
                    </a>
                </li>
            `;
        }).join('')
    }


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
    };
});

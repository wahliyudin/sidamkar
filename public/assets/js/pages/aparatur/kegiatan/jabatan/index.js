$(document).ready(function () {
    // $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    // $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
    // $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
    // FilePond.create(document.querySelector('input[name="file_sk"]'), {
    //     chunkUploads: true,
    //     acceptedFileTypes: [
    //         'application/doc',
    //         'application/pdf',
    //         '.docx'
    //     ]
    // });
    FilePond.create(document.querySelector('input[name="file_skp"]'), {
        chunkUploads: true,
        acceptedFileTypes: [
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "application/doc",
            "application/pdf",
            ".docx",
        ],
    });
    // FilePond.setOptions({
    //     server: {
    //         process: '/register/file',
    //         revert: '/register/revert',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     },
    // });
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    loadData();

    $('input[name="search"]').keyup(function (e) {
        loadData(e.target.value);
    });

    function loadData(search = null) {
        $.ajax({
            type: "POST",
            url: url("/laporan-kegiatan/jabatan/load-data"),
            data: {
                search: search,
            },
            dataType: "json",
            success: function (response) {
                $(".unsur-container").html(unsurs(response.unsurs));
            },
        });
    }

    $(".rekap").click(function (e) {
        e.preventDefault();
        $(".bg-spin").show();
        $.ajax({
            type: "POST",
            url: url("/laporan-kegiatan/jabatan/rekapitulasi"),
            dataType: "JSON",
            success: function (response) {
                $(".review-rekap").attr("src", response.data);
                $(".bg-spin").hide();
            },
            error: ajaxError,
        });
    });

    $(".send-rekap").click(function (e) {
        e.preventDefault();
        $(".send-rekap span").hide();
        $(".send-rekap .spin").show();
        // swal({
        //     title: "Kirim Ke Atasan Langsung?",
        //     text: "Harap Pastikan Dan Kemudian Kirim Ke Atasan Langsung!",
        //     type: "warning",
        //     showCancelButton: !0,
        //     confirmButtonText: "Ya, Kirim!",
        //     cancelButtonText: "Batal",
        //     reverseButtons: !0,
        //     showLoaderOnConfirm: true,
        //     preConfirm: async () => {
        //         return await $.ajax({
        //             type: "POST",
        //             url: url('/laporan-kegiatan/jabatan/rekapitulasi/send-rekap'),
        //             dataType: "JSON",
        //         });
        //     },
        // }).then(function (e) {
        //     if (e.value.success == 200) {
        //         swal({
        //             type: 'success',
        //             title: 'Berhasil',
        //             html: 'Berhasil Di Kirim'
        //         }).then(() => {
        //             location.reload()
        //         });
        //     } else {
        //         swal("Error!", e.value.message, "error");
        //     }
        // }, function (dismiss) {
        //     $(".send-rekap span").show();
        //     $(".send-rekap .spin").hide();
        //     return false;
        // })
        $.ajax({
            type: "POST",
            url: url("/laporan-kegiatan/jabatan/rekapitulasi/send-rekap"),
            dataType: "JSON",
            success: function (response) {
                $(".send-rekap span").show();
                $(".send-rekap .spin").hide();
                swal({
                    type: "success",
                    title: "Berhasil",
                    html: "Berhasil Direkapitulasi",
                }).then(() => {
                    location.reload();
                });
            },
            error: ajaxError,
        });
    });

    function unsurs(unsurs) {
        if (unsurs.length > 0) {
            return $.map(unsurs, function (unsur, indexOrKey) {
                return `
                    <div class="accordion-item">
                        <div class="d-flex justify-content-between align-items-center accordion-header py-3 px-2" id="unsur${
                            unsur.id
                        }">
                            <div class="ps-2 pt-2">
                                <h6 class="accordian-title" style="color: #000000;">${
                                    unsur.nama
                                }</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#contentUnsur${
                                        unsur.id
                                    }" aria-expanded="false"
                                    aria-controls="contentUnsur${unsur.id}">
                                </button>
                            </div>
                        </div>
                        <div id="contentUnsur${
                            unsur.id
                        }" class="accordion-collapse collapse"
                            aria-labelledby="unsur${unsur.id}"
                            style="">
                            <div class="accordion-body overflow-auto pt-0">
                                <div class="accordion" id="accordion-child">
                                    ${subUnsurs(unsur.sub_unsurs)}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }).join("");
        } else {
            return `<div class="d-flex py-4 justify-content-center">Belum Ada Data Untuk Ditampilkan</div>`;
        }
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
                        <div class="accordion-body overflow-auto">
                            <ul class="ms-0">
                                ${butirKegiatans(subUnsur.butir_kegiatans)}
                            </ul>
                        </div>
                    </div>
                </div>
            `;
        }).join("");
    }

    function butirKegiatans(butirKegiatans) {
        return $.map(butirKegiatans, function (butirKegiatan, indexOrKey) {
            return `
                <li class="accordian-list ">
                    <div class="d-flex align-items-center justify-content-between flex-wrap w-auto">
                        <a href="${url(
                            "/laporan-kegiatan/jabatan/" +
                                butirKegiatan.id +
                                "/show"
                        )}" class="link-butir">
                            <h6 class="accordian-title">
                                ${butirKegiatan.nama}
                            </h6>
                        </a>
                        <div class="d-flex align-items-center ">
                            <span class="bg-green text-sm text-center text-white font-bold py-1 px-2 rounded-md label-role" style="white-space: nowrap;">
                                ${butirKegiatan.role?.display_name}
                            </span>
                        </div>
                    </div>
                </li>
            `;
        }).join("");
    }

    var ajaxError = function (jqXHR, xhr, textStatus, errorThrow, exception) {
        if (jqXHR.status === 0) {
            swal("Error!", "Not connect.\n Verify Network.", "error");
        } else if (jqXHR.status == 400) {
            swal("Peringatan!", jqXHR["responseJSON"].message, "warning");
        } else if (jqXHR.status == 404) {
            swal("Error!", "Requested page not found. [404]", "error");
        } else if (jqXHR.status == 500) {
            swal(
                "Error!",
                "Internal Server Error [500]." + jqXHR["responseJSON"].message,
                "error"
            );
        } else if (exception === "parsererror") {
            swal("Error!", "Requested JSON parse failed.", "error");
        } else if (exception === "timeout") {
            swal("Error!", "Time out error.", "error");
        } else if (exception === "abort") {
            swal("Error!", "Ajax request aborted.", "error");
        } else if (jqXHR.status == 422) {
            swal("Warning!", JSON.parse(jqXHR.responseText).message, "warning");
        } else {
            swal("Error!", jqXHR.responseText, "error");
        }
        $(".bg-spin").hide();
        $(".send-rekap span").show();
        $(".send-rekap .spin").hide();
    };
    $(".skp").on("change", function () {
        var skp = $(".skp").val();
        if (skp == "angka") {
            var label = "<label>Nilai SKP </label>";
            var newDropList =
                '<input class="form-control nilai-skp" type="number" placeholder="Masukan Nilai"> </input>';
            var html = "";
            $(".jenis-skp").html("");
            html += label;
            html += newDropList;
        } else {
            var label = "<label>Nilai SKP </label>";
            var newDropList =
                '<select class="form-select nilai-skp"><option value="1">Sangat Baik</option><option value="2">Baik</option><option value="3">Kurang</option><option value="4">Butuh Perbaikan</option><option value="5">Sangat Kurang</option></select>';
            var html = "";
            $(".jenis-skp").html("");
            html += label;
            html += newDropList;
        }

        $(".jenis-skp").html(html);
    });
    $(".send-skp").on("click", function () {
        var jenis_skp = $(".skp").val();
        var nilai_skp = $(".nilai-skp").val();
        const data = {
            jenis_skp: jenis_skp,
            nilai_skp: nilai_skp,
        };
        console.log(data);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        if (jenis_skp == null) {
            swal("Error!", "Ada Data Yang Belum Di Input", "error");
        }
        if (nilai_skp == undefined) {
            swal("Error!", "Ada Data Yang Belum Di Input", "error");
        } else if (nilai_skp == "") {
            swal("Error!", "Ada Data Yang Belum Di Input", "error");
        } else if (nilai_skp != null & jenis_skp != null) {
            swal({
                title: "Apakah Data Yang Anda Masukkan Sudah Benar?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, Sudah Benar!",
                cancelButtonText: "Batal",
                reverseButtons: !0,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return new Promise(function (resolve) {
                        $.ajax({
                                type: 'POST',
                                url: url("/laporan-kegiatan/jabatan/send-skp"),
                                data: data
                            })
                            .done(function (myAjaxJsonResponse) {
                                swal("Berhasil!", myAjaxJsonResponse.message, "success")
                                    .then(function () {
                                        location.reload();
                                    });
                            })
                            .fail(function (erordata) {
                                if (erordata.status == 422) {
                                    swal('Warning!', erordata.responseJSON.message,
                                        'warning');
                                } else {
                                    swal('Error!', erordata.responseJSON.message, 'error');
                                }
                            })
                    })
                },
            })
        }
    });
    $('.simpan-golongan').click(function (e) {
        e.preventDefault();
        var postData = new FormData($(".form-golongan")[0]);
        swal({
            title: "Apakah Data Yang Anda Masukkan Sudah Benar?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Sudah Benar!",
            cancelButtonText: "Batal",
            reverseButtons: !0,
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return new Promise(function (resolve) {
                    $.ajax({
                            type: 'POST',
                            url: url('/laporan-kegiatan/jabatan/golongan-custom'),
                            processData: false,
                            contentType: false,
                            data: postData
                        })
                        .done(function (myAjaxJsonResponse) {
                            swal("Berhasil!", myAjaxJsonResponse.message, "success")
                                .then(function () {
                                    location.reload();
                                });
                        })
                        .fail(function (erordata) {
                            if (erordata.status == 422) {
                                swal('Warning!', erordata.responseJSON.message,
                                    'warning');
                            } else {
                                swal('Error!', erordata.responseJSON.message, 'error');
                            }
                        })
                })
            },
        })
    });

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
        $(".bg-spin").hide();
    };
});

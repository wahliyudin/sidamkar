$(function () {
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
    pond = FilePond.create(document.querySelector('input[name="file_import_tmp"]'), {
        acceptedFileTypes: [
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "application/vnd.ms-excel",
            "application/vnd.oasis.opendocument.spreadsheet"
        ],
        fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise

                resolve(type);
            }),
    });
    pond.setOptions({
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort, transfer,
                options) => {
                message = '';
                if (file.size / 1000 >= 2000) {
                    error('file kegedean')
                    message = "File tidak bole lebih dari 2MB";
                }
                const fileInput = document.querySelector('input[name="file_import"]');
                const myFile = new File([file], file.name, {
                    type: file.type,
                    lastModified: new Date(),
                });
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(myFile);
                fileInput.files = dataTransfer.files;
                load(file.name);
                if (message) {
                    Toastify({
                        text: message,
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "rgba(234, 58, 61, 0.9)",
                    }).showToast();
                }
            }
        },
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.btn-simpan-file-import').click(function (e) {
        e.preventDefault();
        var postData = new FormData($("#form-import")[0]);
        $('.btn-simpan-file-import span').hide();
        $('.btn-simpan-file-import .spin').show();
        $.ajax({
            type: 'POST',
            url: url("/kemendagri/cms/kegiatan-profesi/import"),
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                $('.btn-simpan-file-import span').show();
                $('.btn-simpan-file-import .spin').hide();
                if (response.status == 200) {
                    swal("Selesai!", response.message, "success").then(() => {
                        location.reload();
                    });
                } else {
                    swal("Error!", response.message, "error");
                }
            },
            error: ajaxError2
        });
    });
    $("#importExcelModal").on('hide.bs.modal', function () {
        pond.removeFiles();
    });
    $('.tambah-sub-unsur').click(function (e) {
        e.preventDefault();
        $('.container-unsur').append(`
            <div class="d-flex flex-column container-sub-unsur">
                <div class="row align-items-center justify-content-end">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Sub Unsur</label>
                            <input class="form-control w-100" type="text" name="sub_unsur[]">
                        </div>
                    </div>
                    <div class="col-md-1 d-flex align-items-center">
                        <button type="button" class="hapus-sub-unsur" style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                                class="fa-solid fa-x"></i></button>
                        <button type="button" class="ms-2 tambah-butir"
                                    style="transform: translateY(8px); color: #1ad598; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #1ad598; background-color: transparent !important;"><i
                                        class="fa-solid fa-plus"></i></button>
                    </div>
                </div>

                <div class="d-flex flex-column container-butir">

                </div>
            </div>
        `);
    });
    $('.container-unsur').on('click', '.tambah-butir', function () {
        $(this.parentElement.parentElement.parentElement.querySelector('.container-butir')).append(`
            <div class="row align-items-center justify-content-end">
                <div class="col-md-7 input-butir-kegiatan">
                    <div class="form-group">
                        <label>Butir Kegiatan</label>
                        <input class="form-control w-100" type="text" name="butir_kegiatan[]">
                    </div>
                </div>
                <div class="col-md-2 angka-kredit-butir">
                    <div class="form-group">
                        <label>Nilai Kredit</label>
                        <input class="form-control w-100" step="0.01" type="number" name="angka_kredit[]">
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="hapus-butir"
                    style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                        class="fa-solid fa-x"></i></button>
                    <button type="button" class="ms-2 tambah-sub-butir"
                                    style="transform: translateY(8px); color: #1ad598; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #1ad598; background-color: transparent !important;"><i
                                        class="fa-solid fa-plus"></i></button>
                </div>

                <div class="d-flex flex-column container-sub-butir">

                </div>
            </div>
        `);
    });
    $('.container-unsur').on('click', '.tambah-sub-butir', function () {
        if ($(this.parentElement.parentElement).find('.angka-kredit-butir')) {
            $($(this.parentElement.parentElement).find('.angka-kredit-butir')).remove();
            $($(this.parentElement.parentElement).find('.input-butir-kegiatan')).addClass(
                'col-md-9');
            $($(this.parentElement.parentElement).find('.input-butir-kegiatan')).removeClass(
                'col-md-7');
        }
        $($(this.parentElement.parentElement).find('.container-sub-butir'))
            .append(`
            <div class="row align-items-center justify-content-end sub-butir">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sub Butir Kegiatan</label>
                        <input class="form-control w-100" type="text" name="sub_butir_kegiatan[]">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Nilai Kredit</label>
                        <input class="form-control w-100" step="0.01" type="number" name="angka_kredit[]">
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="hapus-sub-butir"
                    style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                        class="fa-solid fa-x"></i></button>
                </div>
            </div>
        `);
    });
    $('.container-unsur').on('click', '.hapus-sub-butir', function (e) {
        $($('.container-unsur').find('.hapus-sub-butir')).each(function (index, element) {
            if (e.target == element || element == e.target.parentElement) {
                if ($(this.parentElement.parentElement.parentElement).children().length == 1) {
                    el = $(this.parentElement.parentElement.parentElement.parentElement).find('.input-butir-kegiatan');
                    console.log(el);
                    $(el).addClass('col-md-7');
                    $(el).removeClass('col-md-9');
                    el.after(`<div class="col-md-2 angka-kredit-butir">
                                <div class="form-group">
                                    <label>Nilai Kredit</label>
                                    <input class="form-control w-100" step="0.01" type="number" name="angka_kredit[]">
                                </div>
                            </div>`)
                }
            }
        });
        $(this.parentElement.parentElement).remove();
    });
    $('.container-unsur').on('click', '.hapus-butir', async function () {
        isDelete = false;
        await swal({
            title: "Yakin ingin menghapus unsur?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, yakin!",
            cancelButtonText: "Batal",
            reverseButtons: !0,
            showLoaderOnConfirm: true,
        }).then(function (e) {
            if (e.value == true) {
                isDelete = true;
            }
        }, function (dismiss) {
            return false;
        })
        if (isDelete == true) {
            $(this.parentElement.parentElement).remove();
        }
    });
    $('.container-unsur').on('click', '.hapus-sub-unsur', async function (parent) {
        isDelete = false;
        await swal({
            title: "Yakin ingin menghapus unsur?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, yakin!",
            cancelButtonText: "Batal",
            reverseButtons: !0,
            showLoaderOnConfirm: true,
        }).then(function (e) {
            if (e.value == true) {
                isDelete = true;
            }
        }, function (dismiss) {
            return false;
        })
        if (isDelete == true) {
            $(this.parentElement.parentElement.parentElement).remove();
        }
    });

    $('#tambahDataModal').on('click', '.simpan-kegiatan.simpan', function () {
        var role_id = $('select[name="role_id"]').val();
        var unsur = $('input[name="unsur"]').val();
        var periode_id = $('select[name="periode_id"]').val();
        result = [];
        $.each($('input[name="sub_unsur[]"]'), function (indexInArray, valueOfElement) {
            result.push({
                name: $(valueOfElement).val(),
                butir_kegiatans: mapGetButirKegiatan(this)
            })
        });
        $('.simpan-kegiatan span').hide();
        $('.simpan-kegiatan .spin').show();
        $.ajax({
            type: "POST",
            url: url("/kemendagri/cms/kegiatan-profesi"),
            data: {
                role_id: role_id,
                periode_id: periode_id,
                unsur: unsur,
                sub_unsurs: result
            },
            dataType: "json",
            success: function (response) {
                $('.simpan-kegiatan span').show();
                $('.simpan-kegiatan .spin').hide();
                if (response.status == 200) {
                    Toastify({
                        text: response.message,
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#18b882",
                    }).showToast()
                    location.reload();
                }
            },
            error: ajaxError1
        });
    });
    $(".btn-tambah").on('click', function () {
        $('.container-sub-unsur').remove();
        $('.simpan-kegiatan').addClass('simpan');
        $('.simpan-kegiatan').removeClass('update');
    });
    $('.btn-edit-kegiatan').click(function (e) {
        e.preventDefault();
        $('.simpan-kegiatan').removeClass('simpan');
        $('.simpan-kegiatan').addClass('update');
        $('.simpan-kegiatan').data('id', $(this).data('id'));
        $('#tambahDataModal .bg-spin').show();
        $('#tambahDataModal').modal('show');

        $.ajax({
            type: "GET",
            url: url('/kemendagri/cms/kegiatan-profesi/' + $(this).data('id') + '/edit'),
            success: function (response) {
                $('#tambahDataModal .bg-spin').hide();
                if (response.data.role != null) {
                    $('select[name="role_id"]')
                        .val(response.data.role.id)
                        .trigger('change');
                }
                $('input[name="unsur"]').val(response.data.nama);
                $('select[name="periode_id"]').val(response.data.periode_id);
                response.data.sub_unsurs.forEach(subUnsur => {
                    $('.container-unsur').append(htmlSubUnsur(subUnsur));
                });
            },
            error: ajaxError1
        });
    });

    $('#tambahDataModal').on('click', '.simpan-kegiatan.update', function () {
        var role_id = $('select[name="role_id"]').val();
        var unsur = $('input[name="unsur"]').val();
        var periode_id = $('select[name="periode_id"]').val();
        result = [];
        $.each($('input[name="sub_unsur[]"]'), function (indexInArray, valueOfElement) {
            result.push({
                id: $(valueOfElement).data('id'),
                name: $(valueOfElement).val(),
                butir_kegiatans: mapGetButirKegiatan(this)
            })
        });
        $('.simpan-kegiatan span').hide();
        $('.simpan-kegiatan .spin').show();
        $.ajax({
            type: "PUT",
            url: url('/kemendagri/cms/kegiatan-profesi/' + $(this).data('id') + '/update'),
            data: {
                role_id: role_id,
                periode_id: periode_id,
                unsur: unsur,
                sub_unsurs: result
            },
            dataType: "json",
            success: function (response) {
                $('.simpan-kegiatan span').show();
                $('.simpan-kegiatan .spin').hide();
                if (response.status == 200) {
                    Toastify({
                        text: response.message,
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#18b882",
                    }).showToast()
                    location.reload();
                }
            },
            error: ajaxError1
        });
    });

    $('.btn-hapus-kegiatan').click(function (e) {
        e.preventDefault();
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
                    url: url("/kemendagri/cms/kegiatan-profesi/" + $(this).data('id') + '/destroy'),
                    dataType: 'JSON'
                });
            },
        }).then(function (e) {
            if (e.value.status == 200) {
                swal("Selesai!", e.value.message, "success").then(() => {
                    location.reload();
                });
            } else {
                swal("Error!", e.value.message, "error");
            }
        }, function (dismiss) {
            return false;
        })
    });

    function mapGetButirKegiatan(subUnsur) {
        return $.map($(subUnsur.parentElement.parentElement.parentElement.parentElement).find('input[name="butir_kegiatan[]"]'), function (butirKegiatan, indexOrKey) {
            var_angka_kredit = $($(butirKegiatan.parentElement.parentElement.parentElement).find('.angka-kredit-butir input[name="angka_kredit[]"]')).val();
            if (var_angka_kredit !== undefined) {
                return {
                    id: $(butirKegiatan).data('id'),
                    name: $(butirKegiatan).val(),
                    angka_kredit: var_angka_kredit
                }
            } else {
                return {
                    id: $(butirKegiatan).data('id'),
                    name: $(butirKegiatan).val(),
                    sub_butir_kegiatans: mapGetSubButirKegiatan(butirKegiatan)
                }
            }
        })
    }

    function mapGetSubButirKegiatan(butirKegiatan) {
        return $.map($(butirKegiatan.parentElement.parentElement.parentElement).find('input[name="sub_butir_kegiatan[]"]'), function (subButirKegiatan, indexOrKey) {
            return {
                id: $(subButirKegiatan).data('id'),
                name: $(subButirKegiatan).val(),
                angka_kredit: $($(subButirKegiatan.parentElement.parentElement.parentElement).find('input[name="angka_kredit[]"]')).val()
            }
        })
    }

    function htmlSubUnsur(subUnsur) {
        return `<div class="d-flex flex-column container-sub-unsur">
            <div class="row align-items-center justify-content-end">
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Sub Unsur</label>
                        <input class="form-control w-100" data-id="${subUnsur.id}" value="${subUnsur.nama}" type="text" name="sub_unsur[]">
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="hapus-sub-unsur" style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                            class="fa-solid fa-x"></i></button>
                    <button type="button" class="ms-2 tambah-butir" style="transform: translateY(8px); color: #1ad598; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #1ad598; background-color: transparent !important;"><i
                            class="fa-solid fa-plus"></i></button>
                </div>
            </div>

            <div class="d-flex flex-column container-butir">
                ${htmlButirKegiatan(subUnsur.butir_kegiatans)}
            </div>
        </div>`
    }

    function htmlButirKegiatan(butir_kegiatans) {
        return $.map(butir_kegiatans, function (butirKegiatan, indexOrKey) {
            if (butirKegiatan.sub_butir_kegiatans.length != 0) {
                return `<div class="row align-items-center justify-content-end">
                    <div class="col-md-9 input-butir-kegiatan">
                        <div class="form-group">
                            <label>Butir Kegiatan</label>
                            <input class="form-control w-100" type="text" data-id="${butirKegiatan.id}" value="${butirKegiatan.nama}" name="butir_kegiatan[]">
                        </div>
                    </div>
                    <div class="col-md-1 d-flex">
                        <button type="button" class="hapus-butir"
                            style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                                class="fa-solid fa-x"></i></button>
                        <button type="button" class="ms-2 tambah-sub-butir" style="transform: translateY(8px); color: #1ad598; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #1ad598; background-color: transparent !important;"><i
                            class="fa-solid fa-plus"></i></button>
                    </div>

                    <div class="d-flex flex-column container-sub-butir">
                        ${htmlSubButirKegiatan(butirKegiatan.sub_butir_kegiatans)}
                    </div>
                </div>`
            }
            return `<div class="row align-items-center justify-content-end">
                <div class="col-md-7 input-butir-kegiatan">
                    <div class="form-group">
                        <label>Butir Kegiatan</label>
                        <input class="form-control w-100" type="text" data-id="${butirKegiatan.id}" value="${butirKegiatan.nama}" name="butir_kegiatan[]">
                    </div>
                </div>
                <div class="col-md-2 angka-kredit-butir">
                    <div class="form-group">
                        <label>Nilai Kredit</label>
                        <input class="form-control w-100" step="0.01" value="${butirKegiatan.score}" type="number" name="angka_kredit[]">
                    </div>
                </div>
                <div class="col-md-1 d-flex">
                    <button type="button" class="hapus-butir"
                        style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                            class="fa-solid fa-x"></i></button>
                    <button type="button" class="ms-2 tambah-sub-butir" style="transform: translateY(8px); color: #1ad598; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #1ad598; background-color: transparent !important;"><i
                            class="fa-solid fa-plus"></i></button>
                </div>

                <div class="d-flex flex-column container-sub-butir">

                </div>
            </div>`
        }).join('')
    }

    function htmlSubButirKegiatan(sub_butir_kegiatans) {
        return $.map(sub_butir_kegiatans, function (subButirKegiatan, indexOrKey) {
            return `<div class="row align-items-center justify-content-end sub-butir">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sub Butir Kegiatan</label>
                        <input class="form-control w-100" data-id="${subButirKegiatan.id}" value="${subButirKegiatan.nama}" type="text" name="sub_butir_kegiatan[]">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Nilai Kredit</label>
                        <input class="form-control w-100" step="0.01" value="${subButirKegiatan.score}" type="number" name="angka_kredit[]">
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="hapus-sub-butir"
                    style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                        class="fa-solid fa-x"></i></button>
                </div>
            </div>`
        }).join('')
    }

    $("#tambahDataModal").on('hide.bs.modal', function () {
        $('input[name="unsur"]').val('');
        $('.container-sub-unsur').remove();
        $('select[name="role_id"]').prop('selectedIndex', 0);
    });
});

var ajaxError1 = function (jqXHR, xhr, textStatus, errorThrow, exception) {
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
var ajaxError2 = function (jqXHR, xhr, textStatus, errorThrow, exception) {
    if (jqXHR.status === 0) {
        swal("Error!", 'Not connect.\n Verify Network.', "error");
        $('.btn-simpan-file-import span').show();
        $('.btn-simpan-file-import .spin').hide();
    } else if (jqXHR.status == 400) {
        swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
        $('.btn-simpan-file-import span').show();
        $('.btn-simpan-file-import .spin').hide();
    } else if (jqXHR.status == 404) {
        swal('Error!', 'Requested page not found. [404]', "error");
        $('.btn-simpan-file-import span').show();
        $('.btn-simpan-file-import .spin').hide();
    } else if (jqXHR.status == 500) {
        swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
        $('.btn-simpan-file-import span').show();
        $('.btn-simpan-file-import .spin').hide();
    } else if (exception === 'parsererror') {
        swal('Error!', 'Requested JSON parse failed.', "error");
        $('.btn-simpan-file-import span').show();
        $('.btn-simpan-file-import .spin').hide();
    } else if (exception === 'timeout') {
        swal('Error!', 'Time out error.', "error");
        $('.btn-simpan-file-import span').show();
        $('.btn-simpan-file-import .spin').hide();
    } else if (exception === 'abort') {
        swal('Error!', 'Ajax request aborted.', "error");
        $('.btn-simpan-file-import span').show();
        $('.btn-simpan-file-import .spin').hide();
    } else if (jqXHR.status == 422) {
        swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
        $('.btn-simpan-file-import span').show();
        $('.btn-simpan-file-import .spin').hide();
    } else {
        swal('Error!', jqXHR.responseText, "error");
        $('.btn-simpan-file-import span').show();
        $('.btn-simpan-file-import .spin').hide();
    }
};

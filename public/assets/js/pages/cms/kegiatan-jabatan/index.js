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
            url: url("/kemendagri/cms/kegiatan-jabatan/import"),
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
            error: ajaxError
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
            <div class="row align-items-start justify-content-end">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Butir Kegiatan</label>
                        <textarea name="butir_kegiatan[]" class="form-control w-100" rows="1"></textarea>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Satuan Hasil</label>
                        <textarea name="satuan_hasil[]" class="form-control w-100" rows="1"></textarea>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Nilai Kredit</label>
                        <input class="form-control w-100" step="0.01" type="number" name="angka_kredit[]">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Pelaksana Jabatan</label>
                        <select class="form-select" name="role_id[]">
                            <option value="">Semua Jenjang</option>
                            <option value="1">Damkar Pemula</option>
                            <option value="2">Damkar Terampil</option>
                            <option value="3">Damkar Mahir</option>
                            <option value="4">Damkar Penyelia</option>
                            <option value="5">Analis Kebakaran Ahli Pertama</option>
                            <option value="6">Analis Kebakaran Ahli Muda</option>
                            <option value="7">Analis Kebakaran Ahli Madya</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1 d-flex align-self-center">
                    <button class="hapus-butir"
                        style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                            class="fa-solid fa-x"></i></button>
                </div>
            </div>
        `);
    });
    $('.container-unsur').on('click', '.hapus-butir', function () {
        $(this.parentElement.parentElement).remove();
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
        result = [];
        $.each($('input[name="sub_unsur[]"]'), function (indexInArray, valueOfElement) {
            result.push({
                name: $(valueOfElement).val(),
                butir_kegiatans: $.map($(this.parentElement.parentElement.parentElement.parentElement).find('textarea[name="butir_kegiatan[]"]'), function (elementOrValue, indexOrKey) {
                    return {
                        name: $(elementOrValue).val(),
                        satuan_hasil: $($(elementOrValue.parentElement.parentElement.parentElement).find('textarea[name="satuan_hasil[]"]')).val(),
                        angka_kredit: $($(elementOrValue.parentElement.parentElement.parentElement).find('input[name="angka_kredit[]"]')).val(),
                        role_id: $($(elementOrValue.parentElement.parentElement.parentElement).find('select[name="role_id[]"]')).val()
                    }
                })
            })
        });
        $('.simpan-kegiatan span').hide();
        $('.simpan-kegiatan .spin').show();
        $.ajax({
            type: "POST",
            url: url("/kemendagri/cms/kegiatan-jabatan"),
            data: {
                role_id: role_id,
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
                } else {
                    swal('Error!', response.message, "error");
                }
            },
            error: ajaxError
        });
    });
    $('#accordion-parent').on('click', '.btn-hapus-kegiatan', function (e) {
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
                    url: url('/kemendagri/cms/kegiatan-jabatan/' + $(this).data('id') + '/destroy'),
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

    $(".btn-tambah").on('click', function () {
        $('.container-sub-unsur').remove();
        $('.simpan-kegiatan').addClass('simpan');
        $('.simpan-kegiatan').removeClass('update');
    });

    $('#accordion-parent').on('click', '.btn-edit-kegiatan', function (e) {
        e.preventDefault();
        $('.simpan-kegiatan').removeClass('simpan');
        $('.simpan-kegiatan').addClass('update');
        $('.simpan-kegiatan').data('id', $(this).data('id'));
        $('#tambahDataModal .bg-spin').show();
        $('#tambahDataModal').modal('show');

        $.ajax({
            type: "GET",
            url: url('/kemendagri/cms/kegiatan-jabatan/' + $(this).data('id') + '/edit'),
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
                    $('.container-unsur').append(funSubUnsur(subUnsur));
                });
            },
            error: ajaxError
        });
    });

    function funSubUnsur(subUnsur) {
        return `<div class="d-flex flex-column container-sub-unsur">
            <div class="row align-items-center justify-content-end">
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Sub Unsur</label>
                        <input class="form-control w-100" type="text" data-id="${subUnsur.id}" value="${subUnsur.nama}" name="sub_unsur[]">
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
                ${funButirKegiatan(subUnsur.butir_kegiatans)}
            </div>
        </div>`
    }

    function funButirKegiatan(butir_kegiatans) {
        return $.map(butir_kegiatans, function (butirKegiatan, indexOrKey) {
            return `
            <div class="row align-items-start justify-content-end">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Butir Kegiatan</label>
                        <textarea name="butir_kegiatan[]" data-id="${butirKegiatan.id}" class="form-control w-100" rows="1">${butirKegiatan.nama}</textarea>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Satuan Hasil</label>
                        <textarea name="satuan_hasil[]" class="form-control w-100" rows="1">${butirKegiatan.satuan_hasil}</textarea>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Nilai Kredit</label>
                        <input class="form-control w-100" step="0.01" value="${butirKegiatan.score}" type="number" name="angka_kredit[]">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Pelaksana Jabatan</label>
                        <select class="form-select" name="role_id[]">
                            <option value="">Semua Jenjang</option>
                            <option ${butirKegiatan.role_id == 1 ? 'selected' : ''} value="1">Damkar Pemula</option>
                            <option ${butirKegiatan.role_id == 2 ? 'selected' : ''} value="2">Damkar Terampil</option>
                            <option ${butirKegiatan.role_id == 3 ? 'selected' : ''} value="3">Damkar Mahir</option>
                            <option ${butirKegiatan.role_id == 4 ? 'selected' : ''} value="4">Damkar Penyelia</option>
                            <option ${butirKegiatan.role_id == 5 ? 'selected' : ''} value="5">Analis Kebakaran Ahli Pertama</option>
                            <option ${butirKegiatan.role_id == 6 ? 'selected' : ''} value="6">Analis Kebakaran Ahli Muda</option>
                            <option ${butirKegiatan.role_id == 7 ? 'selected' : ''} value="7">Analis Kebakaran Ahli Madya</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1 d-flex align-self-center">
                    <button class="hapus-butir"
                        style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                            class="fa-solid fa-x"></i></button>
                </div>
            </div>
            `
        }).join('')
    }

    $('#tambahDataModal').on('click', '.simpan-kegiatan.update', function () {
        var role_id = $('select[name="role_id"]').val();
        var unsur = $('input[name="unsur"]').val();
        result = [];
        $.each($('input[name="sub_unsur[]"]'), function (indexInArray, valueOfElement) {
            result.push({
                id: $(valueOfElement).data('id'),
                name: $(valueOfElement).val(),
                butir_kegiatans: $.map($(this.parentElement.parentElement.parentElement.parentElement).find('textarea[name="butir_kegiatan[]"]'), function (elementOrValue, indexOrKey) {
                    return {
                        id: $(elementOrValue).data('id'),
                        name: $(elementOrValue).val(),
                        satuan_hasil: $($(elementOrValue.parentElement.parentElement.parentElement).find('textarea[name="satuan_hasil[]"]')).val(),
                        angka_kredit: $($(elementOrValue.parentElement.parentElement.parentElement).find('input[name="angka_kredit[]"]')).val(),
                        role_id: $($(elementOrValue.parentElement.parentElement.parentElement).find('select[name="role_id[]"]')).val()
                    }
                })
            })
        });
        $('.simpan-kegiatan span').hide();
        $('.simpan-kegiatan .spin').show();
        $.ajax({
            type: "PUT",
            url: url('/kemendagri/cms/kegiatan-jabatan/' + $(this).data('id') + '/update'),
            data: {
                role_id: role_id,
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
            error: ajaxError
        });
    });

    $("#tambahDataModal").on('hide.bs.modal', function () {
        $('input[name="unsur"]').val('');
        $('.container-sub-unsur').remove();
        $('select[name="role_id"]').prop('selectedIndex', 0);
    });
});

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
var ajaxError = function (jqXHR, xhr, textStatus, errorThrow, exception) {
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

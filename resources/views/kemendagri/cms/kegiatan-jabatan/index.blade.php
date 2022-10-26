@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-green-reverse" data-bs-toggle="modal" data-bs-target="#importExcelModal"><i
                                class="fa-solid fa-cloud-arrow-up me-2"></i>Import
                            Excel</button>
                        <button class="btn btn-blue-reverse ms-3" data-bs-toggle="modal" data-bs-target="#tambahDataModal"><i
                                class="fa-solid fa-file-circle-plus me-2"></i>Tambah
                            Data</button>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="card-body accordion-container">
                        <div class="accordion" id="accordion-parent">
                            @foreach ($kegiatan->unsurs as $unsur)
                                <div class="accordion-item">
                                    <div class="d-flex justify-content-between accordion-header py-3 px-2"
                                        id="unsur{{ $unsur->id }}">
                                        <div class="d-flex align-items-center justify-content-between w-100"
                                            style="color: #000000;">
                                            <p class="accordion-title">
                                                [ Pelaksana: {{ $unsur->role->display_name }} ] {{ $unsur->nama }}
                                            </p>
                                            <div class="d-flex align-items-center">
                                                <i
                                                    class="fa-regular fa-pen-to-square me-2 cursor-pointer text-green btn-edit-kegiatan"></i>
                                                <i class="fa-solid fa-trash-can me-2 cursor-pointer text-red btn-hapus-kegiatan"
                                                    data-id="{{ $unsur->id }}"></i>
                                            </div>
                                        </div>
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#contentUnsur{{ $unsur->id }}" aria-expanded="false"
                                            aria-controls="contentUnsur{{ $unsur->id }}">
                                        </button>
                                    </div>
                                    <div id="contentUnsur{{ $unsur->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="unsur{{ $unsur->id }}" style="">
                                        <div class="accordion-body">
                                            <div class="accordion" id="accordion-child">
                                                @foreach ($unsur->subUnsurs as $sub_unsur)
                                                    <div class="accordion-item">
                                                        <div class="d-flex justify-content-between accordion-header py-1 px-2"
                                                            id="subUnsur{{ $sub_unsur->id }}">
                                                            <div class="d-flex align-items-center" style="color: #000000;">
                                                                <h6 class="accordian-title">
                                                                    {{ $sub_unsur->nama }}
                                                                </h6>
                                                            </div>
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#contentchildSubUnsur{{ $sub_unsur->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="contentchildSubUnsur{{ $sub_unsur->id }}">
                                                            </button>
                                                        </div>
                                                        <div id="contentchildSubUnsur{{ $sub_unsur->id }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="subUnsur{{ $sub_unsur->id }}" style="">
                                                            <div class="accordion-body">
                                                                <ul class="ms-0">
                                                                    @foreach ($sub_unsur->butirKegiatans as $butir_kegiatan)
                                                                        <li class="accordian-list">
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between">
                                                                                <h6 class="accordian-title">
                                                                                    {{ $butir_kegiatan->nama }}
                                                                                </h6>
                                                                                <h6 class="accordian-title"
                                                                                    style="color: #1AD598;">
                                                                                    {{ $butir_kegiatan->score }}
                                                                                </h6>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalTitle">
                        Tambah Unsur Kegiatan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pelaksana Jabatan</label>
                                    <select class="choices form-select" name="role_id">
                                        <option disabled selected>Pilih Jabatan</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Unsur Kegiatan</label>
                                    <input class="form-control" type="text" name="unsur">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-blue btn-sm ps-3 py-2 tambah-sub-unsur"
                                    style="transform: translateY(7px)"><i class="fa-solid fa-plus me-2"></i> Sub
                                    Unsur</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button class="btn btn-green ml-1 simpan-kegiatan">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="importExcelModal" tabindex="-1" role="dialog" aria-labelledby="importExcelModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importExcelModalTitle">
                        Import Kegiatan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-import" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>File (.xlsx)</label>
                            <input type="file" name="file_import_tmp" required />
                            <input type="file" name="file_import" style="display: none;" required />
                        </div>
                        <div class="form-group d-flex flex-column align-items-start">
                            <label>Download Template</label>
                            <a href="{{ route('kemendagri.cms.kegiatan-jabatan.download') }}"
                                class="btn btn-blue btn-sm px-3"><i class="fa-solid fa-download me-2"></i>Download</a>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button class="btn btn-green ml-1 btn-simpan-file-import">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/kemendagri.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        $(function() {
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
            $('.btn-simpan-file-import').click(function(e) {
                e.preventDefault();
                if (!$('#form-import input[name="file_import_tmp"]').val()) {
                    Toastify({
                        text: "File harus diisi!",
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#EA3A3D",
                    }).showToast();
                } else {
                    var postData = new FormData($("#form-import")[0]);
                    $('.btn-simpan-file-import span').hide();
                    $('.btn-simpan-file-import .spin').show();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('kemendagri.cms.kegiatan-jabatan.import') }}",
                        processData: false,
                        contentType: false,
                        data: postData,
                        success: function(response) {
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
                        error: function(err) {
                            $('.btn-simpan-file-import span').show();
                            $('.btn-simpan-file-import .spin').hide();
                        }
                    });
                }
            });
            $("#importExcelModal").on('hide.bs.modal', function() {
                pond.removeFiles();
            });
            $('.tambah-sub-unsur').click(function(e) {
                e.preventDefault();
                $('.container-unsur').append(`
                    <div class="d-flex flex-column container-sub-unsur">
                        <div class="row align-items-center justify-content-end">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Sub Unsur</label>
                                    <input class="form-control w-100" type="text" name="sub_unsur[]">
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <button type="button" class="hapus-sub-unsur" style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                                        class="fa-solid fa-minus"></i></button>
                                <button type="button" class="btn btn-blue btn-sm ps-3 py-2 ms-2 tambah-butir"
                                    style="transform: translateY(7px)"><i class="fa-solid fa-plus me-2"></i>
                                    Butir</button>
                            </div>
                        </div>

                        <div class="d-flex flex-column container-butir">

                        </div>
                    </div>
                `);
            });
            $('.container-unsur').on('click', '.tambah-butir', function() {
                $(this.parentElement.parentElement.parentElement.querySelector('.container-butir')).append(`
                    <div class="row align-items-center justify-content-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Butir Kegiatan</label>
                                <input class="form-control w-100" type="text" name="butir_kegiatan[]">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Nilai Kredit</label>
                                <input class="form-control w-100" step="0.01" type="number" name="angka_kredit[]">
                            </div>
                        </div>
                        <div class="col-md-2 d-flex">
                            {{-- <button
                                    style="transform: translateY(8px); color: #139A6E; background-color: transparent; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #139A6E;"><i
                                        class="fa-solid fa-plus"></i></button> --}}
                            <button class="hapus-butir"
                                style="transform: translateY(8px); color: #EA3A3D; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #EA3A3D; background-color: transparent !important;"><i
                                    class="fa-solid fa-minus"></i></button>
                        </div>
                    </div>
                `);
            });
            $('.container-unsur').on('click', '.hapus-butir', function() {
                $(this.parentElement.parentElement).remove();
            });
            $('.container-unsur').on('click', '.hapus-sub-unsur', async function(parent) {
                isDelete = false;
                await swal({
                    title: "Yakin ingin menghapus unsur?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, yakin!",
                    cancelButtonText: "Batal",
                    reverseButtons: !0,
                    showLoaderOnConfirm: true,
                }).then(function(e) {
                    if (e.value == true) {
                        isDelete = true;
                    }
                }, function(dismiss) {
                    return false;
                })
                if (isDelete == true) {
                    $(this.parentElement.parentElement.parentElement).remove();
                }
            });
            $('.simpan-kegiatan').click(function(e) {
                e.preventDefault();
                var role_id = $('select[name="role_id"]').val();
                var unsur = $('input[name="unsur"]').val();
                result = [];
                $.each($('input[name="sub_unsur[]"]'), function(indexInArray, valueOfElement) {
                    result.push({
                        name: $(valueOfElement).val(),
                        butir_kegiatans: $($(this.parentElement.parentElement.parentElement
                            .parentElement).find(
                            'input[name="butir_kegiatan[]"]')).map(
                            function(idx2, elem2) {
                                return $(elem2).val();
                            }).get(),
                        angka_kredits: $($(this.parentElement.parentElement.parentElement
                            .parentElement).find(
                            'input[name="angka_kredit[]"]')).map(
                            function(idx2, elem2) {
                                return $(elem2).val();
                            }).get()
                    })
                });
                $('.simpan-kegiatan span').hide();
                $('.simpan-kegiatan .spin').show();
                $.ajax({
                    type: "POST",
                    url: "{{ route('kemendagri.cms.kegiatan-jabatan.store') }}",
                    data: {
                        role_id: role_id,
                        unsur: unsur,
                        sub_unsurs: result
                    },
                    dataType: "json",
                    success: function(response) {
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
                    error: function(err) {
                        $('.simpan-kegiatan span').show();
                        $('.simpan-kegiatan .spin').hide();
                    }
                });
            });
            $('.btn-hapus-kegiatan').click(function(e) {
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
                            url: "{{ url('kemendagri/cms/kegiatan-jabatan') }}/" + $(
                                this).data('id') + '/destroy',
                            dataType: 'JSON'
                        });
                    },
                }).then(function(e) {
                    if (e.value.status == 200) {
                        swal("Selesai!", e.value.message, "success").then(() => {
                            location.reload();
                        });
                    } else {
                        swal("Error!", e.value.message, "error");
                    }
                }, function(dismiss) {
                    return false;
                })
            });
        });
    </script>
@endsection

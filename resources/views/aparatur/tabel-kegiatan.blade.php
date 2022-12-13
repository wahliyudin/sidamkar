@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit Minimal
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">100</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit diterima
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">100</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green">
                                <i class="fa-solid
                                fa-stopwatch"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Periode
                                </p>
                                <h2 style="font-family: 'Roboto'; font-size: 20px; color: #06152B;" class="target">Januari
                                    2022 - Juli 2022</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="border-bottom row justify-content-between align-items-center pb-4 wrapper-head">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label>Search</label>
                                    <input type="text" placeholder="Search..." class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-12 d-flex justify-content-end">
                                <a class="px-4 py-2 btn-laporan" href="{{ route('laporan-jabatan') }}">
                                    <svg width="23" height="18" viewBox="0 0 23 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.5 0.0100098H2.5C1.4 0.0100098 0.5 0.91001 0.5 2.01001V6.00001H2.5V1.99001H20.5V16.02H2.5V12H0.5V16.01C0.5 17.11 1.4 17.99 2.5 17.99H20.5C21.6 17.99 22.5 17.11 22.5 16.01V2.01001C22.5 0.90001 21.6 0.0100098 20.5 0.0100098ZM10.5 13L14.5 9.00001L10.5 5.00001V8.00001H0.5V10H10.5V13ZM20.5 0.0100098H2.5C1.4 0.0100098 0.5 0.91001 0.5 2.01001V6.00001H2.5V1.99001H20.5V16.02H2.5V12H0.5V16.01C0.5 17.11 1.4 17.99 2.5 17.99H20.5C21.6 17.99 22.5 17.11 22.5 16.01V2.01001C22.5 0.90001 21.6 0.0100098 20.5 0.0100098ZM10.5 13L14.5 9.00001L10.5 5.00001V8.00001H0.5V10H10.5V13Z"
                                            fill="white" />
                                    </svg>
                                    <p>Buat laporan</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 overflow-auto">
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

                                            </div>
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#contentUnsur{{ $unsur->id }}"
                                                aria-expanded="false" aria-controls="contentUnsur{{ $unsur->id }}">
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
                                                                <div class="d-flex align-items-center"
                                                                    style="color: #000000;">
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
                                                                aria-labelledby="subUnsur{{ $sub_unsur->id }}"
                                                                style="">
                                                                <div class="accordion-body">
                                                                    <ul class="ms-0">
                                                                        @foreach ($sub_unsur->butirKegiatans as $butir_kegiatan)
                                                                            <li class="accordian-list">
                                                                                <div
                                                                                    class="d-flex align-items-center justify-content-between">
                                                                                    <h6 class="accordian-title">
                                                                                        {{ $butir_kegiatan->nama }}
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
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style>
        li::marker {
            font-size: 25px !important;
            color: black;
        }

        h5 {
            font-family: 'Roboto';
            font-weight: 600;
        }

        h6 {
            font-family: 'Roboto';
            color: #809FB8 !important;
        }

        a.btn-laporan {
            background-color: #219653;
            border: none;
            border-radius: 50px;
            padding: .5rem 1.7rem;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        a.btn-laporan p {
            margin: 0 0 0 .6rem;
            font-family: 'Roboto';
            font-weight: 600;
        }

        .badge-collapse {
            background-color: #1AD598;
            padding: 0 6px;
            border-radius: 8px;
            color: #F2F2F2;
        }

        @media screen and (max-width: 750px) {
            .wrapper-head {
                flex-direction: column-reverse;
            }
        }
    </style>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
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

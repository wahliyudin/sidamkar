@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end flex-wrap wrapper-btn">
                        <button class="btn btn-green-reverse" data-bs-toggle="modal" data-bs-target="#importExcelModal"><i
                                class="fa-solid fa-cloud-arrow-up me-2"></i>Import
                            Excel</button>
                        <button class="btn btn-blue-reverse ms-3 btn-tambah" data-bs-toggle="modal"
                            data-bs-target="#tambahDataModal"><i class="fa-solid fa-file-circle-plus me-2"></i>Tambah
                            Data</button>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="card-body accordion-container">
                        <div class="accordion" id="accordion-parent">
                            @foreach ($kegiatan->unsurs as $unsur)
                                <div class="accordion-item">
                                    <div class="d-flex flex-column accordion-header py-3 px-2"
                                        id="unsur{{ $unsur->id }}">
                                        <div class="d-flex justify-content-between align-items-center ps-2 mb-1">
                                            <span
                                                class="bg-green text-sm text-white font-bold py-1 px-2 rounded-md label-role">
                                                {{ $unsur->role?->display_name }}
                                            </span>
                                            <div class="d-flex align-items-center">
                                                <i class="fa-regular fa-pen-to-square me-2 cursor-pointer text-green btn-edit-kegiatan"
                                                    data-id="{{ $unsur->id }}"></i>
                                                <i class="fa-solid fa-trash-can me-2 cursor-pointer text-red btn-hapus-kegiatan"
                                                    data-id="{{ $unsur->id }}"></i>
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#contentUnsur{{ $unsur->id }}" aria-expanded="false"
                                                    aria-controls="contentUnsur{{ $unsur->id }}">
                                                </button>
                                            </div>
                                        </div>
                                        <div class="ps-2 pt-2">
                                            <h6 class="accordian-title" style="color: #000000;">{{ $unsur->nama }}</h6>
                                        </div>
                                    </div>
                                    <div id="contentUnsur{{ $unsur->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="unsur{{ $unsur->id }}" style="">
                                        <div class="accordion-body pt-0">
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
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content relative">
                <div class="bg-spin" style="display: none;">
                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                        style="height: 3rem; object-fit: cover;" alt="" srcset="">
                </div>
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
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pelaksana Jabatan</label>
                                    <select class="form-select" name="role_id">
                                        <option disabled selected>Semua Jenjang</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Periode</label>
                                    <select class="form-select" name="periode_id">
                                        <option disabled selected>- Pilih Periode -</option>
                                        @foreach ($periodes as $periode)
                                            <option value="{{ $periode->id }}">
                                                {{ $periode->concat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label>Unsur Kegiatan</label>
                                    <input class="form-control" type="text" name="unsur">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="tambah-sub-unsur"
                                    style="transform: translateY(8px); color: #1ad598; display: flex; height: 2rem; width: 2rem; justify-content: center; align-items:center; border-radius: 100%; border: 2px solid #1ad598; background-color: transparent !important;"><i
                                        class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button class="btn btn-green ml-1 simpan-kegiatan simpan">
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
                            <label>Periode</label>
                            <select class="form-select" name="periode_id">
                                <option disabled selected>- Pilih Periode -</option>
                                @foreach ($periodes as $periode)
                                    <option value="{{ $periode->id }}">
                                        {{ $periode->concat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
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
    <script src="{{ asset('assets/js/pages/cms/kegiatan-jabatan/index.js') }}"></script>
@endsection

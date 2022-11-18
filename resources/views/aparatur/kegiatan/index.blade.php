@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 85px;">
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
                    <div class="card-body py-3 px-3" style="height: 85px;">
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
                    <div class="card-body py-3 px-3" style="height: 85px;">
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
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Kegiatan Jabatan</h3>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button class="btn btn-green text-sm ps-3" data-bs-toggle="modal" data-bs-target="#tambahRencana"><i
                                class="fa-solid fa-clipboard-list me-1"></i> Tambah
                            Rencana</button>
                        <div class="form-group col-md-4">
                            <label>Search</label>
                            <input type="text" placeholder="Search..." name="search" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-body px-2">
                    <div class="d-flex flex-column rencana-container">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahRencana" tabindex="-1" role="dialog" aria-labelledby="tambahRencanaTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Rencana Kinerja</h5>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column form-kegiatan">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Rencana Kinerja</label>
                                <textarea id="" class="form-control" name="rencana"></textarea>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 simpan-rencana">
                                <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                    style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                                <span>Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editRencana" tabindex="-1" role="dialog" aria-labelledby="editRencanaTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Rencana Kinerja</h5>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column form-kegiatan">
                        <input type="hidden" name="__rencana">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Rencana Kinerja</label>
                                <textarea id="" class="form-control" name="rencana"></textarea>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 update-rencana">
                                <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                    style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                                <span>Simpan</span>
                            </button>
                        </div>
                    </form>
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
    <style>
        .rencana-item {
            border: 1px solid rgba(0, 0, 0, 0.125);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .rencana-item:not(:first-child) {
            margin-top: 1rem;
        }

        .rencana-item p {
            margin: 0 !important;
            max-width: 90%;
        }

        .rencana-item .rencana-buttons {
            display: flex;
            align-items: center;
        }

        .rencana-buttons .rencana-button:first-child {
            padding: .5rem .5rem !important;
        }

        .rencana-buttons .rencana-button {
            border: 1px solid rgba(0, 0, 0, 0.125) !important;
            border-radius: 50%;
            padding: .5rem .6rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .rencana-buttons .rencana-button:hover {
            border: 1px solid rgba(0, 0, 0, 0.322) !important;
        }

        @media screen and (max-width:750px) {
            .rencana-item {
                flex-direction: column;
                padding: .5rem .5rem;
            }

            .rencana-item p {
                width: 100%;
            }

            .rencana-item .rencana-buttons {
                justify-content: end;
                margin-top: 1rem;
                width: 100%;
            }
        }
    </style>
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
    <script src="{{ asset('assets/js/pages/aparatur/kegiatan/kegiatan-jabatan.js') }}"></script>
@endsection

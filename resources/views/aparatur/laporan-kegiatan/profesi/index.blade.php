@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col-md-5 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fafa fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    AK Profesi & Penunjang Terverifikasi
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">{{ $ak_diterima }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card overflow-auto">
                <div class="card-header pb-0">
                    <div class="row align-items-center justify-content-start">
                        <div class="col-md-4">
                            <h3>Kegiatan Profesi</h3>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row align-items-center justify-content-end">
                    <div class="form-group col-md-4">
                        <label>Search</label>
                        <input type="text" name="search" placeholder="Search..." class="form-control">
                    </div>
                </div>
                <div class="card-body px-0 accordion-container">
                    <div class="accordion unsur-container overflow-auto" id="accordion-parent">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rekap" tabindex="-1" role="dialog" aria-labelledby="rekapTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content relative">
                <div class="bg-spin" style="display: none; z-index: 99;">
                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                        style="height: 3rem; object-fit: cover;" alt="" srcset="">
                </div>
                <div class="modal-header">
                    <h5 class="text-red uppercase">Surat Pernyataan Melakukan Kegiatan</h5>
                </div>
                <div class="modal-body">
                    <iframe class="review-rekap" src="" width="100%" height="450px"></iframe>
                    <div class="text-center mt-4">
                        <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-blue px-5 send-rekap">
                            <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                            <span>Kirim</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/kemendagri.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/kegiatan.css') }}">
    <style>
        .link-butir:hover {
            text-decoration: underline;
        }

        .bg-spin {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #00000056;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media screen and (max-width: 433px) {
            .btn-rekap {
                margin-top: 10px;
            }
        }

        @media screen and (max-width: 340px) {
            .send-rekap {
                margin-top: 10px;
            }

            .send-skp {
                margin-top: 10px;
            }
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script src="{{ asset('assets/extensions/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.js') }}">
    </script>
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/aparatur/kegiatan/profesi/index.js') }}"></script>
@endsection

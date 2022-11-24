@extends('layouts.master')

@section('content')
    <div class="section">
        <input type="hidden" name="user" value="{{ $user->id }}">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3>Kegiatan Jabatan {{ $user->userAparatur->nama }}</h3>
                    </div>
                    <hr>
                    <div class="row align-items-center justify-content-between">
                        <div class="form-group col-md-2">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="{{ now()->format('Y-m-d') }}"
                                max="{{ Carbon\Carbon::make($periode->akhir)->format('Y-m-d') }}"
                                min="{{ Carbon\Carbon::make($periode->awal)->format('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Search</label>
                            <input type="text" name="search" placeholder="Search..." class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 rencana-container">

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="revisi" tabindex="-1" role="dialog" aria-labelledby="revisiTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h3 class="modal-title" style="color: red;" id="revisiTitle">
                        <i class="fa-solid fa-book fa-2xl"></i>CATATAN REVISI
                    </h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <h6>Tuliskan Catatan</h6>
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>
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
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/timeline.css') }}">
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
    <script src="{{ asset('assets/js/pages/atasan-langsung/pengajuan-kegiatan/jabatan.js') }}"></script>
    <script src="{{ asset('assets/js/pages/aparatur/laporan-kegiatan/simplebar.js') }}"></script>
@endsection

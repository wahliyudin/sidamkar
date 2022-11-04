@extends('layouts.master')

@section('content')
    <div class="section">
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
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Kegiatan Jabatan</h3>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button class="btn btn-green" data-bs-toggle="modal" data-bs-target="#tambahRencana">Tambah
                            Rencana</button>
                        <div class="form-group col-md-4">
                            <label>Search</label>
                            <input type="text" placeholder="Search..." name="search" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-body px-2 rencana-container">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahRencana" tabindex="-1" role="dialog" aria-labelledby="tambahRencanaTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Rencana Kinerja</h5>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column form-kegiatan">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Rencana Kinerja</label>
                                <input class="form-control" type="text" name="rencana">
                            </div>
                        </div>
                        <div class="card-body accordion-container">
                            <div class="accordion" id="accordion-parent">
                                @foreach ($unsurs as $unsur)
                                    @if ($unsur->isSubUnsur)
                                        <div class="accordion-item">
                                            <div class="d-flex justify-content-between accordion-header py-3 px-2"
                                                id="unsur{{ $unsur->id }}">
                                                <div class="d-flex align-items-center justify-content-between w-100"
                                                    style="color: #000000;">
                                                    <p class="accordion-title">
                                                        {{ $unsur->nama }}
                                                    </p>
                                                </div>
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
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
                                                                <div class="d-flex justify-content-between accordion-header py-1 px-1"
                                                                    id="subUnsur{{ $sub_unsur->id }}">
                                                                    <label class="d-flex align-items-center"
                                                                        style="color: #000000; cursor: pointer;">
                                                                        <input type="checkbox"
                                                                            style="margin-top: 0 !important;"
                                                                            class="form-check-input"
                                                                            data-unsurid="{{ $unsur->id }}"
                                                                            value="{{ $sub_unsur->id }}" name="sub_unsurs[]"
                                                                            id="">
                                                                        <h6 class="accordian-title ms-1"
                                                                            style="margin-bottom: 0 !important; user-select: none;">
                                                                            {{ $sub_unsur->nama }}
                                                                        </h6>
                                                                    </label>
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
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
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
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
    <script src="{{ asset('assets/js/pages/aparatur/kegiatan/kegiatan-jabatan.js') }}"></script>
@endsection
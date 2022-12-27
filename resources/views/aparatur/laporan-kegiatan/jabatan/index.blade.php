@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fafa fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    AK Jabatan Terverifikasi
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">{{ $ak_jabatan }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card overflow-auto">
                <div class="card-header pb-0">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-4">
                            <h3>Kegiatan Jabatan</h3>
                        </div>
                        <div class="col-md-8 text-end">
                            <button data-bs-toggle="modal" data-bs-target="#golonganCustom"
                                class="btn btn-red btn-sm ps-3 pe-3 py-2 ">
                                <i class="fa-solid fa-file-lines"></i>
                                Input Golongan
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#skp"
                                class="btn btn-warning btn-sm ps-3 pe-3 py-2 ">
                                <i class="fa-solid fa-file-lines"></i>
                                Input SKP
                            </button>
                            @if ($user->rekapitulasiKegiatan?->is_send == true)
                                <button data-bs-toggle="modal" data-bs-target="#historyRekap"
                                    class="btn btn-blue btn-sm ps-3 pe-3 py-2 btn-rekap">
                                    History Laporan
                                </button>
                            @else
                                <button data-bs-toggle="modal" data-bs-target="#rekap"
                                    class="btn btn-green btn-sm ps-3 pe-3 py-2 rekap btn-rekap">
                                    <i class="fa-solid fa-paper-plane me-1"></i>
                                    Ajukan Laporan
                                </button>
                            @endif
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
    <div class="modal fade" id="skp" tabindex="-1" role="dialog" aria-labelledby="skpTitle" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content relative">
                <div class="modal-header">
                    <h5 class=" uppercase">Input SKP</h5>
                </div>
                <div class="modal-body">
                    @if ($skp)
                        <form id="form-skp" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Jenis SKP</label>
                                <select disabled class="form-select skp">
                                    @if ($skp->ketentuan_skp_id)
                                        <option selected disabled>Huruf</option>
                                    @else
                                        <option selected disabled>Angka</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group jenis-skp">
                                @if ($skp->ketentuan_skp_id)
                                    <label>Nilai SKP</label>
                                    <select disabled class="form-select nilai-skp">
                                        <option value="{{ $skp->ketentuan_skp_id }}">{{ $skp->ketentuanSkp->nama }}
                                        </option>
                                    </select>
                                @else
                                    <label>Nilai SKP </label>
                                    <input disabled class="form-control nilai-skp" type="number"
                                        placeholder="Masukan Nilai" value="{{ $skp->nilai_skp }}" />
                                @endif
                            </div>
                        </form>
                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                        </div>
                    @else
                        <form id="form-skp" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Jenis SKP</label>
                                <select class="form-select skp">
                                    <option selected disabled>- Pilih Jenis SKP -</option>
                                    <option value="huruf">Huruf</option>
                                    <option value="angka">Angka</option>
                                </select>
                            </div>
                            <div class="form-group jenis-skp">

                            </div>
                        </form>
                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-blue px-5 send-skp">
                                <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                    style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                                <span>Kirim</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="historyRekap" tabindex="-1" role="dialog" aria-labelledby="historyRekapTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-red uppercase">Surat Pernyataan Melakukan Kegiatan</h5>
                </div>
                <div class="modal-body">
                    <div class="timeline-vertical" data-simplebar
                        style="max-height: 74vh; overflow-y: auto; overflow-x: hidden;">
                        @include('aparatur.laporan-kegiatan.jabatan.history_rekapitulasi',
                            compact('historyRekapitulasiKegiatans'))
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-danger px-5" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="golonganCustom" tabindex="-1" role="dialog" aria-labelledby="golonganCustomTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-red uppercase">Masukan Pangkat Golongan</h5>
                </div>
                <div class="modal-body">
                    <form action="" class="form-golongan">
                        <div class="form-group">
                            <label>Pangkat Golongan</label>
                            <select required name="golongan_custom" class="form-select">
                                <option value="">- Pilih Pangkat Golongan -</option>
                                @foreach ($pangkats as $pangkat)
                                    <option @selected($user->userAparatur->golongan_custom == $pangkat->nama) value="{{ $pangkat->nama }}">
                                        {{ $pangkat->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <button class="btn btn-danger px-5" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-blue px-5 simpan-golongan">
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

        @media screen and (max-width: 399px) {
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
    <script src="{{ asset('assets/js/pages/aparatur/kegiatan/jabatan/index.js') }}"></script>
@endsection

@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form action="">
                        <div class="timeline">
                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                    <p>Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan;</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                        <p>Apel pagi sebagai peserta dan serah terima tugas jaga;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-purple-reverse ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#tindakLanjut" type="button">tindak lanjut</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                        <p>Tugas piket jaga;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-yellow-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">diproses</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                        <p>Apel malam sebagai peserta;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-red-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#revisi" type="button">revisi</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                        <p>kegiatan rutin latihan ketrampilan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                            </div>

                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                    <p>Pelaksanaan prosedur pelaporan informasi kejadian kebakaran;</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                        <p>Informasi kejadian kebakaran; dan</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                        <p>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;
                                        </p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                            </div>

                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Pelaksanaan operasional pemadaman kebakaran;</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Informasi kejadian kebakaran; dan</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Keberangkatan menuju tempat kejadian kebakaran;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Pemadaman kebakaran;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Proses pendinginan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>persiapan kembali ke pos pemadam kebakaran dan
                                            penyelamatan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                            </div>

                            <div class="title-timeline">
                                <label class="title-wrapper">
                                    <input type="checkbox" id="checkbox1" class="form-check-input">
                                    <p>Pelaksanaan prosedur pelaporan informasi kejadian
                                        evakuasi dan penyelamatan;</p>
                                </label>
                            </div>
                            <div class="area-timeline">
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Informasi kejadian evakuasi dan penyelamatan;
                                        </p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Koordinasi dengan Kepala Regu terkait
                                            informasi kejadian evakuasi dan
                                            penyelamatan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>evakuasi dan penyelamatan; dan</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                                <div class="area-wrapper">
                                    <label style=" cursor: pointer;">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>melaporkan kejadian evakuasi dan
                                            penyelamatan;</p>
                                    </label>
                                    <div class="d-flex align-items-center btn-wrapper">
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#riwayat" type="button">selesai</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="flex text-center mt-4">
                                <a href="{{ route('daftar-laporan-kegiatan') }}"
                                    class="btn btn-blue btn-custom px-5">Simpan</a>
                            </div> --}}
                    </form>

                    <div class="row flex-column mt-5">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-purple-reverse ms-3 px-3 text-sm" type="button">tindak
                                lanjut</button>
                            <span class="text-xl mx-2">:</span>
                            <span class="text-xl">1</span>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-yellow-reverse btn-status ms-3 px-3 text-sm"
                                type="button">diproses</button>
                            <span class="text-xl mx-2">:</span>
                            <span class="text-xl">1</span>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-red-reverse btn-status ms-3 px-3 text-sm"
                                type="button">revisi</button>
                            <span class="text-xl mx-2">:</span>
                            <span class="text-xl">1</span>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-green-reverse btn-status ms-3 px-3 text-sm"
                                type="button">selesai</button>
                            <span class="text-xl mx-2">:</span>
                            <span class="text-xl">1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="tindakLanjut" tabindex="-1" role="dialog" aria-labelledby="tindakLanjutTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Files</label>
                                    <input type="file" class="with-validation-files" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gambar Kegiatan</label>
                                    <input type="file" class="with-validation-images" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Detail Kegiatan</label>
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <a class="btn btn-blue px-5" href="{{ route('daftar-laporan-kegiatan') }}">Kirim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="riwayat" tabindex="-1" role="dialog" aria-labelledby="riwayatTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Files</label>
                                    <input type="file" class="with-validation-files" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Kegiatan</label>
                                    <input type="file" class="with-validation-images" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                                <div class="form-group">
                                    <label for="">Detail Kegiatan</label>
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 style="font-size: 16px !important; color: black;">Riwayat Laporan kegiatan Agus
                                    Syamsudin</h5>

                                <div class="history">
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Input Laporan Kegiatan</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan kegiatan di terima Pejabat Struktural</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan di verifikasi Pejabat Struktural</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan kegiatan diterima Oleh Kasi</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan diverifikasi Oleh Kasi</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Selesai ditanda tangan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-danger px-5 mt-4" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="revisi" tabindex="-1" role="dialog" aria-labelledby="revisiTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Files</label>
                                    <input type="file" class="with-validation-files" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Kegiatan</label>
                                    <input type="file" class="with-validation-images" required multiple
                                        data-max-file-size="1MB" data-max-files="3">
                                </div>
                                <div class="form-group">
                                    <label for="">Detail Kegiatan</label>
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 style="font-size: 16px !important; color: black;">Riwayat Laporan kegiatan Agus
                                    Syamsudin</h5>

                                <div class="history">
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Input Laporan Kegiatan</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan kegiatan di terima Pejabat Struktural</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan di verifikasi Pejabat Struktural</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan kegiatan diterima Oleh Kasi</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Laporan diverifikasi Oleh Kasi</p>
                                        </div>
                                    </div>
                                    <div class="history-item">
                                        <span class="history-item-date">07-08-2022</span>
                                        <div class="history-item-wrapper">
                                            <div class="point-wrapper">
                                                <span class="point"></span>
                                            </div>
                                            <p>Selesai ditanda tangan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <a class="btn btn-blue px-5" href="{{ route('daftar-laporan-kegiatan') }}">Kirim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/timeline.css') }}">
    <style>
        @media screen and (max-width:780px) {
            .btn-wrapper {
                flex-direction: column;
                gap: 1rem;
            }

            .area-wrapper {
                flex-direction: column;
            }

            .area-wrapper label {
                min-width: 100% !important;
            }

            .area-wrapper .btn-wrapper {
                flex-direction: row;
                justify-content: space-evenly;
                margin-top: 1rem;
                width: 100%;
            }
        }

        .title-timeline p,
        .area-wrapper label p {
            font-family: 'Roboto';
            font-weight: 600;
        }

        .title-timeline p {
            color: #000000;
        }

        .area-wrapper label p {
            color: #809FB8;
        }

        .btn-green {
            text-transform: uppercase;
            font-family: 'Roboto';
            font-weight: 700;
            font-size: 14px;
        }

        .btn-custom {
            text-transform: uppercase;
            font-family: 'Roboto';
            font-weight: 600;
            font-size: 16px;
            border-radius: 4px !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/timeline.css') }}">
    <style>
        @media screen and (max-width:780px) {
            .btn-wrapper {
                flex-direction: column;
                gap: 1rem;
            }

            .area-wrapper {
                flex-direction: column;
            }

            .area-wrapper label {
                min-width: 100% !important;
            }

            .area-wrapper .btn-wrapper {
                flex-direction: row;
                justify-content: space-evenly;
                margin-top: 1rem;
                width: 100%;
            }
        }

        li::marker {
            color: black;
        }

        .modal-body {
            padding: 3rem 2rem !important;
        }

        @media (min-width:992px) {
            .modal-body {
                padding: 3rem 5rem !important;
            }
        }

        .history {
            padding: 1rem 0;
        }

        .history p {
            margin: 0;
        }

        .history .history-item {
            display: flex;
            align-items: flex-start;
        }

        .history .history-item .history-item-date {
            white-space: nowrap;
            font-style: italic;
            color: rgba(0, 144, 255, 0.7);
            font-size: 16px;
        }

        .history .history-item .history-item-wrapper {
            border-left: 2px solid black;
            margin-left: 2rem;
            display: flex;
            position: relative;
        }

        .history-item .history-item-wrapper .point-wrapper {
            width: 1.5rem;
            height: 1.4rem;
            background-color: rgba(249, 185, 89, 0.47);
            position: absolute;
            left: -.83rem;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .history-item-wrapper .point-wrapper .point {
            width: .6rem;
            height: .6rem;
            background-color: black;
            border-radius: 50%;
        }

        .history-item .history-item-wrapper p {
            margin-left: 1.5rem;
            color: black;
        }

        .history-item:not(:last-child) .history-item-wrapper p {
            padding-bottom: .8rem;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>

    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <script>
        $(function() {

            // First register any plugins
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

            // Turn input element into a pond
            $('.with-validation-images').filepond();

            // Set allowMultiple property to true
            $('.with-validation-images').filepond('allowMultiple', true);

            // Listen for addfile event
            $('.with-validation-images').on('FilePond:addfile', function(e) {
                console.log('file added event', e);
            });

            // Manually add a file using the addfile method
            // $('.my-pond').first().filepond('addFile', 'index.html').then(function(file) {
            //     console.log('file added', file);
            // });

            // Turn input element into a pond
            $('.with-validation-files').filepond();

            // Set allowMultiple property to true
            $('.with-validation-files').filepond('allowMultiple', true);

            // Listen for addfile event
            $('.with-validation-files').on('FilePond:addfile', function(e) {
                console.log('file added event', e);
            });
        });
    </script>
@endsection

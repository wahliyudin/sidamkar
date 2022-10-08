@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                            <p>Tugas piket jaga;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                            <p>Apel malam sebagai peserta;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                            <p>kegiatan rutin latihan ketrampilan;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
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
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" checked class="form-check-input">
                                            <p>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
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
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Keberangkatan menuju tempat kejadian kebakaran;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Pemadaman kebakaran;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Proses pendinginan;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>persiapan kembali ke pos pemadam kebakaran dan penyelamatan;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                </div>

                                <div class="title-timeline">
                                    <label class="title-wrapper">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Pelaksanaan prosedur pelaporan informasi kejadian evakuasi dan penyelamatan;</p>
                                    </label>
                                </div>
                                <div class="area-timeline">
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Informasi kejadian evakuasi dan penyelamatan;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Koordinasi dengan Kepala Regu terkait informasi kejadian evakuasi dan
                                                penyelamatan;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>evakuasi dan penyelamatan; dan</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style=" cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>melaporkan kejadian evakuasi dan penyelamatan;</p>
                                        </label>
                                        <button class="btn btn-green ms-3 px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailKegiatan" type="button">upload data</button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex text-center mt-4">
                                <a href="{{ route('daftar-laporan-kegiatan') }}"
                                    class="btn btn-blue btn-custom px-5">Simpan</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="detailKegiatan" tabindex="-1" role="dialog" aria-labelledby="detailKegiatanTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-column mt-1">
                            <div class="form-group">
                                <label for="">Detail Kegiatan</label>
                                <textarea name="" id="" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <a class="btn btn-blue" href="{{ route('daftar-laporan-kegiatan') }}">Simpan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="riwayat" tabindex="-1" role="dialog" aria-labelledby="riwayatTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <h5 style="font-size: 16px !important; color: black;">Riwayat Laporan kegiatan Agus Syamsudin</h5>

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

                        <div class="d-flex flex-column mt-1">
                            <h5 style="font-size: 16px !important; color: black;">Catatan Review</h5>
                            <ul>
                                <li>
                                    <p style="font-size: 14px; font-style: italic; color:  #000000; margin: 0 !important;">
                                        Pejabat Strukutral -
                                        Tidak ada</p>
                                </li>
                                <li>
                                    <p style="font-size: 14px; font-style: italic; color:  #000000; margin: 0 !important;">
                                        Kasi - Tidak ada</p>
                                </li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection

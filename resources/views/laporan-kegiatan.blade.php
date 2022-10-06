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
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection

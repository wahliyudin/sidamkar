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
                                        <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                        <p>Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan;</p>
                                    </label>
                                </div>
                                <div class="area-timeline">
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>Apel pagi sebagai peserta dan serah terima tugas jaga;</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <button class="btn btn-green-light ms-3">diterima</button>
                                            <button class="btn btn-yellow-light ms-3">view</button>
                                        </div>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>Tugas piket jaga;</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <button class="btn btn-green-light ms-3">diterima</button>
                                            <button class="btn btn-yellow-light ms-3">view</button>
                                        </div>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>Apel malam sebagai peserta;</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <button class="btn btn-green-light ms-3">diterima</button>
                                            <button class="btn btn-yellow-light ms-3">view</button>
                                        </div>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>kegiatan rutin latihan ketrampilan;</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <button class="btn btn-green-light ms-3">diterima</button>
                                            <button class="btn btn-yellow-light ms-3">view</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="title-timeline">
                                    <label class="title-wrapper">
                                        <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                        <p>Pelaksanaan prosedur pelaporan informasi kejadian kebakaran;</p>
                                    </label>
                                </div>
                                <div class="area-timeline">
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>Informasi kejadian kebakaran; dan</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <button class="btn btn-green-light ms-3">diterima</button>
                                            <button class="btn btn-yellow-light ms-3">view</button>
                                        </div>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <button class="btn btn-green-light ms-3">diterima</button>
                                            <button class="btn btn-yellow-light ms-3">view</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
        }

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
    </style>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection

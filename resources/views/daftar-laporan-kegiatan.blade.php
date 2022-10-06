@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end pb-4">
                            <div class="dropdown">
                                <span id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="cursor: pointer;">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </span>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('riwayat-kegiatan') }}">Riwayat Kegiatan</a>
                                    <a class="dropdown-item" href="#">Option 2</a>
                                    <a class="dropdown-item" href="#">Option 3</a>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom d-flex justify-content-end pb-4">
                            <a href="{{ route('laporan-kegiatan') }}" class="btn-ubah shadow-sm">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <span>Ubah</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="timeline">
                                <div class="title-timeline">
                                    <label class="title-wrapper">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan;</p>
                                    </label>
                                </div>
                                <div class="area-timeline">
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>Apel pagi sebagai peserta dan serah terima tugas jaga;</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Tugas piket jaga;</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Apel malam sebagai peserta;</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>kegiatan rutin latihan ketrampilan;</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                </div>

                                <div class="title-timeline">
                                    <label class="title-wrapper">
                                        <input type="checkbox" id="checkbox1" class="form-check-input">
                                        <p>Pelaksanaan prosedur pelaporan informasi kejadian kebakaran;</p>
                                    </label>
                                </div>
                                <div class="area-timeline">
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Informasi kejadian kebakaran; dan</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 85%; cursor: pointer;">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;</p>
                                        </label>
                                        <button class="btn btn-yellow-light ms-3">view</button>
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
        .btn-ubah {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 10px 18px 10px 20px;
            background: #F2F2F2;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #1AD598;
        }

        .btn-ubah span {
            text-transform: uppercase;
            font-weight: 600;
            font-family: 'Roboto';
            font-size: 16px;
            margin-left: 10px;
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

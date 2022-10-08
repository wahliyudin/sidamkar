@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
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
                    </div> --}}
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
                                            <span class="text-status status-green"><i class="fa-solid fa-circle-check"></i>
                                                Sukses</span>
                                            <button class="btn btn-yellow-light ms-3" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter" type="button">detail</button>
                                        </div>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>Tugas piket jaga;</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <span class="text-status status-green"><i class="fa-solid fa-circle-check"></i>
                                                Sukses</span>
                                            <button class="btn btn-yellow-light ms-3" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter" type="button">detail</button>
                                        </div>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>Apel malam sebagai peserta;</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <span class="text-status status-purple">
                                                <i class="fa-solid fa-spinner"></i>
                                                diproses
                                            </span>
                                            <button class="btn btn-yellow-light ms-3" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter" type="button">detail</button>
                                        </div>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>kegiatan rutin latihan ketrampilan;</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <span class="text-status status-green"><i class="fa-solid fa-circle-check"></i>
                                                Sukses</span>
                                            <button class="btn btn-yellow-light ms-3" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter" type="button">detail</button>
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
                                            <span class="text-status status-green"><i class="fa-solid fa-circle-check"></i>
                                                Sukses</span>
                                            <button class="btn btn-yellow-light ms-3" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter" type="button">detail</button>
                                        </div>
                                    </div>
                                    <div class="area-wrapper">
                                        <label style="max-width: 70%; cursor: pointer;">
                                            <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                            <p>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;</p>
                                        </label>
                                        <div class="d-flex align-items-center btn-wrapper">
                                            <button class="btn btn-red-light"data-bs-toggle="modal" data-bs-target="#revisi"
                                                type="button">revisi</button>
                                            <button class="btn btn-yellow-light ms-3" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter" type="button">detail</button>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-column mt-1">
                            <div class="form-group">
                                <label for="">File</label>
                                <input type="file" name="" class="form-control" id="">
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="revisi" tabindex="-1" role="dialog" aria-labelledby="revisiTitle"
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
                            <button class="btn btn-blue" data-bs-dismiss="modal">Simpan</button>
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

        .text-status {
            text-transform: uppercase;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: 700;
        }

        .status-green {
            color: #1AD598;
        }

        .status-purple {
            color: #809FB8;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection

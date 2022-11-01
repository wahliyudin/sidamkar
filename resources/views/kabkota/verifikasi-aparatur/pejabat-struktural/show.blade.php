@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body" style="padding-top: 3rem;">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="avatar avatar-xl me-3">
                            <img style="width: 180px; height: 180px;" src="{{ asset('assets/images/faces/3.jpg') }}"
                                alt="" srcset="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="basicInput">Tingkat Admin</label>
                            <select class="choices form-select" disabled>
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Provinsi</label>
                            <select class="choices form-select" disabled>
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Kabupaten / Kota</label>
                            <select class="choices form-select" disabled>
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Nomenklatur Perangkat Daerah</label>
                            <select class="choices form-select" disabled>
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Nama</label>
                            <input disabled type="text" class="form-control" id="basicInput" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">NIP / Nomor Registrasi</label>
                            <input disabled type="number" class="form-control" id="basicInput"
                                placeholder="15080912345677001">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="basicInput">Tempat Tanggal Lahir</label>
                            <input disabled type="text" class="form-control" id="basicInput" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Pangkat / Golongan / TMT</label>
                            <select class="choices form-select" disabled>
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Jenis Kelamin</label>
                            <select class="choices form-select" disabled>
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Pendidikan Terakhir</label>
                            <select class="choices form-select" disabled>
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Pendidikan Terakhir</label>
                            <select class="choices form-select" disabled>
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Jabatan</label>
                            <select class="choices form-select" disabled>
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 style="color:#000000; margin: 0 !important;">Dokumen Kepegawaian</h4>
                        <span class="custom-badge custom-badge-purple-light">
                            <img src="{{ asset('assets/images/template/Vector.png') }}" alt="" srcset="">
                        </span>
                    </div>
                    <div class="card-body">
                        <ul class="doc-wrapper">
                            <li class="doc-item">
                                <a href="" class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/template/icon-dokumen-png-0 1.png') }}"
                                        alt="">
                                    <p>File dokumen ABCD.pdf</p>
                                </a>
                            </li>
                            <li class="doc-item">
                                <a href="" class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/template/icon-dokumen-png-0 1.png') }}"
                                        alt="">
                                    <p>File dokumen ABCD.pdf</p>
                                </a>
                            </li>
                            <li class="doc-item">
                                <a href="" class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/template/icon-dokumen-png-0 1.png') }}"
                                        alt="">
                                    <p>File dokumen ABCD.pdf</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 style="color: #000000; margin: 0 !important;">Kompetensi</h4>
                        <span class="custom-badge custom-badge-green">
                            <img src="{{ asset('assets/images/template/kompetensi.png') }}" alt=""
                                srcset="">
                        </span>
                    </div>
                    <div class="card-body">
                        <ul class="doc-wrapper">
                            <li class="doc-item">
                                <div class="d-flex align-items-center">
                                    <span class="custom-badge-sm custom-badge-blue-light">01</span>
                                    <p>Pelatihan pembinaan dan pengawasan</p>
                                </div>
                            </li>
                            <li class="doc-item">
                                <div class="d-flex align-items-center">
                                    <span class="custom-badge-sm custom-badge-yellow-light">02</span>
                                    <p>Pelatihan pembinaan dan pengawasan</p>
                                </div>
                            </li>
                            <li class="doc-item">
                                <div class="d-flex align-items-center">
                                    <span class="custom-badge-sm custom-badge-purple-light">03</span>
                                    <p>Pelatihan pembinaan dan pengawasan</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if (in_array($user->status_akun, [0, 2]))
            <div class="row">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-red" data-bs-toggle="modal" data-bs-target="#rejectModal">TOLAK</button>
                    <button class="btn btn-blue ms-2" data-bs-toggle="modal"
                        data-bs-target="#verifModal">VERIFIKASI</button>
                </div>
            </div>
        @endif

    </section>

    <div class="modal fade" id="verifModal" tabindex="-1" role="dialog" aria-labelledby="verifModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifModalTitle">
                        Peringatan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Apakah anda yakin memperifikasi akun ini?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bx bx-x"></i>
                        <span>Batal</span>
                    </button>
                    <form action="{{ route('kab-kota.verifikasi-aparatur.verified', $user->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-green ml-1">
                            <i class="bx bx-check"></i>
                            <span>Ya, yakin</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalTitle">
                        Peringatan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('kab-kota.verifikasi-aparatur.reject', $user->id) }}" method="post">
                    <div class="modal-body">
                        <p>
                            Apakah anda yakin tolak akun ini?
                        </p>
                        @csrf
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="bx bx-x"></i>
                            <span>Batal</span>
                        </button>

                        <button type="submit" class="btn btn-green ml-1">
                            <i class="bx bx-check"></i>
                            <span>Ya, yakin</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/my-data.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style>
        .custom-badge {
            border-radius: 5px;
            padding: .5rem .8rem;
        }

        .custom-badge-sm {
            border-radius: 5px;
            padding: .3rem .6rem;
        }

        .custom-badge>img {
            width: 1.3rem;
        }

        .custom-badge.custom-badge-purple-light,
        .custom-badge-sm.custom-badge-purple-light {
            background-color: rgba(219, 90, 238, 0.4);
            color: #DB5AEE;
        }

        .custom-badge.custom-badge-green {
            background-color: #1AD598;
        }

        .custom-badge.custom-badge-yellow-light,
        .custom-badge-sm.custom-badge-yellow-light {
            background-color: rgba(255, 181, 54, 0.298039);
            color: #FFB536;
        }

        .custom-badge.custom-badge-blue-light,
        .custom-badge-sm.custom-badge-blue-light {
            background-color: rgba(33, 126, 253, 0.298039);
            color: #217EFD;
        }

        .doc-wrapper {
            list-style: none;
            padding: 0 !important;
        }

        .doc-wrapper .doc-item:not(:first-child) {
            margin-top: .8rem;
        }

        .doc-wrapper .doc-item p {
            margin: 0 0 0 1rem;
        }

        .choices__inner {
            background-color: white !important;
        }

        .choices.is-disabled .choices__inner,
        .choices.is-disabled .choices__list.choices__list--single {
            background-color: #e9ecef !important;
        }

        .form-control:disabled {
            cursor: not-allowed;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection

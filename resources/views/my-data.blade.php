@extends('layouts.master')

@section('breadcrumbs')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pegawai</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">My Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
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
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Basic Input</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <a href="" class="btn-ubah shadow-sm">Ubah</a>
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
    </section>
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
    </style>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection

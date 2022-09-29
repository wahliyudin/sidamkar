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
                    <div class="card-header">
                        <h3>Dokumen Kepegawaian</h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Dokumen Kepegawaian</h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Simple Collapse</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="">
                                <div role="button" data-bs-toggle="collapse" data-bs-target="#one"
                                    aria-expanded="false" aria-controls="one"
                                    style="display: flex; align-content: center;">
                                    <p
                                        style="padding: 2px 8px; border-radius: 5px; background-color: rgba(26, 213, 152, 0.298039);">
                                        <i class="fa-solid fa-chevron-down text-sm"></i>
                                    </p>
                                    <h5 class="ms-4">
                                        Kesiapsiagaan petugas pemadam kebakaran dan penyelamatan;
                                    </h5>
                                </div>
                                <div class="collapse" id="one">
                                    <ul class="py-1 ms-5">
                                        <li class="py-1">
                                            <h6>Apel pagi sebagai peserta dan serah terima tugas jaga;</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>Tugas piket jaga;</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>Apel malam sebagai peserta;</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>kegiatan rutin latihan ketrampilan;</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="">
                                <div role="button" data-bs-toggle="collapse" data-bs-target="#two"
                                    aria-expanded="false" aria-controls="two"
                                    style="display: flex; align-content: center;">
                                    <p
                                        style="padding: 2px 8px; border-radius: 5px; background-color: rgba(26, 213, 152, 0.298039);">
                                        <i class="fa-solid fa-chevron-down text-sm"></i>
                                    </p>
                                    <h5 class="ms-4">
                                        Pelaksanaan prosedur pelaporan informasi kejadian kebakaran;
                                    </h5>
                                </div>
                                <div class="collapse" id="two">
                                    <ul class="py-1 ms-5">
                                        <li class="py-1">
                                            <h6>Informasi kejadian kebakaran; dan</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>koordinasi dengan Kepala Regu terkait informasi kejadian kebakaran;</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="">
                                <div role="button" data-bs-toggle="collapse" data-bs-target="#three"
                                    aria-expanded="false" aria-controls="three"
                                    style="display: flex; align-content: center;">
                                    <p
                                        style="padding: 2px 8px; border-radius: 5px; background-color: rgba(26, 213, 152, 0.298039);">
                                        <i class="fa-solid fa-chevron-down text-sm"></i>
                                    </p>
                                    <h5 class="ms-4">
                                        Pelaksanaan operasional pemadaman kebakaran;
                                    </h5>
                                </div>
                                <div class="collapse" id="three">
                                    <ul class="py-1 ms-5">
                                        <li class="py-1">
                                            <h6>Keberangkatan menuju tempat kejadian kebakaran;</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>Pemadaman kebakaran;</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>Proses pendinginan;</h6>
                                        </li>
                                        <li class="py-1">
                                            <h6>persiapan kembali ke pos pemadam kebakaran dan penyelamatan;</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/my-data.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection

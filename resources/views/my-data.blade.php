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
                            <select class="choices form-select">
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                                <option value="romboid">Romboid</option>
                                <option value="trapeze">Trapeze</option>
                                <option value="traible">Triangle</option>
                                <option value="polygon">Polygon</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Provinsi</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Kabupaten / Kota</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Nomenklatur Prangkat Daerah</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Nama</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">NIP/Nomor Register</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="basicInput">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Pangkat / Golongan / TMT</label>
                            <select class="choices form-select">
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                                <option value="rombo">Rombo</option>
                                <option value="romboid">Romboid</option>
                                <option value="trapeze">Trapeze</option>
                                <option value="traible">Triangle</option>
                                <option value="polygon">Polygon</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Jenis Kelamin</label>
                            <select class="choices form-select">
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Pendidikan Terakhir</label>
                            <select class="choices form-select">
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Pendidikan Terakhir</label>
                            <select class="choices form-select">
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Jabatan</label>
                            <select class="choices form-select">
                                <option value="square">Square</option>
                                <option value="rectangle">Rectangle</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <a href="" class="btn-ubah shadow-sm">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <span>Ubah</span>
                    </a>
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
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
@endsection

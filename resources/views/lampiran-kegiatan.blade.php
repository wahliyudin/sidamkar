@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end pb-4" style="border-bottom: 1px solid #809FB8;">
                    <button class="btn btn-green-reverse px-3" data-bs-toggle="modal" data-bs-target="#tambahData">
                        <i class="fa-solid fa-file-circle-plus"></i>
                        Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <h5>Table Data Pendaftaran Aparatur</h5>
                </div>
                <div class="row">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Bidang</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Graiden</td>
                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                <td>076 4820 8838</td>
                                <td>Offenburg</td>
                                <td>
                                    <span class="text-status text-green text-sm">Aktif</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Graiden</td>
                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                <td>076 4820 8838</td>
                                <td>Offenburg</td>
                                <td>
                                    <span class="text-status text-green text-sm">Aktif</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Graiden</td>
                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                <td>076 4820 8838</td>
                                <td>Offenburg</td>
                                <td>
                                    <span class="text-status text-green text-sm">Aktif</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body px-4 py-4">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-column align-items-start">
                            <div class="row w-100">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pilih Nama Pejabat Fungsional</label>
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
                                </div>
                            </div>

                            <form action="" class="mt-4">
                                <div class="timeline">
                                    <div class="title-timeline">
                                        <label class="title-wrapper">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        </label>
                                    </div>
                                    <div class="area-timeline">
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf Lorem ipsum dolor, sit amet
                                                    consectetur adipisicing elit. Iste quo omnis nesciunt ex perspiciatis?
                                                    Dolorum
                                                    at fugiat veritatis dignissimos voluptas! Explicabo molestias quibusdam
                                                    neque,
                                                    blanditiis ea reprehenderit cupiditate pariatur temporibus.</p>
                                            </label>
                                        </div>
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf</p>
                                            </label>
                                        </div>
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf</p>
                                            </label>
                                        </div>
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf</p>
                                            </label>
                                        </div>
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf</p>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="title-timeline">
                                        <label class="title-wrapper">
                                            <input type="checkbox" id="checkbox1" class="form-check-input">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        </label>
                                    </div>
                                    <div class="area-timeline">
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf Lorem ipsum dolor, sit amet
                                                    consectetur adipisicing elit. Iste quo omnis nesciunt ex perspiciatis?
                                                    Dolorum
                                                    at fugiat veritatis dignissimos voluptas! Explicabo molestias quibusdam
                                                    neque,
                                                    blanditiis ea reprehenderit cupiditate pariatur temporibus.</p>
                                            </label>
                                        </div>
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf</p>
                                            </label>
                                        </div>
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf</p>
                                            </label>
                                        </div>
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf</p>
                                            </label>
                                        </div>
                                        <div class="area-wrapper">
                                            <label>
                                                <input type="checkbox" id="checkbox1" class="form-check-input">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
                                                    dolor
                                                    sit
                                                    amet, consectetur adipisicing elit.sfasfasf</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-green" data-bs-dismiss="modal">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/lampiran-kegiatan.css') }}">
    <style>
        .dataTable-table>thead>tr>th {
            border: 0;
        }

        .dataTable-table th a {
            color: #809FB8;
        }

        .table-striped-columns>:not(caption)>tr>:nth-child(2n),
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            border-color: #F1F4F9;
        }

        .table-striped>tbody>tr,
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            color: #06152B;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/data-pejabat-struktural.js') }}"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
@endsection

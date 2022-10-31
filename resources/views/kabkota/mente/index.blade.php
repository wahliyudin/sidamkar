@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green">
                                <i class="fa-solid
                                fa-stopwatch"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Periode
                                </p>
                                <h2 style="font-family: 'Roboto'; font-size: 20px; color: #06152B;" class="target">Januari
                                    2022 - Juli 2022</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penilai AK
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B; font-size: 22px;" class="target">Rohmat
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penetap AK
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B; font-size: 22px;" class="target">Alifta
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="" class="btn btn-mente py-3 mt-3" data-bs-toggle="modal" data-bs-target="#tambahedit"><i
                        class="fa-solid fa-right-to-bracket me-3"></i>Tambah/Edit</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-md-3">
                                <h5>Table Data Pendaftaran Aparatur</h5>
                            </div>
                            <div class="col-md-3">
                                <a href="" class="btn btn-primary" style="right: 0;" data-bs-toggle="modal"
                                    data-bs-target="#editMentee">Tambah Mentee</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editMentee" tabindex="-1" role="dialog" aria-labelledby="editMenteeTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenteeTitle">
                        Tambah Mentee
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Atasan Langsung</label>
                                    <select class="choices form-select" name="role_id">
                                        <option disabled selected>Pilih Jabatan</option>
                                        <option>Iqbal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card mt-3" style="border: 1px solid black;">
                                    <div class="card-header">
                                        <div class="row justify-content-between">
                                            <div class="col-md-3">
                                                <h5>Nama Fungsional</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="overflow: auto; height: 30vh;">
                                        <table class="table table-striped" id="table1">
                                            <thead style="position: sticky; top: 0; color: black; background-color: white;">
                                                <tr>
                                                    <th></th>
                                                    <th>Nama</th>
                                                    <th>Nomor Karpeg</th>
                                                    <th>Jabatan</th>
                                                    <th>Golongan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault"></td>
                                                    <td>Graiden</td>
                                                    <td>1551565645</td>
                                                    <td>Damkar Pemula</td>
                                                    <td>III A</td>

                                                </tr>
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault"></td>
                                                    <td>Graiden</td>
                                                    <td>1551565645</td>
                                                    <td>Damkar Pemula</td>
                                                    <td>III A</td>

                                                </tr>
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault"></td>
                                                    <td>Graiden</td>
                                                    <td>1551565645</td>
                                                    <td>Damkar Pemula</td>
                                                    <td>III A</td>

                                                </tr>
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault"></td>
                                                    <td>Graiden</td>
                                                    <td>1551565645</td>
                                                    <td>Damkar Pemula</td>
                                                    <td>III A</td>

                                                </tr>
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault"></td>
                                                    <td>Graiden</td>
                                                    <td>1551565645</td>
                                                    <td>Damkar Pemula</td>
                                                    <td>III A</td>

                                                </tr>
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault"></td>
                                                    <td>Graiden</td>
                                                    <td>1551565645</td>
                                                    <td>Damkar Pemula</td>
                                                    <td>III A</td>

                                                </tr>
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault"></td>
                                                    <td>Graiden</td>
                                                    <td>1551565645</td>
                                                    <td>Damkar Pemula</td>
                                                    <td>III A</td>

                                                </tr>
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault"></td>
                                                    <td>Graiden</td>
                                                    <td>1551565645</td>
                                                    <td>Damkar Pemula</td>
                                                    <td>III A</td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button class="btn btn-green ml-1 simpan-kegiatan">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahedit" tabindex="-1" role="dialog" aria-labelledby="tambaheditTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambaheditTitle">
                        Tambah Mentee
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Penilai AK</label>
                                    <select class="choices form-select" name="role_id">
                                        <option disabled selected>Pilih Penilai</option>
                                        <option>Iqbal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Penetap AK</label>
                                    <select class="choices form-select" name="role_id">
                                        <option disabled selected>Pilih Penetap</option>
                                        <option>Iqbal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button class="btn btn-green ml-1 simpan-kegiatan">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <style>
        .dataTable>thead>tr>th {
            border: 0 !important;
        }

        .dataTable th {
            color: #809FB8 !important;
        }

        .table-striped-columns>:not(caption)>tr>:nth-child(2n),
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            border-color: #F1F4F9 !important;
        }

        .table-striped>tbody>tr,
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            color: #06152B !important;
        }

        @media screen and (max-width:780px) {
            .card {
                padding: 0 !important;
            }
        }

        tbody>tr>td {
            cursor: pointer;
        }

        tbody>tr:hover {
            background-color: rgb(250, 250, 250);
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    {{ $dataTable->scripts() }}
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endsection

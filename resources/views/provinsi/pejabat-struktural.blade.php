@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit Minimal
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">100</h2>
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
                                <i class="fa-solid fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit diterima
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">100</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="col-md-3">
                <a href="" class="btn btn-primary py-3 mt-3"><i
                        class="fa-solid fa-right-to-bracket me-3"></i>Tambah/Edit</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Table Data Pendaftaran Aparatur</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Daerah</th>
                                    <th>Atasan Langsung</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                    <th>File SK</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Graiden</td>
                                    <td></td>
                                    <td>Damkar Pemula</td>
                                    <td>III A</td>
                                    <td>
                                        <span class=""><i class="fa-regular fa-file-lines"></i></span>
                                    </td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <div class="col-md-4"><a href="" class="btn btn-primary">Detail</a></div>
                                            <div class="col-md-4"><a href="" class="btn btn-green bot">Edit</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Graiden</td>
                                    <td></td>
                                    <td>Damkar Pemula</td>
                                    <td>III A</td>
                                    <td>
                                        <span><i class="fa-regular fa-file-lines"></i></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
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

        @media screen and (max-width:780px) {
            .card {
                padding: 0 !important;
            }

            .bot {
                margin-top: 15px;
            }
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection

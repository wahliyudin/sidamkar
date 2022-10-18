@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <h5 style="color: #06152B; font-size: 'Roboto';">Table Data Pendaftaran Aparatur</h5>
                    </div>
                    <div class="col-md-4 col-12 d-flex justify-content-end">
                        <form action="" class="d-flex align-items-center">
                            <div class="form-group w-100" style="margin-bottom: 0 !important;">
                                <select class="form-select" name="">
                                    <option>Pejabat Fungsional</option>
                                    <option>Pejabat Struktural</option>
                                </select>
                            </div>
                            <button class="btn btn-blue ms-2 text-sm ps-2 pe-3 d-flex align-items-center" type="submit"><i
                                    class="fa-solid fa-magnifying-glass me-2"></i>Cari</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Bidang</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Status</th>
                            <th>Detail</th>
                            <th>Action</th>
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
                            <td>
                                <a href="" class="btn btn-yellow-light text-sm">View</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-red-light text-sm px-2">Non
                                    Aktive</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Graiden</td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>076 4820 8838</td>
                            <td>Offenburg</td>
                            <td>
                                <span class="text-status text-red text-sm">Tidak Aktif</span>
                            </td>
                            <td>
                                <a href="" class="btn btn-yellow-light text-sm">View</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-red-light text-sm px-2">Non
                                    Aktive</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection

@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5>Table Data Pendaftaran Aparatur</h5>
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
                                <a href="{{ route('detail-data-aparatur') }}" class="btn btn-yellow-light text-sm">View</a>
                            </td>
                            <td>
                                <a href="{{ route('detail-data-aparatur') }}" class="btn btn-red-light text-sm px-2">Non
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
                                <a href="{{ route('detail-data-aparatur') }}" class="btn btn-yellow-light text-sm">View</a>
                            </td>
                            <td>
                                <a href="{{ route('detail-data-aparatur') }}" class="btn btn-red-light text-sm px-2">Non
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

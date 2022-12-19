@extends('layouts.master')

@section('content')
    <section class="section">
        @if (!isset(Auth::user()->userPejabatStruktural?->nip))
            <div class="alert alert-warning " style="color: white;"><i class="fa-solid fa-circle-exclamation"></i> Harap
                Lengkapi Data
                Profile
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penilai AK Damkar
                                </p>
                                <h5 style="font-family: 'Roboto';color: #06152B;" class="target">
                                    {{ $penilaiAndPenetap?->penilaiAngkaKreditDamkar?->userPejabatStruktural?->nama ?? '-' }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penilai AK Analis
                                </p>
                                <h5 style="font-family: 'Roboto';color: #06152B;" class="target">
                                    {{ $penilaiAndPenetap?->penilaiAngkaKreditAnalis?->userPejabatStruktural?->nama ?? '-' }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penetap AK Damkar
                                </p>
                                <h5 style="font-family: 'Roboto';color: #06152B;" class="target">
                                    {{ $penilaiAndPenetap?->penetapAngkaKreditDamkar?->userPejabatStruktural?->nama ?? '-' }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penetap AK Analis
                                </p>
                                <h5 style="font-family: 'Roboto';color: #06152B;" class="target">
                                    {{ $penilaiAndPenetap?->penetapAngkaKreditAnalis?->userPejabatStruktural?->nama ?? '-' }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col order-md-0 order-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">HISTORI</h4>
                    </div>
                    <div class="card-body">
                        {{-- <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Tugas/Kegiatan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="" style="color: #06152B;">Kesiapsiagaan petugas pemadam kebakaran
                                            dan penyelamatan</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-yellow-reverse btn-status ms-3 px-3 text-sm"
                                            type="button">diproses</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="" style="color: #06152B;">Pelaksanaan prosedur pelaporan informasi
                                            kejadian kebakaran</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-red-reverse btn-status ms-3 px-3 text-sm"
                                            type="button">revisi</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="" style="color: #06152B;">Pelaksanaan operasional pemadaman
                                            kebakaran</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-green-reverse btn-status ms-3 px-3 text-sm"
                                            type="button">selesai</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center" style="color: #17181A; font-family: 'Roboto';">
                            INFORMATION
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach ($informasi as $informasis)
                                <li>
                                    <p style="margin: 0 !important;"> {{ $informasis->judul }} ( <a href=""
                                            data-bs-toggle="modal" data-bs-target="#informasi">Klik Disini</a> )
                                    </p>
                                    <div class="footer-information">
                                        <p style="font-size: 9px; margin-top: 10px; color: red;"> 11/2/2022</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <style>
        li::marker {
            font-size: 25px !important;
            color: black;
        }
    </style>
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
    <script src="{{ asset('assets/js/pages/data-pejabat-struktural.js') }}"></script>
@endsection

@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;"
                                            class="fa-solid fafa
                                        fa-stopwatch"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-2">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Periode
                                        </p>
                                        <h2 style="font-family: 'Roboto'; font-size: 16px; color: #06152B;" class="target">
                                            {{ $periode != null ? Carbon\Carbon::make($periode->awal)->translatedFormat('F Y') . ' - ' . Carbon\Carbon::make($periode->akhir)->translatedFormat('F Y') : '-' }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-group"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Jumlah Aparatur
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['aparatur'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-large"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pejabat Struktural
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['struktural'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-regular fa-user"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pejabat Fungsional
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['fungsional'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-blue">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-tie"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Fungsional Damkar
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['damkar'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-blue">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-tie"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Fungsional Analis
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['analis'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 px-2 col order-md-0 order-2">
                    <div class="card overflow-auto mb-3">
                        <div class="card-header">
                            <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Butir Kegiatan</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Atasan Langsung</th>
                                        <th>Penilai AK</th>
                                        <th>Penetap AK</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="" style="color: #06152B;">Iqbal Imran</a>
                                        </td>
                                        <td>
                                            <a href="" style="color: #06152B;">Okan Bihaqi</a>
                                        </td>
                                        <td>
                                            <a href="" style="color: #06152B;">Budi S</a>
                                        </td>
                                        <td>
                                            <div class="periode border border-primary " style="text-align: center;">
                                                Januari 2020 - Juli 2020
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col">
                    <div class="card" style="overflow: auto; height: 550px">
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
        </div>
    </section>
@endsection
@section('css')
    <style>
        @media screen and (max-width:750px) {
            .informasi-wrapper {
                padding: 0 !important;
            }

            .card .card-body {
                padding: 1rem 2rem !important;
            }
        }
    </style>
@endsection

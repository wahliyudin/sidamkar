@extends('layouts.master')

@section('content')
    <section class="section">
        @if (!isset(Auth::user()->userAparatur?->nip))
            <div class="alert alert-danger" style="color: white;"><i class="fa-solid fa-circle-exclamation"></i> Harap
                `\Lengkapi `\Data \Profile
            </div>
        @endif
        <style>
           
        </style>
        <div class="row">
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-red-light">
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit Sebelumnya
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">44</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green-light">
                                <i class="fa-solid fa-bullseye"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Target Angka Kredit
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
                            <div class="circle circle-purple-light">
                                <i class="fa-solid fa-sliders"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Capaian Angka Kredit
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">56</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-yellow-light">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Periode Aktif
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B; font-size: 14px;"
                                    class="target target-periode">Januari
                                    2022 - Juli 2022
                                </h2>
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
                        <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Data Graph Angka Kredit</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="line"></canvas>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Butir Kegiatan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
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
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center" style="color: #17181A; font-family: 'Roboto';">
                            INFORMATION
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>
                                <p style="margin: 0 !important;">Upacara Bendera</p>
                            </li>
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

        @media screen and (max-width: 450px) {
            .target-periode {
                font-size: 14px !important;
            }
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/extensions/chart.js/Chart.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/ui-chartjs.js') }}"></script> --}}
    <script>
        var line = document.getElementById("line").getContext("2d");
        var myline = new Chart(line, {
            type: 'line',
            data: {
                labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018',
                    '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018'
                ],
                datasets: [{
                    label: 'Score Kredit',
                    data: [20, 35, 45, 75, 37, 86, 45, 65, 25, 53],
                    backgroundColor: "rgba(234, 58, 61, 0.5)",
                    borderWidth: 3,
                    borderColor: 'rgba(234, 58, 61, 0.5)',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(234, 58, 61, 0.5)',
                }]
            },
            options: {
                responsive: true,
                layout: {
                    padding: {
                        top: 10,
                    },
                },
                tooltips: {
                    intersect: false,
                    titleFontFamily: 'Roboto',
                    titleMarginBottom: 10,
                    xPadding: 10,
                    yPadding: 10,
                    cornerRadius: 3,
                },
                legend: {
                    display: true,
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            drawBorder: true,
                        },
                        ticks: {
                            display: true,
                        },
                    }, ],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                        },
                        ticks: {
                            display: false,
                        },
                    }, ],
                },
            }
        });
    </script>
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/data-pejabat-struktural.js') }}"></script>
@endsection

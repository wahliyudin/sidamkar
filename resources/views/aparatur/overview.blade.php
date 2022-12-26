@extends('layouts.master')

@section('content')
    <section class="section">
        @if (!isset(Auth::user()->userAparatur?->nip))
            <div class="alert alert-danger" style="color: white;"><i class="fa-solid fa-circle-exclamation"></i> Harap
                Lengkapi Data Profile
            </div>
        @endif
        <div class="row">
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green">
                                <i class="fa-solid fafa
                                fa-stopwatch"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
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
            <div class="col-md-3 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 100px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fafa fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Angka Kredit Minimal
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">
                                    {{ isset($ketentuan_ak[0]) ? $ketentuan_ak[0]->ak_min : '0' }}</h2>
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
                                <i class="fa-solid fafa fa-copy"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Total AK Diterima
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B;" class="target">{{ $ak_total }}</h2>
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
                                <i class="fa-solid fafa fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;"
                                    class="target-h1">
                                    Atasan Langsung
                                </p>
                                <h2 style="font-family: 'Roboto';color: #06152B; font-size: 20px;"
                                    class="target target-periode">
                                    {{ isset($atasan_langsung[0]) ? $atasan_langsung[0]->nama : '-' }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col">
                <div class="card overflow-auto" style="overflow: auto; height: 550px">
                    <div class="card-header">
                        <h2 class="card-title text-center" style="color: #17181A; font-family: 'Roboto'; font-size: 24px;">
                            INFORMASI
                        </h2>
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse ($informasi as $informasis)
                                <li>
                                    <h4 style="margin: 0 !important; font-size: 20px;" class="header-information">
                                        {{ $informasis->judul }} (
                                        <a href="#" data-id="{{ $informasis->informasi_id }}" class="detail-informasi"
                                            style="font-size: 16px;">Klik
                                            Disini</a> )
                                    </h4>
                                    <div class="footer-information">
                                        <h5 style="font-size: 14px; margin-top: 10px; color: red;" class="tgl-info">
                                            {{ $informasis->created_at }}</h5>
                                    </div>
                                </li>
                            @empty
                                Data tidak tersedia
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="informasi" tabindex="-1" role="dialog" aria-labelledby="informasiTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content relative">
                <div class="bg-spin" style="display: none;">
                    <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                        style="height: 3rem; object-fit: cover;" alt="" srcset="">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="informasiTitle">
                        INFORMASI
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

                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Tutup</span>
                    </button>
                    {{--  <button class="btn btn-green ml-1 simpan-kegiatan">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>  --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        li::marker {
            font-size: 25px !important;
            color: black;
        }

        .bg-spin {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 99;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #00000075;
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

        @media screen and (min-width: 750px) and (max-width: 1000px) {
            .target-h2 {
                font-size: 14px;
            }

            .target-periode {
                font-size: 11px !important;
            }
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/extensions/chart.js/Chart.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/ui-chartjs.js') }}"></script> --}}
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".detail-informasi").click(function() {
                $('#informasi').modal('show');

                $('#informasi .bg-spin').show();
                const id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: url('/informasi/' + id),
                    success: function(response) {
                        $('#informasi .modal-title').html(response[0].judul);
                        $('#informasi .bg-spin').hide();
                        $('#informasi .modal-body').html(response[0].deskripsi);
                    }
                })
            });
        })
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

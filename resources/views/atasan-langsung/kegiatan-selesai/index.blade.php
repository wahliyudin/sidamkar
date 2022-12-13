@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Table Data Aparatur Fungsional
                        </h4>
                    </div>
                    <div class="card-body" style="overflow-x: auto;">
                        <table class="table table-striped" id="fungsionals">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nomor Karpeg</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                    <th>Angka Kredit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fungsionals as $fungsional)
                                    <tr>
                                        <td>
                                            <a href=""
                                                style="color: #06152B;">{{ $fungsional->userAparatur->nama }}</a>
                                        </td>
                                        <td>
                                            {{ $fungsional->userAparatur->nomor_karpeg }}
                                        </td>
                                        <td>
                                            {{ $fungsional->role->display_name }}
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $fungsional->userAparatur->pangkatGolonganTmt?->nama }}
                                        </td>
                                        <td
                                            style="color: green !important; text-align: center; font-weight: 700 !important;">
                                            {{ $fungsional->laporan_kegiatan_jabatans_sum_score }}
                                        </td>
                                        <td>
                                            <a href="{{ route('atasan-langsung.kegiatan-selesai.show', $fungsional->id) }}"
                                                class="btn btn-primary btn-status px-3 text-sm">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <style>
        .dataTable>thead>tr>th {
            border: 0 !important;
        }

        .dataTable>tbody>tr>td {
            white-space: nowrap;
        }

        .dataTable th {
            color: #809FB8 !important;
            white-space: nowrap;
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

        @media screen and (max-width:450px) {
            .btn-tentukan-penetap {
                margin-bottom: 30px;
            }
        }

        .tambah-penetap,
        .tambah-penilai {
            padding: .06rem .32rem;
            border-radius: 50%;
            font-size: 14px;
        }

        .tambah-penilai {
            border: 2px solid #28d5e0;
            color: #28d5e0;
        }

        .tambah-penetap {
            border: 2px solid #0D6EF8;
            color: #0D6EF8;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#fungsionals').DataTable();
    </script>
@endsection

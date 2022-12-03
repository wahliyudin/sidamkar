@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penilai Angka Kredit Damkar
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penilaiPenetapDamkar?->penilaiAngkaKredit?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="tambah-penilai" data-bs-toggle="modal" data-bs-target="#tambahPenilai">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penetap Angka Kredit Damkar
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penilaiPenetapDamkar?->penetapAngkaKredit?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="tambah-penetap" data-bs-toggle="modal" data-bs-target="#tambahPenetap">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penilai Angka Kredit Analis
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penilaiPenetapAnalis?->penilaiAngkaKredit?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="tambah-penilai" data-bs-toggle="modal" data-bs-target="#tambahPenilai">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penetap Angka Kredit Analis
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penilaiPenetapAnalis?->penetapAngkaKredit?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="tambah-penetap" data-bs-toggle="modal" data-bs-target="#tambahPenetap">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <th>File Pernyataan</th>
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
                                        <td style="text-align: center;"><i class="fa-solid fa-file-lines "></i></td>
                                        <td
                                            style="color: green !important; text-align: center; font-weight: 700 !important;">
                                            {{ $fungsional->laporan_kegiatan_jabatans_sum_score }}
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-status px-3 text-sm">Kirim</button>
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


    <div class="modal fade" id="tentukan" tabindex="-1" role="dialog" aria-labelledby="tindakLanjutTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tentukan Penetap & Penilai</h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pilih Atasan Langsung</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pilih Penetap AK</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-danger px-5" data-bs-dismiss="modal">Batal</button>
                            <a class="btn btn-blue px-5">Kirim</a>
                        </div>
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

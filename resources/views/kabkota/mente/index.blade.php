@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-green">
                                <i class="fa-solid
                                fa-stopwatch"></i>
                            </div>
                            <div class="d-flex flex-column ms-2">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Periode
                                </p>
                                <h2 style="font-family: 'Roboto'; font-size: 16px; color: #06152B;" class="target">
                                    {{ Carbon\Carbon::make($periode->awal)->translatedFormat('F Y') . ' - ' . Carbon\Carbon::make($periode->akhir)->translatedFormat('F Y') }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-blue">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penilai AK
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penilai?->nama ?? '-' }}
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
            <div class="col-md-4 px-2">
                <div class="card">
                    <div class="card-body py-3 px-3" style="height: 80px;">
                        <div class="d-flex align-items-center h-100">
                            <div class="circle circle-purple">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Penetap AK
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penetap?->nama ?? '-' }}
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
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-7">
                                <h5>Tabel Data Aparatur</h5>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <a href="" class="btn-tambah-mente btn-sm" style="right: 0;" data-bs-toggle="modal"
                                    data-bs-target="#tambahMentee"><i class="fa-solid fa-user-group"></i> Tambah Mentee</a>
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

    <div class="modal fade" id="tambahMentee" tabindex="-1" role="dialog" aria-labelledby="tambahMenteeTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: #06152B;" class="modal-title" id="tambahMenteeTitle">
                        Tambah Mentee
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" class="mente-fungsional">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Atasan Langsung</label>
                                    <select class="choices form-select" name="atasan_langsung">
                                        <option disabled selected>Pilih Atasan</option>
                                        @foreach ($atasanLangsungs as $atasanLangsung)
                                            <option value="{{ $atasanLangsung->id }}">
                                                {{ $atasanLangsung->userPejabatStruktural->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card mt-3 mb-0"
                                    style="border: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color); overflow: hidden;">
                                    <div class="card-header py-3">
                                        <div class="row justify-content-between">
                                            <div class="col-md-3">
                                                <h5 style="color: #06152B;">Data Pejabat Fungsional</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped w-100" id="table-fungsional">
                                            <thead style="position: sticky; top: 0; color: black; background-color: white;">
                                                <tr>
                                                    <th>Pilih</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($fungsionals as $fungsional)
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" name="fungsionals[]"
                                                                type="checkbox" value="{{ $fungsional->id }}">
                                                        </td>
                                                        <td>{{ $fungsional->userAparatur?->nama }}</td>
                                                    </tr>
                                                @endforeach
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
                    <button type="button" class="btn btn-green ml-1 simpan-mente">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMentee" tabindex="-1" role="dialog" aria-labelledby="editMenteeTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: #06152B;" class="modal-title" id="editMenteeTitle">
                        Edit Mentee
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" class="mente-fungsional-edit">
                        <div class="form-group">
                            <label>Atasan Langsung</label>
                            <select class="choices form-select" name="atasan_langsung">
                                <option disabled selected>Pilih Atasan</option>
                                @foreach ($atasanLangsungs as $atasanLangsung)
                                    <option value="{{ $atasanLangsung->id }}">
                                        {{ $atasanLangsung->userPejabatStruktural?->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button type="button" class="btn btn-green ml-1 simpan-edit-mente">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahPenilai" tabindex="-1" role="dialog" aria-labelledby="tambahPenilaiTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPenilaiTitle">
                        Penilai AK
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Penilai AK</label>
                                    <select class="form-select" name="role_id">
                                        <option disabled selected>- Pilih Penilai -</option>
                                        @foreach ($penilais as $penilai)
                                            <option>{{ $penilai->userPejabatStruktural->nama }}</option>
                                        @endforeach
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
                    <button class="btn btn-green ml-1 simpan-penilai">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahPenetap" tabindex="-1" role="dialog" aria-labelledby="tambahPenetapTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPenetapTitle">
                        Penetap AK
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" class="container-unsur">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Penetap AK</label>
                                    <select class="form-select" name="role_id">
                                        <option disabled selected>- Pilih Penetap -</option>
                                        @foreach ($penetaps as $penetap)
                                            <option>{{ $penetap->userPejabatStruktural?->nama }}</option>
                                        @endforeach
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
                    <button class="btn btn-green ml-1 simpan-penetap">
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

        .btn-tambah-mente {
            background-color: #0D6EF8;
            padding: .5rem 1.5rem;
            border-radius: 50px;
            color: white;
        }

        .btn-tambah-mente:hover {
            color: white;
        }

        #editMentee .modal-content .bg-spin {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 99;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #00000075;
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
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    {{ $dataTable->scripts() }}
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/kabkota/mente.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
@endsection

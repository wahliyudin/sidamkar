@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-4 px-2">
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
                                        {{ $penilaiAndPenetap?->penilaiAngkaKreditDamkar?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="penilai-damkar" data-bs-toggle="modal" data-bs-target="#tambahPenilai">
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
                                    Penetap Angka Kredit Damkar
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penilaiAndPenetap?->penetapAngkaKreditDamkar?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="penetap-damkar" data-bs-toggle="modal" data-bs-target="#tambahPenetap">
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
        </div>
        <div class="row">
            <div class="col-md-4 px-2">
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
                                        {{ $penilaiAndPenetap?->penilaiAngkaKreditAnalis?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="penilai-analis" data-bs-toggle="modal" data-bs-target="#tambahPenilai">
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
                                    Penetap Angka Kredit Analis
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $penilaiAndPenetap?->penetapAngkaKreditAnalis?->userPejabatStruktural?->nama ?? '-' }}
                                    </h2>
                                    <button class="penetap-analis" data-bs-toggle="modal" data-bs-target="#tambahPenetap">
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
                            <div class="circle circle-green">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                <p style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                    Email Info Penetapan
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 style="font-family: 'Roboto';color: #06152B; font-size: 16px" class="target">
                                        {{ $user->userProvKabKota->email_info_penetapan ?? '-' }}
                                    </h2>
                                    <button class="btn-email" data-bs-toggle="modal" data-bs-target="#modalEmail">
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
                <div class="card overflow-auto">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-7">
                                <h5>Tabel Data Aparatur</h5>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <a href="" class="btn-tambah-mente btn-sm" style="right: 0;"
                                    data-bs-toggle="modal" data-bs-target="#tambahMentee"><i
                                        class="fa-solid fa-user-group"></i> Tambah Mentee</a>
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
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
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
                                            <thead
                                                style="position: sticky; top: 0; color: black; background-color: white;">
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
                        Penilai Angka Kredit
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" name="jenis_aparatur">
                        <input type="hidden" name="penilai_penetap" value="penilai">
                        <input type="hidden" name="kab_prov_penilai_penetap">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tingkat Penilai</label>
                                    <select class="form-select" name="tingkat">
                                        <option disabled selected>- Pilih Tingkat -</option>
                                        <option value="provinsi">Tingkat Provinsi</option>
                                        <option value="kab_kota">Tingkat Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Provinsi<span class="text-danger">*</span></label>
                                    <select name="provinsi_id" required class="form-select">
                                        <option selected disabled>- Pilih Provinsi -
                                        </option>
                                        @foreach ($provinsis as $provinsi)
                                            <option value="{{ $provinsi->id }}">
                                                {{ $provinsi->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 kabkota" style="display: none;">
                                <div class="form-group">
                                    <label>Kabupaten / Kota<span class="text-danger">*</span></label>
                                    <select required name="kab_kota_id" class="form-select">
                                        <option value="">- Pilih Provinsi Terlebih
                                            Dahulu -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Penilai Angka Kredit</label>
                                    <input type="hidden" name="penilai">
                                    <input type="text" name="penilai_ak" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button type="button" data-jenis="penilai" class="btn btn-green ml-1 simpan-penilai-penetap">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        Simpan
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
                        Penetap Angka Kredit
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" name="jenis_aparatur">
                        <input type="hidden" name="penilai_penetap" value="penetap">
                        <input type="hidden" name="kab_prov_penilai_penetap">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tingkat Penilai</label>
                                    <select class="form-select" name="tingkat">
                                        <option disabled selected>- Pilih Tingkat -</option>
                                        <option value="provinsi">Tingkat Provinsi</option>
                                        <option value="kab_kota">Tingkat Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Provinsi<span class="text-danger">*</span></label>
                                    <select name="provinsi_id" required class="form-select">
                                        <option selected disabled>- Pilih Provinsi -
                                        </option>
                                        @foreach ($provinsis as $provinsi)
                                            <option value="{{ $provinsi->id }}">
                                                {{ $provinsi->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 kabkota" style="display: none;">
                                <div class="form-group">
                                    <label>Kabupaten / Kota<span class="text-danger">*</span></label>
                                    <select required name="kab_kota_id" class="form-select">
                                        <option value="">- Pilih Provinsi Terlebih
                                            Dahulu -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Penetap Angka Kredit</label>
                                    <input type="hidden" name="penetap">
                                    <input type="text" name="penetap_ak" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button type="button" data-jenis="penetap" class="btn btn-green ml-1 simpan-penilai-penetap">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="modalEmailTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEmailTitle">
                        Email Info Penetapan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-email">
                        <div class="form-group">
                            <label for="email_penetapan">Email</label>
                            <input type="email" name="email_penetapan" id="email_penetapan" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button type="button" class="btn btn-green ml-1 simpan-email">
                        <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                            style="height: 25px; object-fit: cover;display: none;" alt="" srcset="">
                        Simpan
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

        .btn-email,
        .penetap-analis,
        .penilai-analis,
        .penilai-damkar,
        .penetap-damkar {
            padding: .06rem .32rem;
            border-radius: 50%;
            font-size: 14px;
        }

        .penilai-damkar,
        .penilai-analis {
            border: 2px solid #28d5e0;
            color: #28d5e0;
        }

        .penetap-damkar,
        .penetap-analis {
            border: 2px solid #0D6EF8;
            color: #0D6EF8;
        }

        .btn-email {
            border: 2px solid #1ad598;
            color: #1ad598;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    {{ $dataTable->scripts() }}
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/provinsi/mente.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('select[name="tingkat"]').change(function(e) {
                e.preventDefault();
                if ($(this).val() == 'kab_kota') {
                    $('.kabkota').show();
                } else {
                    $('.kabkota').hide();
                }
                $('select[name="provinsi_id"]').prop('selectedIndex', 0);
                $('select[name="kab_kota_id"]').prop('selectedIndex', 0);
            });
            $('select[name="provinsi_id"]').each(function(index, element) {
                $(element).change(function(e) {
                    e.preventDefault();
                    penilai_penetap = $($(element.parentElement.parentElement
                        .parentElement.parentElement).find(
                        'input[name="penilai_penetap"]')).val();
                    $('select[name="tingkat"]').each(function(index, element) {
                        if ($(element).val() == 'provinsi') {
                            $.ajax({
                                type: "POST",
                                url: url('/provinsi/data-mente/' + $(element)
                                    .val() +
                                    '/tingkat-provinsi'),
                                data: {
                                    'jenis_aparatur': $($(element.parentElement
                                        .parentElement
                                        .parentElement.parentElement).find(
                                        'input[name="jenis_aparatur"]')).val(),
                                    'penilai_penetap': penilai_penetap
                                },
                                dataType: "JSON",
                                success: function(response) {
                                    if (penilai_penetap == 'penilai') {
                                        $('#tambahPenilai input[name="kab_prov_penilai_penetap"]')
                                            .val(
                                                response.id);
                                        $('#tambahPenilai input[name="penilai_ak"]')
                                            .val(
                                                response.nama);
                                    }
                                    if (penilai_penetap == 'penetap') {
                                        $('#tambahPenetap input[name="kab_prov_penilai_penetap"]')
                                            .val(
                                                response.id);
                                        $('#tambahPenetap input[name="penetap_ak"]')
                                            .val(
                                                response.nama);
                                    }
                                },
                                error: ajaxError
                            });
                        }
                    });
                    loadKabKota(this.value, $(element.parentElement.parentElement.parentElement)
                        .find('select[name="kab_kota_id"]'))
                });
            });
            $('select[name="kab_kota_id"]').each(function(index, kab_kota) {
                $(kab_kota).change(function(e) {
                    e.preventDefault();
                    penilai_penetap = $($(kab_kota.parentElement.parentElement
                        .parentElement.parentElement).find(
                        'input[name="penilai_penetap"]')).val();
                    $('select[name="tingkat"]').each(function(index, element) {
                        if ($(element).val() == 'kab_kota') {
                            $.ajax({
                                type: "POST",
                                url: url('/provinsi/data-mente/' + $(kab_kota)
                                    .val() +
                                    '/tingkat-kabkota'),
                                data: {
                                    'jenis_aparatur': $($(element.parentElement
                                        .parentElement
                                        .parentElement.parentElement).find(
                                        'input[name="jenis_aparatur"]')).val(),
                                    'penilai_penetap': penilai_penetap
                                },
                                dataType: "JSON",
                                success: function(response) {
                                    if (penilai_penetap == 'penilai') {
                                        $('#tambahPenilai input[name="kab_prov_penilai_penetap"]')
                                            .val(
                                                response.id);
                                        $('#tambahPenilai input[name="penilai_ak"]')
                                            .val(
                                                response.nama);
                                    }
                                    if (penilai_penetap == 'penetap') {
                                        $('#tambahPenetap input[name="kab_prov_penilai_penetap"]')
                                            .val(
                                                response.id);
                                        $('#tambahPenetap input[name="penetap_ak"]')
                                            .val(
                                                response.nama);
                                    }
                                },
                                error: ajaxError
                            });
                        }
                    });
                });
            });
            $("#tambahPenilai").on('hide.bs.modal', function() {
                reset(this)
                $($(this).find('input[name="penilai_ak"]')).val('');
                $($(this).find('input[name="penilai"]')).val('');
            });
            $("#tambahPenetap").on('hide.bs.modal', function() {
                reset(this)
                $($(this).find('input[name="penetap_ak"]')).val('');
                $($(this).find('input[name="penetap"]')).val('');
            });

            function reset(element) {
                $($(element).find('input[name="jenis_aparatur"]')).val('');
                $($(element).find('select[name="tingkat"]')).prop('selectedIndex', 0);
                $($(element).find('select[name="provinsi_id"]')).prop('selectedIndex', 0);
                $($(element).find('select[name="kab_kota_id"]')).prop('selectedIndex', 0);
            }

            function loadKabKota(val, kabupaten, kabupaten_id = null) {
                return new Promise(resolve => {
                    $(kabupaten).html('<option value="">Memuat...</option>');
                    fetch('/api/kab-kota/' + val)
                        .then(res => res.json())
                        .then(res => {
                            $(kabupaten).html(
                                '<option selected disabled>- Pilih Kabupaten / Kota -</option>');
                            res.forEach(model => {
                                var selected = kabupaten_id == model.id ? 'selected=""' : '';
                                $(kabupaten).append('<option value="' + model.id + '" ' +
                                    selected + '>' + model.nama + '</option>');
                            })
                            resolve()
                        })
                })
            }

            $('.simpan-penilai-penetap').click(function(e) {
                e.preventDefault();
                swal({
                    title: "Simpan?",
                    type: "warning",
                    text: "Pastikan Data Yang Dipilih Sudah Benar!",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, simpan!",
                    cancelButtonText: "Batal",
                    reverseButtons: !0,
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return new Promise(function(resolve) {
                            $.ajax({
                                    type: 'POST',
                                    url: url(
                                        '/provinsi/data-mente/store-penilai-penetap'
                                    ),
                                    data: {
                                        "kab_prov_penilai_penetap": $(e.target)
                                            .data(
                                                'jenis') == 'penilai' ? $(
                                                '#tambahPenilai input[name="kab_prov_penilai_penetap"]'
                                            ).val() : $(
                                                '#tambahPenetap input[name="kab_prov_penilai_penetap"]'
                                            ).val(),
                                        "jenis_aparatur": $($(e.target.parentElement
                                                .parentElement).find(
                                                'input[name="jenis_aparatur"]'))
                                            .val()
                                    },
                                    dataType: 'JSON',
                                })
                                .done(function(myAjaxJsonResponse) {
                                    swal("Berhasil!", myAjaxJsonResponse.message,
                                            "success")
                                        .then(function() {
                                            location.reload();
                                        });
                                })
                                .fail(function(erordata) {
                                    if (erordata.status == 422) {
                                        swal('Warning!', erordata.responseJSON
                                            .message,
                                            'warning');
                                    } else {
                                        swal('Error!', erordata.responseJSON
                                            .message, 'error');
                                    }
                                })
                        })
                    },
                })
            });
            $('.simpan-email').click(function(e) {
                e.preventDefault();
                var postData = new FormData($(".form-email")[0]);
                swal({
                    title: "Simpan?",
                    type: "warning",
                    text: "Pastikan Data Yang Dimasukkan Sudah Benar!",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, simpan!",
                    cancelButtonText: "Batal",
                    reverseButtons: !0,
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return new Promise(function(resolve) {
                            $.ajax({
                                    type: 'POST',
                                    url: url(
                                        '/provinsi/data-mente/email-penetapan'
                                    ),
                                    processData: false,
                                    contentType: false,
                                    data: postData
                                })
                                .done(function(myAjaxJsonResponse) {
                                    swal("Berhasil!", myAjaxJsonResponse.message,
                                            "success")
                                        .then(function() {
                                            location.reload();
                                        });
                                })
                                .fail(function(erordata) {
                                    if (erordata.status == 422) {
                                        swal('Warning!', erordata.responseJSON
                                            .message,
                                            'warning');
                                    } else {
                                        swal('Error!', erordata.responseJSON
                                            .message, 'error');
                                    }
                                })
                        })
                    },
                })
            });
            var ajaxError = function(jqXHR, xhr, textStatus, errorThrow, exception) {
                if (jqXHR.status === 0) {
                    swal("Error!", 'Not connect.\n Verify Network.', "error");
                } else if (jqXHR.status == 400) {
                    swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
                } else if (jqXHR.status == 404) {
                    swal('Error!', 'Requested page not found. [404]', "error");
                } else if (jqXHR.status == 500) {
                    swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
                } else if (exception === 'parsererror') {
                    swal('Error!', 'Requested JSON parse failed.', "error");
                } else if (exception === 'timeout') {
                    swal('Error!', 'Time out error.', "error");
                } else if (exception === 'abort') {
                    swal('Error!', 'Ajax request aborted.', "error");
                } else if (jqXHR.status == 422) {
                    swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
                    $('input[name="penilai_ak"]').val('');
                    $('input[name="penetap_ak"]').val('');
                } else {
                    swal('Error!', jqXHR.responseText, "error");
                }
            };
        });
    </script>
@endsection

@extends('layouts.master')

@section('content')
    <section class="section">
        @if (!isset(Auth::user()->userPejabatStruktural?->tempat_lahir) ||
            !isset(Auth::user()->userPejabatStruktural?->tanggal_lahir) ||
            !isset(Auth::user()->userPejabatStruktural?->jenis_kelamin) ||
            !isset(Auth::user()->userPejabatStruktural?->nip) ||
            !isset(Auth::user()->userPejabatStruktural?->pendidikan_terakhir) ||
            !isset(Auth::user()->userPejabatStruktural?->file_ttd) ||
            !isset(Auth::user()->userPejabatStruktural?->jabatan_tmt) ||
            !isset(Auth::user()->userPejabatStruktural?->golongan_tmt) ||
            !isset(Auth::user()->userPejabatStruktural?->nomenklatur_perangkat_daerah_id))
            <div class="alert alert-danger" style="color: white;"><i class="fa-solid fa-circle-exclamation"></i> Harap
                Lengkapi Data Profile
            </div>
        @endif
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
                                <i class="fa-solid fafa fa-user"></i>
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
                                <i class="fa-solid fafa fa-user"></i>
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
                                <i class="fa-solid fafa fa-user"></i>
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
                                <i class="fa-solid fafa fa-user"></i>
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
            <div class="col-md-9 col order-lg-0 order-2">
                <div class="row flex columns">
                    @role(['atasan_langsung'])
                        <div class="col-md-12 order-md-0 order-2">
                            <div class="card overflow-auto">
                                <div class="card-header">
                                    <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">HISTORI PENGAJUAN
                                        REKAPITULASI
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="fungsionals">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Jabatan</th>
                                                <th>Golongan</th>
                                                <th>Angka Kredit</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endrole
                    @role(['penilai_ak_damkar', 'penilai_ak_analis'])
                        <div class="col-md-12 order-md-0 order-2">
                            <div class="card overflow-auto">
                                <div class="card-header">
                                    <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">HISTORI PENGAJUAN
                                        PENILAIAN
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table id="internal" class="table dataTable no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Jabatan</th>
                                                <th>Status Mekanisme</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endrole
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center" style="color: #17181A; font-family: 'Roboto';">
                            INFORMASI
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse ($informasi as $informasis)
                                <li>
                                    <p style="margin: 0 !important;"> {{ $informasis->judul }} ( <a href="#"
                                            data-id="{{ $informasis->informasi_id }}" class="detail-informasi">Klik
                                            Disini</a> )
                                    </p>
                                    <div class="footer-information">
                                        <p style="font-size: 9px; margin-top: 10px; color: red;">
                                            {{ $informasis->created_at }}</p>
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
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/extensions/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
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
            $('#fungsionals').dataTable().fnDestroy();
            table = $('#fungsionals').DataTable({
                responsive: true,
                // serverSide: true,
                // processing: true,
                show: false,
                searching: false,
                lengthChange: false,
                bPaginate: false,
                info: false,
                order: [
                    [5, 'desc']
                ],
                ajax: {
                    url: url('/struktural/atasan-langsung/histori'),
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan'
                    },
                    {
                        data: 'pangkat',
                        name: 'pangkat'
                    },
                    {
                        data: 'total',
                        name: 'angka_kredit'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                    },
                ],
            });
            $('#internal').dataTable().fnDestroy();
            table = $('#internal').DataTable({
                responsive: true,
                // serverSide: true,
                // processing: true,
                show: false,
                searching: false,
                lengthChange: false,
                bPaginate: false,
                info: false,
                order: [
                    [4, 'desc']
                ],
                ajax: {
                    url: url('/struktural/penilai_ak/histori'),
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'display_name',
                        name: 'jabatan'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        orderable: true,
                        searchable: true
                    },
                ],
            });
        });
    </script>
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/data-pejabat-struktural.js') }}"></script>
@endsection

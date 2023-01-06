@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Table Data Aparatur
                                Fungsional
                            </h4>
                        </div>
                        <form method="POST" action="{{ route('kemendagri.verifikasi-data.aparatur.export') }}"
                            class="d-flex flex-column form-export"
                            style="border: 1px solid #809FB8; padding: 10px; border-radius: 10px;">
                            @csrf
                            <div class="row gap-4">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tingkat Aparatur</label>
                                        <select required name="tingkat" class="form-select text-sm">
                                            <option value="provinsi">Provinsi</option>
                                            <option value="kab_kota">Kabupaten / Kota</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select name="provinsi_id" class="form-select text-sm">
                                            <option value=""> All </option>
                                            @foreach ($provinsis as $provinsi)
                                                <option value="{{ $provinsi->id }}">
                                                    {{ $provinsi->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kabupaten / Kota</label>
                                        <select required disabled name="kab_kota_id" class="form-select text-sm">
                                            <option value="">- Pilih Provinsi Terlebih
                                                Dahulu -</option>
                                            <option value=""> All </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row gap-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select name="jabatan_id" class="form-select text-sm">
                                            <option value="">All</option>
                                            @foreach ($jabatans as $jabatan)
                                                <option value="{{ $jabatan->id }}">{{ $jabatan->display_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pangkat/Golongan</label>
                                        <select name="pangkat_golongan" class="form-select text-sm">
                                            <option value="">All</option>
                                            @foreach ($pangkats as $pangkat)
                                                <option value="{{ $pangkat->id }}">{{ $pangkat->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="submit" class="btn btn-green ps-3"><i
                                            class="fa-solid fa-file-excel me-2"></i>
                                        Export Fungsional</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body overflow-auto">
                        {{-- <div class="row">
                            <div class="col-md-3 m-2">
                                <form method="POST"
                                    action="{{ route('kemendagri.verifikasi-data.aparatur.export.struktural') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-red ps-3"><i
                                            class="fa-solid fa-file-excel me-2"></i>
                                        Export Struktural</button>
                                </form>
                            </div>
                            <div class="col-md-3 m-2">
                                <form method="POST"
                                    action="{{ route('kemendagri.verifikasi-data.aparatur.export.umum') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary ps-3"><i
                                            class="fa-solid fa-file-excel me-2"></i>
                                        Export Fungsional UMUM</button>
                                </form>
                            </div>
                        </div> --}}
                        <table id="aparatur" class="table dataTable no-footer dtr-inline">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Provinsi</th>
                                    <th>Kab Kota</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Golongan</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aparatur/data-saya.css') }}">
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
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/kemendagri/verifikasi-data/aparatur.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $('select[name="provinsi_id"]').select2();
        $('select[name="kab_kota_id"]').select2();
        $('select[name="jabatan_id"]').select2();
        $('select[name="tingkat"]').select2();
        $('select[name="pangkat_golongan"]').select2();
        $('#aparatur').dataTable().fnDestroy();
        table = $('#aparatur').DataTable({
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: url('/kemendagri/verifikasi-data/aparatur/datatable'),
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
                    data: 'provinsi',
                    name: 'provinsi'
                },
                {
                    data: 'kab_kota',
                    name: 'kab_kota'
                },
                {
                    data: 'jabatan',
                    name: 'jabatan'
                },
                {
                    data: 'pangkat',
                    name: 'pangkat'
                }
            ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });

        $('select[name="tingkat"]').change(function(e) {
            e.preventDefault();
            if ($(this).val() == 'provinsi') {
                $('select[name="kab_kota_id"]').attr('disabled', true);
            } else {
                $('select[name="kab_kota_id"]').attr('disabled', false);
            }
        });

        $('select[name="provinsi_id"]').each(function(index, element) {
            $(element).change(function(e) {
                e.preventDefault();
                loadKabKota(this.value, $(element.parentElement.parentElement.parentElement)
                    .find('select[name="kab_kota_id"]'))
            });
        });

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
    </script>
@endsection

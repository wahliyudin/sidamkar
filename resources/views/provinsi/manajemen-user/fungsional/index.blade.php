@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card py-2 overflow-auto">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <h5 style="color: #06152B; font-size: 'Roboto';">Data Pejabat Fungsional</h5>
                    </div>
                </div>
                <form method="POST" action="{{ route('provinsi.manajemen-user.fungsional.export') }}"
                    class="d-flex flex-column form-export"
                    style="border: 1px solid #809FB8; padding: 10px; border-radius: 10px;">
                    @csrf
                    <div class="row gap-4">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-select text-sm">
                                    <option value=""> All </option>
                                    <option value="0">
                                        Menunggu</option>
                                    <option value="1">
                                        Verified</option>
                                    <option value="2">
                                        Ditolak</option>
                                </select>
                            </div>
                        </div>
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
                        <div class="col-md-2 d-flex align-items-center">
                            <button type="submit" class="btn btn-green ps-3"><i class="fa-solid fa-file-excel me-2"></i>
                                Export</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/provinsi/manajemen-user/fungsional/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <style>
        <style>.dataTable>thead>tr>th {
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

        tbody>tr>td:not(:nth-child(6)) {
            cursor: pointer;
        }

        tbody>tr>td,
        tbody>tr>th {
            white-space: nowrap;
        }

        tbody>tr:hover {
            background-color: rgb(250, 250, 250);
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    {{ $dataTable->scripts() }}
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/provinsi/manajemen-user/fungsional/index.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#User-table').on('click', 'tbody > tr > td:not(:nth-child(6))',
                function() {
                    const data = $($(this.parentElement).find('.username')).data('detail')

                    if (data != undefined) {
                        window.location.replace(url(
                            `/provinsi/manajemen-user/fungsional/${data}/show`
                        ));
                    } else {
                        alert('Data Tidak Ada')
                    }
                });
        });
    </script>
@endsection

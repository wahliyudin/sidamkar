@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card overflow-auto mb-3">
                    <div class="card-header">
                        <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Table Data Penetap AK</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="history">
                            <thead>
                                <tr>
                                    <th>Nama Penetap</th>
                                    <th>Periode</th>
                                    <th>Nama JF</th>
                                    <th>Tanggal TTD</th>
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
@section('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $('#history').dataTable().fnDestroy();
        table = $('#history').DataTable({
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: url('/kemendagri/histori-penetapan/datatable'),
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [{
                    data: 'nama_penetap',
                    name: 'nama_penetap'
                },
                {
                    data: 'periode',
                    name: 'periode'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'tgl_ttd',
                    name: 'tgl_ttd'
                }
            ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });
    </script>
@endsection

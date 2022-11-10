@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card py-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <h5 style="color: #06152B; font-size: 'Roboto';">Data Pejabat Struktural</h5>
                    </div>
                </div>
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

        tbody>tr>td:not(:nth-child(3)) {
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
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#pejabatstruktural-table').on('click', 'tbody > tr > td:not(:nth-child(1)):not(:nth-child(3))',
                function() {
                    window.location.replace(url(
                        `/kab-kota/verifikasi-aparatur/pejabat-struktural/${$($(this.parentElement).find('.username')).data('detail')}/show`
                    ));
                });
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            var table = $('#pejabatstruktural-table').DataTable();
            $('#pejabatstruktural-table thead tr').clone(true).appendTo('#pejabatstruktural-table thead');
            $('#pejabatstruktural-table thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                if (title == 'No' || title == '' || $(this).hasClass('sorting_disabled'))
                    $(this).html(' - ');
                else
                    $(this).html(
                        '<input type="text" class="form-control form-control-sm" placeholder="Cari ' +
                        title +
                        '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script> --}}
@endsection

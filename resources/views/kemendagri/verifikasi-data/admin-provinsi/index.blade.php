@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="card py-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <h5 style="color: #06152B; font-size: 'Roboto';">Data Admin Provinsi</h5>
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
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    {{ $dataTable->scripts() }}
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        function tolak(id) {
            swal({
                title: "Tolak?",
                text: "Masukan alasan kenapa ditolak!",
                type: "warning",
                input: 'text',
                inputPlaceholder: 'Catatan',
                showCancelButton: true,
                confirmButtonText: 'Ya, tolak!',
                cancelButtonText: "Batal",
                reverseButtons: true,
                showLoaderOnConfirm: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Catatan tidak boleh kosong!'
                    }
                },
                preConfirm: async (value) => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    return await $.ajax({
                        type: 'POST',
                        url: "{{ url('kemendagri/verifikasi-data/admin-provinsi') }}/" + id + "/reject",
                        data: {
                            _token: CSRF_TOKEN,
                            catatan: value
                        },
                        dataType: 'JSON'
                    });
                },
            }).then(function(e) {
                if (e.value.success == true) {
                    swal({type: 'success', title:'Berhasil', html:'Akun Dinyatakan <b style="font-weight: bold; color:red;">DITOLAK</b>'}).then(() => {
                        $('#adminprovinsi-table').DataTable().ajax
                            .reload()
                    });
                } else {
                    swal("Error!", e.value.message, "error");
                }
            })
        }

        function verifikasi(id) {
            swal({
                title: "Verifikasi?",
                text: "Harap Pastikan Dan Kemudian Verifikasi!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, verfikasi!",
                cancelButtonText: "Batal",
                reverseButtons: !0,
                showLoaderOnConfirm: true,
                preConfirm: async () => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    return await $.ajax({
                        type: 'POST',
                        url: "{{ url('kemendagri/verifikasi-data/admin-provinsi') }}/" + id +
                            "/verified",
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON'
                    });
                },
            }).then(function(e) {
                if (e.value.success == true) {
                    swal({type: 'success', title:'Berhasil', html:'Akun Berhasil <b style="font-weight: bold; color:green;">DIVERIFIKASI</b>'}).then(() => {
                        $('#adminprovinsi-table').DataTable().ajax
                            .reload()
                    });
                } else {
                    swal("Error!", e.value.message, "error");
                }
            }, function(dismiss) {
                return false;
            })
        }

        function hapus(id) {
            swal({
                title: "Hapus?",
                text: "Harap Pastikan Dan Kemudian Hapus!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                reverseButtons: !0,
                showLoaderOnConfirm: true,
                preConfirm: async () => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    return await $.ajax({
                        type: 'POST',
                        url: "{{ url('kemendagri/verifikasi-data/admin-provinsi') }}/" + id +
                            "/hapus",
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON'
                    });
                },
            }).then(function(e) {
                if (e.value.success == true) {
                    swal("Selesai!", e.value.message, "success").then(() => {
                        $('#adminprovinsi-table').DataTable().ajax
                            .reload()
                    });
                } else {
                    swal("Error!", e.value.message, "error");
                }
            }, function(dismiss) {
                return false;
            })
        }
    </script>
@endsection

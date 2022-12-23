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
            </div>
            <div class="card-body">
                <table id="penilai-kemndagri" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Pangkat</th>
                            <th>Jabatan</th>
                            <th>Status Mekanisme</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/kabkota/manajemen-user/fungsional/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $('#penilai-kemndagri').dataTable().fnDestroy();
        table = $('#penilai-kemndagri').DataTable({
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: url('/penilai-ak-kemendagri/data-pengajuan/datatable'),
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
                    data: 'pangkat',
                    name: 'pangkat'
                },
                {
                    data: 'jabatan',
                    name: 'jabatan'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.tolak', function(e) {
                e.preventDefault();
                $('#mekanisme' + $(this).data('id')).modal('hide');
                tolak($(this).data('id'))
            });
            $(document).on('click', '.revisi', function(e) {
                e.preventDefault();
                $('#mekanisme' + $(this).data('id')).modal('hide');
                revisi($(this).data('id'), $(this).data('user'))
            });
            $(document).on('click', '.verifikasi', function(e) {
                e.preventDefault();
                verifikasi($(this).data('id'));
            });

            function tolak(user_id, current_date) {
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
                        return new Promise(function(resolve) {
                            $.ajax({
                                    type: 'POST',
                                    url: url("/penilai-ak-kemendagri/data-pengajuan/" +
                                        user_id +
                                        "/tolak"),
                                    data: {
                                        catatan: value
                                    },
                                    dataType: 'JSON'
                                })
                                .done(function(myAjaxJsonResponse) {
                                    swal("Berhasil!", myAjaxJsonResponse.message, "success")
                                        .then(function() {
                                            location.reload();
                                        });
                                })
                                .fail(function(erordata) {
                                    if (erordata.status == 422) {
                                        swal('Warning!', erordata.responseJSON?.message,
                                            'warning');
                                    } else if (erordata.status == 404) {
                                        swal('Warning!', 'Data tidak ditemukan',
                                            'warning');
                                    } else {
                                        swal('Error!', erordata.responseJSON?.message,
                                            'error');
                                    }
                                })
                        })
                    },
                })
            }

            function revisi(user_id, current_date) {
                swal({
                    title: "Revisi?",
                    text: "Masukan alasan kenapa harus direvisi!",
                    type: "warning",
                    input: 'textarea',
                    inputPlaceholder: 'Catatan',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Revisi!',
                    cancelButtonText: "Batal",
                    reverseButtons: true,
                    showLoaderOnConfirm: true,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Catatan tidak boleh kosong!'
                        }
                    },
                    preConfirm: async (value) => {
                        return new Promise(function(resolve) {
                            $.ajax({
                                    type: 'POST',
                                    url: url("/penilai-ak-kemendagri/data-pengajuan/" +
                                        user_id +
                                        "/revisi"),
                                    data: {
                                        catatan: value
                                    },
                                    dataType: 'JSON'
                                })
                                .done(function(myAjaxJsonResponse) {
                                    swal("Berhasil!", myAjaxJsonResponse?.message,
                                            "success")
                                        .then(function() {
                                            location.reload();
                                        });
                                })
                                .fail(function(erordata) {
                                    if (erordata.status == 422) {
                                        swal('Warning!', erordata.responseJSON?.message,
                                            'warning');
                                    } else if (erordata.status == 404) {
                                        swal('Warning!', 'Data tidak ditemukan',
                                            'warning');
                                    } else {
                                        swal('Error!', erordata.responseJSON?.message,
                                            'error');
                                    }
                                })
                        })
                    },
                })
            }

            function verifikasi(user_id, current_date) {
                swal({
                    title: "Verifikasi?",
                    text: "Pastikan Data Yang Dicek Sudah Benar!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, verfikasi!",
                    cancelButtonText: "Batal",
                    reverseButtons: !0,
                    showLoaderOnConfirm: true,
                    preConfirm: async () => {
                        return new Promise(function(resolve) {
                            $.ajax({
                                    type: 'POST',
                                    url: url("/penilai-ak-kemendagri/data-pengajuan/" +
                                        user_id +
                                        "/verifikasi"),
                                    dataType: 'JSON'
                                })
                                .done(function(myAjaxJsonResponse) {
                                    swal("Berhasil!", myAjaxJsonResponse?.message,
                                            "success")
                                        .then(function() {
                                            location.reload();
                                        });
                                })
                                .fail(function(erordata) {
                                    if (erordata.status == 422) {
                                        swal('Warning!', erordata.responseJSON?.message,
                                            'warning');
                                    } else if (erordata.status == 404) {
                                        swal('Warning!', 'Data tidak ditemukan',
                                            'warning');
                                    } else {
                                        swal('Error!', erordata.responseJSON?.message,
                                            'error');
                                    }
                                })
                        })
                    },
                })
            }
        });
    </script>
@endsection

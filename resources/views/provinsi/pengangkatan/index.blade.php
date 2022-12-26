@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="row">
                <div class="col-md-12 px-2">
                    <div class="card overflow-auto mb-3">
                        <div class="card-header">
                            <h4 class="card-title" style="color: #17181A; font-family: 'Roboto';">Table Data Penetap AK</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="pengangkatan">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Periode</th>
                                        <th>Jabatan</th>
                                        <th>Status Pengangkatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <style>
        @media screen and (max-width:750px) {

            .card .card-body {
                padding: 1rem 2rem !important;
            }
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $('#pengangkatan').dataTable().fnDestroy();
        table = $('#pengangkatan').DataTable({
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: url('/provinsi/pengangkatan/datatable'),
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
                    data: 'periode',
                    name: 'periode'
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.verifikasi', function(e) {
            e.preventDefault();
            span = $(this).find('span');
            spin = $(this).find('.spin');
            $(span).hide();
            $(spin).show();
            $.ajax({
                type: 'POST',
                url: url('/provinsi/pengangkatan/' + $(this).data('data') + '/verifikasi'),
                data: {
                    "penetapan": $(this).data('penetapan')
                },
                dataType: 'JSON',
                success: function(response) {
                    $(span).show();
                    $(spin).hide();
                    swal("Selesai!", response.message, "success").then(() => {
                        location.reload();
                    });
                },
                error: ajaxError
            });
        });
        $(document).on('click', '.tolak', function(e) {
            e.preventDefault();
            penetapan = $(this).data('penetapan');
            span = $(this).find('span');
            spin = $(this).find('.spin');
            $(span).hide();
            $(spin).show();
            swal({
                title: "Pastikan Keputusan Anda Benar?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, Benar!",
                cancelButtonText: "Batal",
                reverseButtons: !0,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return new Promise(function(resolve) {
                        $.ajax({
                                type: 'POST',
                                url: url('/provinsi/pengangkatan/tolak'),
                                data: {
                                    "penetapan": penetapan
                                },
                                dataType: "JSON"
                            })
                            .done(function(myAjaxJsonResponse) {
                                swal("Berhasil!", myAjaxJsonResponse.message, "success")
                                    .then(function() {
                                        location.reload();
                                    });
                            })
                            .fail(function(erordata) {
                                if (erordata.status == 422) {
                                    swal('Warning!', erordata.responseJSON.message,
                                        'warning');
                                } else {
                                    swal('Error!', erordata.responseJSON.message, 'error');
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
            } else {
                swal('Error!', jqXHR.responseText, "error");
            }
            $('.verifikasi span').show();
            $('.verifikasi .spin').hide();
        };
    </script>
@endsection

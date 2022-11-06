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
                                <h2 style="font-family: 'Roboto'; font-size: 16px; color: #06152B;" class="target">Januari
                                    2022 - Juli 2022</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card py-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <h5 style="color: #06152B; font-size: 'Roboto';">Data Periode</h5>
                    </div>
                    <div class="col-md-4 col-12 d-flex justify-content-end">
                        <button class="btn btn-blue btn-sm px-3" data-bs-toggle="modal" data-bs-target="#periodeModal"><i
                                class="fa-regular fa-calendar-days"></i> Tambah
                            Periode</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
    <div class="modal fade" id="periodeModal" tabindex="-1" aria-labelledby="periodeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="periodeModalLabel">Tambah Periode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="post" class="form-periode">
                        <div class="form-group">
                            <label>Awal</label>
                            <input class="form-control" type="date" name="awal">
                        </div>
                        <div class="form-group">
                            <label>Akhir</label>
                            <input class="form-control" type="date" name="akhir">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success simpan-periode">
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
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.simpan-periode').click(function(e) {
                e.preventDefault();
                var postData = new FormData($(".form-periode")[0]);
                $('.simpan-periode span').hide();
                $('.simpan-periode .spin').show();
                $.ajax({
                    type: 'POST',
                    url: url("/kemendagri/cms/periode/store"),
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $('.simpan-periode span').show();
                        $('.simpan-periode .spin').hide();
                        if (response.status == 200) {
                            swal("Selesai!", response.message, "success").then(() => {
                                location.reload()
                            });
                        } else {
                            swal("Error!", response.message, "error");
                        }
                    },
                    error: ajaxError
                });
            });
            var ajaxError = function(jqXHR, xhr, textStatus, errorThrow, exception) {
                if (jqXHR.status === 0) {
                    swal("Error!", 'Not connect.\n Verify Network.', "error");
                    $('.simpan-periode span').show();
                    $('.simpan-periode .spin').hide();
                } else if (jqXHR.status == 400) {
                    swal("Peringatan!", jqXHR['responseJSON'].message, "warning");
                    $('.simpan-periode span').show();
                    $('.simpan-periode .spin').hide();
                } else if (jqXHR.status == 404) {
                    swal('Error!', 'Requested page not found. [404]', "error");
                    $('.simpan-periode span').show();
                    $('.simpan-periode .spin').hide();
                } else if (jqXHR.status == 500) {
                    swal('Error!', 'Internal Server Error [500].' + jqXHR['responseJSON'].message, "error");
                    $('.simpan-periode span').show();
                    $('.simpan-periode .spin').hide();
                } else if (exception === 'parsererror') {
                    swal('Error!', 'Requested JSON parse failed.', "error");
                    $('.simpan-periode span').show();
                    $('.simpan-periode .spin').hide();
                } else if (exception === 'timeout') {
                    swal('Error!', 'Time out error.', "error");
                    $('.simpan-periode span').show();
                    $('.simpan-periode .spin').hide();
                } else if (exception === 'abort') {
                    swal('Error!', 'Ajax request aborted.', "error");
                    $('.simpan-periode span').show();
                    $('.simpan-periode .spin').hide();
                } else if (jqXHR.status == 422) {
                    swal('Warning!', JSON.parse(jqXHR.responseText).message, "warning");
                    $('.simpan-periode span').show();
                    $('.simpan-periode .spin').hide();
                } else {
                    swal('Error!', jqXHR.responseText, "error");
                    $('.simpan-periode span').show();
                    $('.simpan-periode .spin').hide();
                }
            };
        });
    </script>
@endsection

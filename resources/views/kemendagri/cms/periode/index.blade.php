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
                                <h2 style="font-family: 'Roboto'; font-size: 16px; color: #06152B;" class="target">
                                    {{ $periode != null ? Carbon\Carbon::make($periode->awal)->translatedFormat('F Y') . ' - ' . Carbon\Carbon::make($periode->akhir)->translatedFormat('F Y') : '-' }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card py-2 overflow-auto">
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
            <div class="card-body overflow-auto">
                <table id="periode" class="table dataTable no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th>Awal</th>
                            <th>Akhir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
                            <input class="form-control" min="{{ $min }}" type="date" name="awal">
                        </div>
                        <div class="form-group">
                            <label>Akhir</label>
                            <input class="form-control" type="date" min="{{ $min }}" name="akhir">
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

        .wrapper {
            padding: 10px;
        }

        .input_wrapper {
            width: 70px;
            height: 40px;
            position: relative;
            cursor: pointer;
        }

        .input_wrapper .switch {
            width: 70px;
            height: 30px;
            cursor: pointer;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: #e74c3c;
            border-radius: 50px;
            position: relative;
            outline: 0;
            -webkit-transition: all .2s;
            transition: all .2s;
        }

        .input_wrapper input[type="checkbox"]:after {
            position: absolute;
            content: "";
            top: 3px;
            left: 3px;
            width: 24px;
            height: 24px;
            background: #dfeaec;
            z-index: 2;
            border-radius: 50px;
            -webkit-transition: all .35s;
            transition: all .35s;
        }

        .input_wrapper svg {
            position: absolute;
            top: 30%;
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            fill: #fff;
            -webkit-transition: all .35s;
            transition: all .35s;
            z-index: 1;
        }

        .input_wrapper .is_checked {
            width: 15px;
            left: 12%;
            -webkit-transform: translateX(190%) translateY(-30%) scale(0);
            transform: translateX(190%) translateY(-30%) scale(0);
        }

        .input_wrapper .is_unchecked {
            width: 15px;
            right: 12%;
            -webkit-transform: translateX(0) translateY(-30%) scale(1);
            transform: translateX(0) translateY(-30%) scale(1);
        }

        .input_wrapper .switch:checked {
            background: #2ecc71;
        }

        .input_wrapper .switch:checked:after {
            left: calc(100% - 28px);
        }

        .input_wrapper .switch:checked+.is_checked {
            -webkit-transform: translateX(0) translateY(-30%) scale(1);
            transform: translateX(0) translateY(-30%) scale(1);
        }

        .input_wrapper .switch:checked~.is_unchecked {
            -webkit-transform: translateX(-190%) translateY(-30%) scale(0);
            transform: translateX(-190%) translateY(-30%) scale(0);
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    {{-- {{ $dataTable->scripts() }} --}}
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
            $('#periode').dataTable().fnDestroy();
            table = $('#periode').DataTable({
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: {
                    url: url('/kemendagri/cms/periode/datatable'),
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: 'awal',
                        name: 'awal'
                    },
                    {
                        data: 'akhir',
                        name: 'akhir'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                pageLength: 10,
                lengthMenu: [
                    [10, 20, 50, -1],
                    [10, 20, 50, 'All']
                ]
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

            $(document).on('click', '.switch-periode', function() {
                is_active = $(this).is(':checked');
                $.ajax({
                    type: 'POST',
                    url: url("/kemendagri/cms/periode/" + $(this).data('periode') + "/switch"),
                    data: {
                        is_active: is_active
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.simpan-periode span').show();
                        $('.simpan-periode .spin').hide();
                        swal("Selesai!", response.message, "success").then(() => {
                            location.reload()
                        });
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

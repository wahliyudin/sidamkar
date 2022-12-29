@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i class="fa-solid fafa
                                        fa-stopwatch"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-2">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Periode
                                        </p>
                                        <h2 style="font-family: 'Roboto'; font-size: 13px; color: #06152B;" class="target">
                                            {{ $periode != null ? Carbon\Carbon::make($periode->awal)->translatedFormat('F Y') . ' - ' . Carbon\Carbon::make($periode->akhir)->translatedFormat('F Y') : '-' }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-3 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i class="fa-solid fa-envelope fafa"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-2" style="flex-grow: 1;">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Email Info Penetapan
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 style="font-family: 'Roboto';color: #06152B; font-size: 14px"
                                                class="target">
                                                {{ $kemendagri->userKemendagri->email_info_penetapan ?? '-' }}
                                            </h2>
                                            <button class="btn-email" data-bs-toggle="modal" data-bs-target="#modalEmail">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3 "style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-group"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Jumlah Aparatur
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['aparatur'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-large"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pejabat Struktural
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['struktural'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3 ">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-regular fafa fa-user"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Fungsional Damkar
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['damkar'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-blue">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-tie"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Fungsional Analisis
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['analisis'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-gear"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            User Admin Kab/Kota
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['kab_kota'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-blue">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-user-pen"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            User Admin Provinsi
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['provinsi'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-green">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-users"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pengajuan Akun Kab/Kota
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['pengajuan_kab_kota'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 px-2">
                        <div class="card mb-3">
                            <div class="card-body py-2 px-3" style="height: 80px;">
                                <div class="d-flex align-items-center h-100">
                                    <div class="circle circle-yellow">
                                        <i style="font-size: 20px;" class="fa-solid fafa fa-users-between-lines"></i>
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <p
                                            style="margin: 0 !important; color: #809FB8; font-family: 'Roboto'; font-size: 14px;">
                                            Pengajuan Akun Provinsi
                                        </p>
                                        <h4 style="font-family: 'Roboto';color: #06152B;" class="target">
                                            {{ $total['pengajuan_provinsi'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="modalEmailTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEmailTitle">
                        Email Info Penetapan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-email">
                        <div class="form-group">
                            <label for="email_penetapan">Email</label>
                            <input type="email" name="email_penetapan" id="email_penetapan" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <button type="button" class="btn btn-green ml-1 simpan-email">
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
    <style>
        @media screen and (max-width:750px) {
            .informasi-wrapper {
                padding: 0 !important;
            }

            .card .card-body {
                padding: 1rem 2rem !important;
            }
        }

        .btn-email {
            padding: .06rem .32rem;
            border-radius: 50%;
            font-size: 14px;
        }

        .btn-email {
            border: 2px solid #1ad598;
            color: #1ad598;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.simpan-email').click(function(e) {
            e.preventDefault();
            var postData = new FormData($(".form-email")[0]);
            swal({
                title: "Simpan?",
                type: "warning",
                text: "Pastikan Data Yang Dimasukkan Sudah Benar!",
                showCancelButton: !0,
                confirmButtonText: "Ya, simpan!",
                cancelButtonText: "Batal",
                reverseButtons: !0,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return new Promise(function(resolve) {
                        $.ajax({
                                type: 'POST',
                                url: url(
                                    '/kemendagri/email-penetapan'
                                ),
                                processData: false,
                                contentType: false,
                                data: postData
                            })
                            .done(function(myAjaxJsonResponse) {
                                swal("Berhasil!", myAjaxJsonResponse.message,
                                        "success")
                                    .then(function() {
                                        location.reload();
                                    });
                            })
                            .fail(function(erordata) {
                                if (erordata.status == 422) {
                                    swal('Warning!', erordata.responseJSON
                                        .message,
                                        'warning');
                                } else {
                                    swal('Error!', erordata.responseJSON
                                        .message, 'error');
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
                $('input[name="penilai_ak"]').val('');
                $('input[name="penetap_ak"]').val('');
            } else {
                swal('Error!', jqXHR.responseText, "error");
            }
        };
    </script>
@endsection

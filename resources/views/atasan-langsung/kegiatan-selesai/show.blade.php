@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Laporan/Dokumen {{ $user?->userAparatur->nama }}</h4>
                        <div class="d-flex align-items-center">
                            <button data-id="{{ $user?->id }}"
                                class="btn {{ in_array($rekapitulasiKegiatan->is_send, [2, 3]) || $rekapitulasiKegiatan->is_ttd_atasan_langsung == true ? 'disabled' : '' }} btn-blue me-3 ps-3 pe-4 text-sm ttd">
                                <img class="spin" src="{{ asset('assets/images/template/spinner.gif') }}"
                                    style="height: 25px; margin-left: 10px; object-fit: cover;display: none;" alt=""
                                    srcset="">
                                <i class="fa-solid fa-pen-clip me-2 icon"></i>
                                <span>TTD</span>
                            </button>
                            <button data-id="{{ $user?->id }}"
                                class="btn btn-green btn-sm ps-3 {{ in_array($rekapitulasiKegiatan->is_send, [2, 3]) || $rekapitulasiKegiatan->is_ttd_atasan_langsung == false ? 'disabled' : '' }} pe-4 text-sm send-to-penilai">
                                <i class="fa-solid fa-paper-plane me-2"></i>Kirim Dokumen Ke
                                Penilai</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="page-content">
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <div class="content pt-0">
                                        <div class="card mb-0 overflow-hidden"
                                            style="border-radius: 10px; position: relative;">
                                            <ul class="nav nav-tabs nav-justified bg-light rounded-top mb-0">
                                                <li class="nav-item">
                                                    <a href="#surat-tab1"
                                                        class="h-100 nav-link border-y-0 border-left-0 active d-flex justify-content-center align-items-center"
                                                        data-toggle="tab" data-id="surat-tab1">
                                                        <h6 class="my-1">Rekapitulasi Capaian</h6>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#surat-tab2"
                                                        class="h-100 nav-link border-y-0 border-right-0 d-flex justify-content-center align-items-center"
                                                        data-toggle="tab" data-id="surat-tab2">
                                                        <h6 class="my-1">Pernyataan</h6>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#surat-tab3"
                                                        class="h-100 nav-link border-y-0 border-left-0 d-flex justify-content-center align-items-center"
                                                        data-toggle="tab" data-id="surat-tab3">
                                                        <h6 class="my-1">Pengembangan & Penunjang</h6>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content mt-2">
                                                <div class="tab-pane fade show active" id="surat-tab1">
                                                    <div class="card">
                                                        <div class="card-body px-0">
                                                            <iframe src="{{ $rekapitulasiKegiatan?->link_rekap_capaian }}"
                                                                style="border-radius: 10px; overflow: hidden;"
                                                                width="100%" height="500px"></iframe>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="surat-tab2">
                                                    <div class="card">
                                                        <div class="card-body px-0">
                                                            <iframe src="{{ $rekapitulasiKegiatan?->link_pernyataan }}"
                                                                style="border-radius: 10px; overflow: hidden;"
                                                                width="100%" height="500px"></iframe>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="surat-tab3">
                                                    <div class="card">
                                                        <div class="card-body px-0">
                                                            <iframe src="{{ $rekapitulasiKegiatan?->link_pengembang }}"
                                                                style="border-radius: 10px; overflow: hidden;"
                                                                width="100%" height="500px"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/auth/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/sweetalert2.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/auth/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .my-1 {
            color: white
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: rgba(234, 58, 61, 0.9);
            border-color: #ddd #ddd #fff;
        }

        .nav-tabs .nav-link.active:after {
            background-color: transparent;
        }

        .nav-item,
        .nav-tabs {
            border-radius: 0 !important;
        }

        .nav-item:not(:first-child) {
            margin-left: 1rem;
        }

        @media screen and (max-width: 750px) {
            .nav-item a h6 {
                font-size: 14px !important;
            }

            .nav-item .nav-link {
                padding: 7px 7px !important;
            }
        }

        .nav-tabs .nav-link {
            background-color: rgba(234, 58, 61, 0.5);
            color: white;
        }

        .nav-tabs .nav-link:hover {
            color: white;
        }

        .bg-spin {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #00000056;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/forms/wizards/steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/form_wizard.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/fontawesome/all.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.ttd').click(function(e) {
            e.preventDefault();
            $('.spin').show();
            $('.ttd .icon').hide();
            $('.ttd span').hide();
            $.ajax({
                type: "POST",
                url: url('/atasan-langsung/kegiatan-selesai/' + $(this).data('id') + '/ttd'),
                dataType: "JSON",
                success: function(response) {
                    $('.spin').hide();
                    $('.ttd .icon').show();
                    $('.ttd span').show();
                    swal({
                        type: 'success',
                        title: 'Berhasil',
                        html: 'Berhasil Ditanda Tangan'
                    }).then(() => {
                        location.reload()
                    });
                },
                error: ajaxError
            });
        });
        $('.send-to-penilai').click(function(e) {
            e.preventDefault();
            swal({
                title: "Kirim Ke Penilai?",
                text: "Harap Pastikan Dan Kemudian Kirim Ke Penilai!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, Kirim!",
                cancelButtonText: "Batal",
                reverseButtons: !0,
                showLoaderOnConfirm: true,
                preConfirm: async () => {
                    return await $.ajax({
                        type: "POST",
                        url: url('/atasan-langsung/kegiatan-selesai/' + $(this).data('id') +
                            '/send-to-penilai'),
                        dataType: "JSON",
                    });
                },
            }).then(function(e) {
                if (e.value.success == 200) {
                    swal({
                        type: 'success',
                        title: 'Berhasil',
                        html: 'Dokumen Berhasil Dikirim Ke Penilai'
                    }).then(() => {
                        location.reload()
                    });
                } else {
                    swal("Error!", e.value.message, "error");
                }
            }, function(dismiss) {
                return false;
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
            $('.bg-spin').hide();
            $('.spin').hide();
            $('.ttd .icon').show();
            $('.ttd span').show();
        };
    </script>
@endsection

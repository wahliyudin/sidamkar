@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>Laporan/Dokumen Iqbal Ramadhan</h3>
                    </div>
                    <div class="card-body">
                        <div class="page-content">
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <div class="content pt-0">
                                        <!-- Content area -->
                                        <!-- Login form -->
                                        <div class="card mb-0 overflow-hidden"
                                            style="border-radius: 10px; position: relative;">
                                            <ul class="nav nav-tabs nav-justified bg-light rounded-top mb-0">
                                                <li class="nav-item">
                                                    <a href="#login-tab1"
                                                        class="h-100 nav-link border-y-0 border-left-0 active d-flex justify-content-center align-items-center"
                                                        data-toggle="tab" data-id="login-tab1">
                                                        <h6 class="my-1">Rekapitulasi Capaian</h6>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#login-tab2"
                                                        class="h-100 nav-link border-y-0 border-right-0 d-flex justify-content-center align-items-center"
                                                        data-toggle="tab" data-id="login-tab2">
                                                        <h6 class="my-1">Penilaian Capaian</h6>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#login-tab3"
                                                        class="h-100 nav-link border-y-0 border-left-0 d-flex justify-content-center align-items-center"
                                                        data-toggle="tab" data-id="login-tab3">
                                                        <h6 class="my-1">Pengembangan & Penunjang</h6>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#login-tab4"
                                                        class="h-100 nav-link border-y-0 border-left-0 d-flex justify-content-center align-items-center"
                                                        data-toggle="tab" data-id="login-tab4">
                                                        <h6 class="my-1">Penetapan Angka Kredit</h6>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="login-tab1">
                                                    <!-- Wizard with validation -->
                                                    <div class="header-wizard-form">
                                                        <form class="wizard-form steps-validation" method="POST">
                                                            <h1>Hello</h1>
                                                        </form>
                                                    </div>
                                                    <!-- /wizard with validation -->
                                                </div>

                                                <div class="tab-pane fade" id="login-tab2">
                                                    <!-- Wizard with validation -->
                                                    <div class="header-wizard-form">
                                                        <form class="wizard-form steps-validation" method="POST">
                                                            <h1>Hi</h1>
                                                        </form>
                                                    </div>
                                                    <!-- /wizard with validation -->
                                                </div>

                                                <div class="tab-pane fade" id="login-tab3">
                                                    <!-- Wizard with validation -->
                                                    <div class="header-wizard-form">
                                                        <form class="wizard-form steps-validation" method="POST">
                                                            <h1>Hi</h1>
                                                        </form>
                                                    </div>
                                                    <!-- /wizard with validation -->
                                                </div>

                                                <div class="tab-pane fade" id="login-tab4">
                                                    <!-- Wizard with validation -->
                                                    <div class="header-wizard-form">
                                                        <form class="wizard-form steps-validation" method="POST">
                                                            <h1>Hi</h1>
                                                        </form>
                                                    </div>
                                                    <!-- /wizard with validation -->
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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/auth/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/register.css') }}">
    <style>
        .my-1 {
            color: white
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/forms/wizards/steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/form_wizard.js') }}"></script>
    <script src="{{ asset('assets/extensions/fontawesome/all.min.js') }}"></script>
@endsection

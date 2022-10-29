@extends('layouts.master')

@section('content')
    <ul class="nav nav-tabs nav-justified bg-light rounded-top mb-0">
        <li class="nav-item">
            <a href="#login-tab1"
                class="h-100 nav-link border-y-0 border-left-0 active d-flex justify-content-center align-items-center"
                data-toggle="tab">
                <h6 class="my-1">Daftar Aparatur</h6>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="login-tab1">
            <!-- Wizard with validation -->
            <div class="header-wizard-form">
                <form class="wizard-form steps-validation" method="POST" action="{{ route('register') }}" data-fouc>
                    @csrf

                    <h6>Admin Level</h6>
                    <fieldset>

                    </fieldset>

                    <h6>Personal Data</h6>
                    <fieldset>

                    </fieldset>

                    <h6>Akses Login</h6>
                    <fieldset>

                    </fieldset>
                </form>
            </div>
            <!-- /wizard with validation -->
        </div>
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/css/auth/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .wizard-form[data-fouc] {
            opacity: 0
        }

        .wizard-form[data-fouc].wizard {
            opacity: 1
        }

        .wizard-form[data-fouc]:not(.wizard) {
            padding-top: 6.875rem;
            padding-bottom: 3.625rem
        }

        .wizard-form[data-fouc]:not(.wizard) fieldset:not(:first-of-type),
        .wizard-form[data-fouc]:not(.wizard) h6 {
            display: none
        }

        .wizard {
            width: 100%
        }

        .wizard>.content>.title,
        .wizard>.steps .current-info {
            display: none
        }

        .wizard>.content {
            position: relative;
            width: auto;
            padding: 0
        }

        .wizard>.content>.body {
            padding: 0 1.25rem
        }

        .wizard>.content>iframe {
            border: 0;
            width: 100%;
            height: 100%
        }

        .wizard>.steps {
            position: relative;
            display: block;
            width: 100%
        }

        .wizard>.steps>ul {
            display: table;
            width: 100%;
            table-layout: fixed;
            margin: 0;
            padding: 0;
            list-style: none
        }

        .wizard>.steps>ul>li {
            display: table-cell;
            width: auto;
            vertical-align: top;
            text-align: center;
            position: relative
        }

        .wizard>.steps>ul>li a {
            position: relative;
            padding-top: 3rem;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            display: block;
            outline: 0;
            color: #999
        }

        .wizard>.steps>ul>li:after,
        .wizard>.steps>ul>li:before {
            content: '';
            display: block;
            position: absolute;
            top: 2.375rem;
            width: 50%;
            height: 2px;
            background-color: #2cbacc;
            z-index: 9
        }

        .wizard>.steps>ul>li:before {
            left: 0
        }

        .wizard>.steps>ul>li:after {
            right: 0
        }

        .wizard>.steps>ul>li:first-child:before,
        .wizard>.steps>ul>li:last-child:after {
            content: none
        }

        .wizard>.steps>ul>li.current:after,
        .wizard>.steps>ul>li.current~li:after,
        .wizard>.steps>ul>li.current~li:before {
            background-color: #eee
        }

        .wizard>.steps>ul>li.current>a {
            color: #333;
            cursor: default
        }

        .wizard>.steps>ul>li.current .number {
            font-size: 0;
            border-color: #2cbacc;
            color: #2cbacc
        }

        .wizard>.steps>ul>li.current .number:after {
            content: "";
            font-family: icomoon;
            display: inline-block;
            font-size: 1rem;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            transition: all ease-in-out .15s
        }

        @media (prefers-reduced-motion:reduce) {
            .wizard>.steps>ul>li.current .number:after {
                transition: none
            }
        }

        .wizard>.steps>ul>li.disabled a {
            cursor: default
        }

        .wizard>.steps>ul>li.done a,
        .wizard>.steps>ul>li.done a:focus,
        .wizard>.steps>ul>li.done a:hover {
            color: #999
        }

        .wizard>.steps>ul>li.done .number {
            font-size: 0;
            background-color: #2cbacc;
            border-color: #2cbacc;
            color: #fff
        }

        .wizard>.steps>ul>li.done .number:after {
            content: "";
            font-family: icomoon;
            display: inline-block;
            font-size: 1rem;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            transition: all ease-in-out .15s
        }

        @media (prefers-reduced-motion:reduce) {
            .wizard>.steps>ul>li.done .number:after {
                transition: none
            }
        }

        .wizard>.steps>ul>li.error .number {
            border-color: #ef5350;
            color: #ef5350
        }

        .card>.card-header:not([class*=bg-])>.wizard>.steps>ul {
            border-top: 1px solid rgba(0, 0, 0, .125)
        }

        @media (max-width:991.98px) {
            .wizard>.steps>ul {
                margin-bottom: 1.25rem
            }

            .wizard>.steps>ul>li {
                display: block;
                float: left;
                width: 50%
            }

            .wizard>.steps>ul>li>a {
                margin-bottom: 0
            }

            .wizard>.steps>ul>li:first-child:before,
            .wizard>.steps>ul>li:last-child:after {
                content: ''
            }

            .wizard>.steps>ul>li:last-child:after {
                background-color: #2cbacc
            }
        }

        @media (max-width:768.98px) {
            .wizard>.steps>ul>li {
                width: 100%
            }

            .wizard>.steps>ul>li.current:after {
                background-color: #2cbacc
            }
        }

        .wizard>.steps .number {
            background-color: #fff;
            color: #ccc;
            display: inline-block;
            position: absolute;
            top: 0;
            left: 50%;
            margin-left: -1.1875rem;
            border: 2px solid #eee;
            font-size: .9375rem;
            z-index: 10;
            line-height: 2.125rem;
            text-align: center;
            width: 2.375rem;
            height: 2.375rem;
            border-radius: 50rem
        }

        .wizard>.actions {
            position: relative;
            text-align: right;
            padding: 1.25rem;
            padding-top: 0
        }

        .wizard>.actions>ul {
            list-style: none;
            padding: 0;
            margin: 0
        }

        .wizard>.actions>ul::after {
            display: block;
            clear: both;
            content: ""
        }

        .wizard>.actions>ul>li {
            display: inline-block
        }

        .wizard>.actions>ul>li+li {
            margin-left: 1.25rem
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/plugins/forms/wizards/steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/forms/inputs/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/extensions/cookie.js') }}"></script>
    <script src="{{ asset('assets/js/auth/form_wizard.js') }}"></script>
@endsection

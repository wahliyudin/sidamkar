<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/css/auth/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/auth/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/auth/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content row justify-content-center align-items-center">

                    <!-- Login form -->

                    <div class="card col-md-4 mb-0" style="box-shadow: unset;">
                        <div class="card-body py-5 px-5" style="border-radius: 10px;">
                            <form class="" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="text-center mb-3">
                                    <img class="logo" src="{{ asset('assets/images/template/logo.png') }}"
                                        alt="">
                                    <h5 class="header-login mb-0">SISTEM INFORMASI DAMKAR</h5>
                                    <span class="bot-login d-block text-muted">Silahkan Masuk, Menggunakan Akun
                                        Damkar</span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        placeholder="Username" name="username" value="{{ old('username') }}" required
                                        autocomplete="none" style="padding-bottom: 1.5rem; padding-top: 1.5rem;">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" name="password" required
                                        style="padding-bottom: 1.5rem; padding-top: 1.5rem;">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div>

                                <div class="text-center">
                                    <p>Belum memiliki akun?<a href="{{ route('register') }}"> Daftar </a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /login form -->

                </div>
                <!-- /content area -->



            </div>
            <!-- /inner content -->


        </div>
        <!-- /main content -->
        <img style="position: absolute; bottom: 0; z-index: -1; max-width: 100vw;"
            src="{{ asset('assets/images/template/glombang-2.png') }}"alt="">
        <img style="position: absolute; bottom: 0; z-index: -1; max-width: 100vw;"
            src="{{ asset('assets/images/template/glombang-1.png') }}" alt="">

    </div>
    <!-- /page content -->




    <script src="{{ asset('assets/js/auth/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/app.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/forms/wizards/steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/forms/inputs/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/plugins/extensions/cookie.js') }}"></script>
    <script src="{{ asset('assets/js/auth/form_wizard.js') }}"></script>

    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.jquery.js') }}"></script>
    <style>
        .header-login {
            font-family: 'Viga', sans-serif;
        }

        .logo {
            height: 150px;
            margin-bottom: 10px;
        }

        .form-control {
            background-color: #224957;
            color: #fff;
        }

        .form-control::-webkit-input-placeholder {
            background-color: #224957;
            color: #fff;
        }

        .form-group {
            color: #fff;
        }

        .bot-login {
            font-size: 12px;
        }

        .card {
            background-color: transparent !important;
            border: none !important;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            overflow: hidden;
            z-index: 1;
        }

        .card .card-body {
            background-color: white;
        }

        .form-control-feedback {
            position: absolute;
            top: 0;
            transform: translateY(6px);
            color: #333;
            padding-left: 0.875rem;
            padding-right: 0.875rem;
            line-height: calc(1.5715em + 0.875rem + 2px);
            min-width: 1rem;
            height: 100%;
        }

        .content-inner {
            overflow-x: hidden !important;
        }

        @media screen and (max-width:750px) {
            .card-body {
                padding: 2rem 1rem !important;
            }

            h5 {
                font-size: 20px;
            }
        }
    </style>
</body>


</html>

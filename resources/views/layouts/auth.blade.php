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
    <link rel="stylesheet" href="{{ asset('assets/extensions/fontawesome/all.min.css') }}" />
    <link href="{{ asset('assets/css/auth/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/template/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/template/logo.png') }}" type="image/png">
    <style>
        .header-login {
            font-size: 25px;
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
            /* padding-left: 0.875rem;
            padding-right: 0.875rem; */
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
    @yield('css')
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
                    @yield('content')
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
    <script src="{{ asset('assets/extensions/fontawesome/all.min.js') }}"></script>

    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    @if (session('message'))
        <script>
            Toastify({
                text: "{{ session('message') }}",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#EDE40C",
            }).showToast();
        </script>
    @endif
    @if (session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#1AD598",
            }).showToast();
        </script>
    @endif
    @yield('js')
</body>


</html>

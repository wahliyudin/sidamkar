<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/template/LogoDamkar.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/template/LogoDamkar.png') }}" type="image/png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('layouts.inc.css')
    {{-- @vite(['public/assets/css/main/app.css', 'public/assets/extensions/fontawesome/all.min.css', 'public/assets/js/bootstrap.js', 'public/assets/js/app.js', 'public/assets/extensions/fontawesome/all.min.js']) --}}
</head>

<body>
    <div id="app">
        <div class="loading-master">
            <img class="loading" src="{{ asset('assets/images/template/spinner.gif') }}"
                style="height: 3rem; object-fit: cover;" alt="" srcset="">
        </div>
        @include('layouts.inc.sidebar')
        <div id="main" class='layout-navbar'>
            @include('layouts.inc.navbar')
            <div id="main-content">
                <div class="page-heading">
                    @yield('breadcrumbs')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.inc.js')
</body>

</html>

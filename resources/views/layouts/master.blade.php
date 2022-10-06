<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('layouts.inc.css')
</head>

<body>
    <div id="app">
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
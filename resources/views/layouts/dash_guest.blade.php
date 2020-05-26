<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html {
            height: 100%;
        }

        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container, .row {
            height: 100%;
        }

        .logo {
            display: flex;
            justify-content: center;
        }

        .logo img {
            width: 70%;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="text-center mb-5">
                <img src="{{ asset('img/logo_txt.png') }}" width="400px" alt="">
            </div>
            @include('alerts.error')
            @include('alerts.success')

            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


</body>
</html>

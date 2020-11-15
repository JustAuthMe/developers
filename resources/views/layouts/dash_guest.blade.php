<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/landing/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jam-button.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/landing/favicon.png') }}"/>
</head>
<body>
<div id="layoutDefault">
    <div id="layoutDefault_content">
        <main>
            <nav
                class="navbar navbar-marketing navbar-expand-lg bg-gradient-primary-to-secondary navbar-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand text-white" href="{{ url('/') }}"><img
                            style="filter: brightness(0) invert(1); height: 1.5rem;"
                            src="{{ asset('/img/landing/brand-logos/justauthme-txt.svg') }}" alt="">
                        <sup>Developers</sup></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mr-lg-5">
                            <li class="nav-item @if(request()->is('dash/login')) active @endif">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('dash.user.login') }}</a>
                            </li>
                            <li class="nav-item @if(request()->is('dash/register')) active @endif">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('dash.user.register') }}</a>
                            </li>
                        </ul>
                        <a class="btn-light btn rounded-pill px-4 ml-lg-4" href="{{ url('/') }}"><i
                                class="fas fa-arrow-circle-left mr-2"></i> <?= __('dash.back-to-landing'); ?></a>
                    </div>
                </div>
            </nav>
            <section class="bg-white py-10">
                <div class="container mt-5">
                    @include('alerts.error')
                    @include('alerts.success')

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="svg-border-rounded text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                         fill="currentColor">
                        <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
                    </svg>
                </div>
            </section>
        </main>
    </div>
    @include('layouts.landing_footer')
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>

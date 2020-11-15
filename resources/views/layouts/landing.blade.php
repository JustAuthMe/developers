<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="JustAuthMe pour les développeurs"/>
    <meta name="author" content="JustAuthMe"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'JustAuthMe Developers') }} - {{ substr(__('landing.slogan'), 0, -1) }} </title>
    <link href="{{ asset('css/landing/styles.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/landing/favicon.png') }}"/>
    <script data-search-pseudo-elements defer
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://static.justauth.me/medias/fonts/lato-v16-latin/lato-v16-latin.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Lato, Helvetica, sans-serif;
        }

        .navbar-marketing.navbar-dark.navbar-scrolled {
            background-color: #2A79B0 !important;
        }
    </style>
</head>
<body>
<div id="layoutDefault">
    <div id="layoutDefault_content">
        <main>
            <nav class="navbar navbar-marketing navbar-expand-lg @if(strstr(request()->route()->getActionName(), 'home')) bg-transparent navbar-dark fixed-top @else bg-white navbar-light @endif">
                <div class="container">
                    <a class="navbar-brand text-white" href="{{ url('/') }}"><img
                                style="@if(strstr(request()->route()->getActionName(), 'home')) filter: brightness(0) invert(1); @endif height: 1.5rem;"
                                src="{{ asset('/img/landing/brand-logos/justauthme-txt.svg') }}" alt=""> <sup>Developers</sup></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mr-lg-5">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><?= __('landing.home'); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="https://justauth.me/" target="_blank"><?= __('landing.about'); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/#pricing')}}"><?= __('landing.prices'); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="mailto:developers@justauth.me"><?= __('landing.contact-us'); ?></a></li>
                        </ul>
                        <a class="btn-light btn rounded-pill px-4 ml-lg-4" href="{{ url('/dash') }}"><?= __('landing.dashboard'); ?></a>
                    </div>
                </div>
            </nav>
            @yield('content')
        </main>
    </div>
    @include('layouts.landing_footer')

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/landing/scripts.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            disable: 'mobile',
            duration: 600,
            once: true
        });
    </script>
</body>
</html>

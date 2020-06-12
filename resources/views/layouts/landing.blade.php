<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="JustAuthMe pour les développeurs"/>
    <meta name="author" content="JustAuthMe"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
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
        body {
            font-family: Lato;
        }
        .pricing.disabled * {
            color: #555 !important;
        }

        .pricing.disabled .badge {
            color: white !important;
        }

        .pricing.disabled::before {
            content: close-quote;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #8888;
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
                            src="{{ asset('/img/landing/brand-logos/justauthme-txt.svg') }}" alt=""> <sup>Dash</sup></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mr-lg-5">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://justauth.me/#engagements"
                                                    target="_blank">À propos de JustAuthMe</a></li>
                            <li class="nav-item"><a class="nav-link" href="mailto:developers@justauth.me">Contactez-nous</a></li>
                        </ul>
                        <a class="btn-light btn rounded-pill px-4 ml-lg-4" href="{{ url('/dash') }}">Dashboard</a>
                    </div>
                </div>
            </nav>
            @yield('content')
            <hr class="m-0"/>
        </main>
    </div>
    <div id="layoutDefault_footer">
        <footer class="footer pt-10 pb-5 mt-auto bg-light footer-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-brand mb-3"><img src="{{ asset('/img/landing/brand-logos/justauthme-txt.svg') }}" alt="JustAuthMe Logo">
                        </div>
                        <div class="mb-3">L'identité numérique, sans mot de passe</div>
                        <div class="icon-list-social mb-5">
                            <a class="icon-list-social-link" href="https://www.instagram.com/justauthme/"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="icon-list-social-link" href="https://www.facebook.com/justauthme/"><i
                                    class="fab fa-facebook"></i></a>
                            <a class="icon-list-social-link" href="https://github.com/JustAuthMe/"><i
                                    class="fab fa-github"></i></a>
                            <a class="icon-list-social-link" href="https://twitter.com/justauthme"><i
                                    class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="text-uppercase-expanded text-xs mb-4">Infos légales</div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><a href="https://justauth.me/p/mentions-legales">Mention
                                            légales</a></li>
                                    <li class="mb-2"><a href="https://justauth.me/p/politique-de-confidentialite">Politique
                                            de confidentialité</a></li>
                                    <li><a href="https://justauth.me/p/conditions-generales-dutilisation">Conditions
                                            générales d'utilisation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-5"/>
                <div class="row align-items-center">
                    <div class="col-md-6 small">Tous droits réservés &copy; JustAuthMe 2019 - {{ date('Y') }}</div>
                    <div class="col-md-6 text-md-right small">
                        <a href="https://justauth.me">justauth.me</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="JustAuthMe pour les développeurs"/>
    <meta name="author" content="JustAuthMe"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'JustAuthMe Developers') }} - Le SSO biométrique sans mot de passe</title>
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
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://justauth.me/" target="_blank">Qui sommes-nous ?</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/#pricing')}}">Tarifs</a></li>
                            <li class="nav-item"><a class="nav-link" href="mailto:developers@justauth.me">Contactez-nous</a></li>
                        </ul>
                        <a class="btn-light btn rounded-pill px-4 ml-lg-4" href="{{ url('/dash') }}">Tableau de bord</a>
                    </div>
                </div>
            </nav>
            @yield('content')
        </main>
    </div>
    <div id="layoutDefault_footer">
        <footer class="footer pt-10 pb-5 mt-auto bg-dark footer-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-brand">{{ config('app.name', 'JustAuthMe Developers') }}</div>
                        <div class="mb-3">Le SSO biométrique sans mot de passe.</div>
                        <div class="icon-list-social mb-5">
                            <a class="icon-list-social-link" href="https://twitter.com/justauthme"><i class="fab fa-twitter"></i></a>
                            <a class="icon-list-social-link" href="https://www.facebook.com/justauthme/"><i class="fab fa-facebook"></i></a>
                            <a class="icon-list-social-link" href="https://www.instagram.com/justauthme/"><i class="fab fa-instagram"></i></a>
                            <a class="icon-list-social-link" href="https://www.linkedin.com/company/justauthme/"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                <div class="text-uppercase-expanded text-xs mb-4">Produits</div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><a href="https://justauth.me">Application</a></li>
                                    <li class="mb-2"><a href="{{ url('/dash') }}">Panel développeurs</a></li>
                                <!-- <li class="mb-2"><a href="#">Prestashop</a></li>
                                    <li class="mb-2"><a href="#">Wordpress</a></li> -->
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                <div class="text-uppercase-expanded text-xs mb-4">Ressource</div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><a href="{{ url('/documentation') }}">Documentation</a></li>
                                    <li class="mb-2"><a href="https://github.com/justauthme">Github</a></li>
                                    <li class="mb-2"><a href="https://blog.justauth.me/">Blog</a></li>
                                    <li class="mb-2"><a href="https://core.justauth.me/rescue">Smartphone perdu</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                <div class="text-uppercase-expanded text-xs mb-4">Contact</div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><a href="mailto:press@justauth.me">Presse</a></li>
                                    <li class="mb-2"><a href="mailto:partnership@justauth.me">Partenariats</a></li>
                                    <li class="mb-2"><a href="mailto:marketing@justauth.me">Marketing</a></li>
                                    <li class="mb-2"><a href="mailto:contact@justauth.me">Autre</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                <div class="text-uppercase-expanded text-xs mb-4">Légal</div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><a href="https://justauth.me/p/mentions-legales">Mentions légales</a></li>
                                    <li class="mb-2"><a href="https://justauth.me/p/politique-de-confidentialite">Confidentialité</a></li>
                                    <li class="mb-2"><a href="https://justauth.me/p/conditions-generales-dutilisation">CGU</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-5" />
                <div class="row align-items-center">
                    <div class="col-md-6 small">Copyright &copy; JustAuthMe 2019 - {{ date('Y') }} &middot; Tous droits réservés.</div>
                    <div class="col-md-6 text-md-right small">
                        <a href="{{ url('/?lang=fr') }}" title="Passer en Français"><img src="{{ asset('/img/landing/flags/fr.svg') }}" height="20"></a>
                        &middot;
                        <a href="{{ url('/?lang=en') }}" title="Passer en Anglais"><img src="{{ asset('/img/landing/flags/us.svg') }}" height="20"></a>
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

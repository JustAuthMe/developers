<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="JustAuthMe pour les développeurs" />
    <meta name="author" content="JustAuthMe" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/landing/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/landing/favicon.png') }}" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://static.justauth.me/medias/fonts/lato-v16-latin/lato-v16-latin.css">
    <style>
        body{
            font-family: Lato;
        }
    </style>
</head>
<body>
<div id="layoutDefault">
    <div id="layoutDefault_content">
        <main>
            <nav class="navbar navbar-marketing navbar-expand-lg bg-transparent navbar-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand text-white" href="index.html"><img style="filter: brightness(0) invert(1); height: 1.5rem;" src="{{ asset('/img/landing/brand-logos/justauthme-txt.svg') }}" alt=""> <sup>Dash</sup></a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mr-lg-5">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://justauth.me/#engagements" target="_blank">À propos de JustAuthMe</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://justauth.me/#team" target="_blank">Qui sommes-nous ?</a></li>
                        </ul>
                        <a class="btn-light btn rounded-pill px-4 ml-lg-4" href="{{ url('/dash') }}">Dashboard</a>
                    </div>
                </div>
            </nav>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
                <div class="page-header-content pt-10">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-up">
                                <h1 class="page-header-title">Votre nouvelle solution SSO innovante</h1>
                                <p class="page-header-text mb-5">Proposez à vos utilisateurs une solution d'authentification unique, fluide et respectueuse de la vie privée.</p>
                                <a class="btn btn-teal btn-marketing rounded-pill lift lift-sm" href="{{ url('/dash/register') }}">Intégrer votre site</a><a class="btn btn-link btn-marketing" href="https://docs.startbootstrap.com/sb-ui-kit-pro/quickstart">Documentation</a>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block text-right" data-aos="fade-up" data-aos-delay="50"><img class="img-fluid" src="{{ asset('/img/landing/drawkit/color/drawkit-confirmed-color.svg') }}" width="300px" /></div>
                        </div>
                    </div>
                </div>
                <div class="svg-border-rounded text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
                </div>
            </header>
            <section class="bg-white py-10">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="target"></i></div>
                            <h3>Acquisition</h3>
                            <p class="mb-0">Les utilisateurs seront plus enclin à créer un compte car JustAuthMe les débarrasse de toutes les barrières qui séparent leur statut de visiteur de celui de membre actif de votre communauté.</p>
                        </div>
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="shield"></i></div>
                            <h3>Sécurité</h3>
                            <p class="mb-0">Les adresses e-mail de nos utilisateurs sont vérifiées en amont et vous n’avez plus à gérer ce point. De plus, un hacker ne pourrait voler que des informations inutilisables, car non liées à des mots de passe.</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="book-open"></i></div>
                            <h3>Liberté</h3>
                            <p class="mb-0">Vous ou vos utilisateurs peuvent à tout moment décider de se passer de notre solution sans perdre accès à votre site, il n’auront qu’à créer un mot de passe via votre interface “Mot de passe perdu”.</p>
                        </div>
                    </div>
                </div>
                <div class="svg-border-rounded text-light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
                </div>
            </section>
            <section class="bg-light py-10">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-9 col-lg-6 order-1 order-lg-0" data-aos="fade-right">
                            <div class="content-skewed content-skewed-right"><img class="content-skewed-item img-fluid shadow-lg rounded-lg" src="{{ asset('/img/landing/screenshots/demo-pulseheberg.jpg') }}" /></div>
                        </div>
                        <div class="col-lg-6 order-0 order-lg-1 mb-5 mb-lg-0" data-aos="fade-left">
                            <div class="mb-5">
                                <h2>Simplifiez l'inscription sur votre site</h2>
                                <p class="lead">Les utilisateurs seront plus enclin à créer un compte car JustAuthMe les débarrasse de toutes les barrières qui séparent leur statut de visiteur de celui de membre actif de votre communauté.</p>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    </section>
    <hr class="m-0" />
    <section class="bg-light pt-10">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Tarification</h2>
                <p class="lead">Pas de surprise sur les prix.</p>
            </div>
            <div class="row z-1">
                <div class="col-lg-4 mb-5 mb-lg-n10" data-aos="fade-up" data-aos-delay="100">
                    <div class="card pricing h-100">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <div class="badge badge-light badge-pill badge-marketing badge-sm">Offre gratuite</div>
                                <div class="pricing-price"><sup>€</sup>0<span class="pricing-price-period">/mois</span></div>
                            </div>
                            <ul class="fa-ul pricing-list">
                                <li class="pricing-list-item">
                                    <span class="fa-li"><i class="far fa-check-circle text-teal"></i></span><span class="text-dark">1000 connexions</span>
                                </li>
                                <li class="pricing-list-item">
                                    <span class="fa-li"><i class="far fa-check-circle text-teal"></i></span><span class="text-dark">Assistance 5j/7 7h/j</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-n10" data-aos="fade-up">
                    <div class="card pricing h-100">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <div class="badge badge-primary-soft badge-pill badge-marketing badge-sm text-primary">Offre standard</div>
                                <div class="pricing-price"><sup>€</sup>29<span class="pricing-price-period">HT /mois</span></div>
                            </div>
                            <ul class="fa-ul pricing-list">
                                <li class="pricing-list-item">
                                    <span class="fa-li"><i class="far fa-check-circle text-teal"></i></span><span class="text-dark">10 000 connexions</span>
                                </li>
                                <li class="pricing-list-item">
                                    <span class="fa-li"><i class="far fa-check-circle text-teal"></i></span><span class="text-dark">Assistance 7j/7 7h/j</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-n10" data-aos="fade-up" data-aos-delay="100">
                    <div class="card pricing h-100">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <div class="badge badge-light badge-pill badge-marketing badge-sm">Enterprise</div>
                                <p class="card-text py-10">Si vous avez besoin d'une offre avec plus de 10 000 connexions ou si vous souhaitez intégrer JustAuthMe sur votre intranet, contactez-nous !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path></svg>
        </div>
    </section>
    <section class="bg-dark py-10">
        <div class="container">
            <div class="row my-10">
                <div class="col-lg-6">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i></div>
                        <div class="ml-4">
                            <h5 class="text-white">Est-ce que l'offre gratuite deviendra payante dans le futur ?</h5>
                            <p class="text-white-50">Non ! Pas de surprise avec JustAuthMe ! Si vous choisissez d'intégrer JustAuthMe avec l'offre gratuite, vous bénéficierez de la gratuitié à vie avec les mêmes garanties !</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i></div>
                        <div class="ml-4">
                            <h5 class="text-white">Puis-je me passer de JustAuthMe sans perdre mes utilisateurs ?</h5>
                            <p class="text-white-50">Oui ! Vous ou vos utilisateurs peuvent à tout moment décider de se passer de notre solution sans perdre accès à votre site, il n’auront qu’à créer un mot de passe via votre interface “Mot de passe perdu”</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="badge badge-transparent-light badge-pill badge-marketing mb-4">Intégrez votre site dès maintenant</div>
                    <h2 class="text-white">Gagnez des utilisateurs avec JustAuthMe</h2>
                    <p class="lead text-white-50 mb-5">Les utilisateurs seront plus enclin à créer un compte car JustAuthMe les débarrasse de toutes les barrières qui séparent leur statut de visiteur de celui de membre actif de votre communauté.</p>
                    <a class="btn btn-teal btn-marketing rounded-pill lift lift-sm" href="{{ url('/dash') }}">Intégrer votre site</a>
                </div>
            </div>
        </div>
    </section>
    <hr class="m-0" />
    </main>
</div>
<div id="layoutDefault_footer">
    <footer class="footer pt-10 pb-5 mt-auto bg-light footer-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-brand mb-3"><img src="assets/img/brand-logos/justauthme-txt.svg" alt=""></div>
                    <div class="mb-3">L'identité numérique, sans mot de passe</div>
                    <div class="icon-list-social mb-5">
                        <a class="icon-list-social-link" href="https://www.instagram.com/justauthme/"><i class="fab fa-instagram"></i></a>
                        <a class="icon-list-social-link" href="https://www.facebook.com/justauthme/"><i class="fab fa-facebook"></i></a>
                        <a class="icon-list-social-link" href="https://github.com/JustAuthMe/"><i class="fab fa-github"></i></a>
                        <a class="icon-list-social-link" href="https://twitter.com/justauthme"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="text-uppercase-expanded text-xs mb-4">Infos légales</div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><a href="https://justauth.me/p/mentions-legales">Mention légales</a></li>
                                <li class="mb-2"><a href="https://justauth.me/p/politique-de-confidentialite">Politique de confidentialité</a></li>
                                <li><a href="https://justauth.me/p/conditions-generales-dutilisation">Conditions générales d'utilisation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-5" />
            <div class="row align-items-center">
                <div class="col-md-6 small">Tous droits réservés &copy; JustAuthMe 2019 - 2020</div>
                <div class="col-md-6 text-md-right small">
                    <a href="https://justauth.me">justauth.me</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
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

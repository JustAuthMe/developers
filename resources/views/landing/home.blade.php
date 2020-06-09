@extends('layouts.landing')

@section('content')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content pt-10">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-up">
                        <h1 class="page-header-title">Votre nouvelle solution SSO innovante</h1>
                        <p class="page-header-text mb-5">Proposez à vos utilisateurs une solution
                            d'authentification unique, fluide et respectueuse de la vie privée.</p>
                        <a class="btn btn-teal btn-marketing rounded-pill lift lift-sm"
                           href="{{ url('/dash/register') }}">Intégrer votre site</a><a
                            class="btn btn-link btn-marketing"
                            href="{{ url('/documentation') }}">Documentation</a>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block text-right" data-aos="fade-up" data-aos-delay="50">
                        <img class="img-fluid"
                             src="{{ asset('/img/landing/drawkit/color/drawkit-confirmed-color.svg') }}"
                             width="300px"/></div>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                 fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </header>
    <section class="bg-white py-10">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                            data-feather="target"></i></div>
                    <h3>Acquisition</h3>
                    <p class="mb-0">Les utilisateurs seront plus enclin à créer un compte car JustAuthMe les
                        débarrasse de toutes les barrières qui séparent leur statut de visiteur de celui de
                        membre actif de votre communauté.</p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                            data-feather="shield"></i></div>
                    <h3>Sécurité</h3>
                    <p class="mb-0">Les adresses e-mail de nos utilisateurs sont vérifiées en amont et vous
                        n’avez plus à gérer ce point. De plus, un hacker ne pourrait voler que des informations
                        inutilisables, car non liées à des mots de passe.</p>
                </div>
                <div class="col-lg-4">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                            data-feather="book-open"></i></div>
                    <h3>Liberté</h3>
                    <p class="mb-0">Vous ou vos utilisateurs peuvent à tout moment décider de se passer de notre
                        solution sans perdre accès à votre site, il n’auront qu’à créer un mot de passe via
                        votre interface “Mot de passe perdu”.</p>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-light">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                 fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </section>
    <section class="bg-light py-10">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-6 order-1 order-lg-0" data-aos="fade-right">
                    <div class="content-skewed content-skewed-right"><img
                            class="content-skewed-item img-fluid shadow-lg rounded-lg"
                            src="{{ asset('/img/landing/screenshots/demo-pulseheberg.jpg') }}"/></div>
                </div>
                <div class="col-lg-6 order-0 order-lg-1 mb-5 mb-lg-0" data-aos="fade-left">
                    <div class="mb-5">
                        <h2>Simplifiez l'inscription sur votre site</h2>
                        <p class="lead">Les utilisateurs seront plus enclin à créer un compte car JustAuthMe les
                            débarrasse de toutes les barrières qui séparent leur statut de visiteur de celui de
                            membre actif de votre communauté.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="m-0"/>
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
                                <div class="badge badge-light badge-pill badge-marketing badge-sm">Offre
                                    gratuite
                                </div>
                                <div class="pricing-price"><sup>€</sup>0<span
                                        class="pricing-price-period">/mois</span></div>
                            </div>
                            <ul class="fa-ul pricing-list">
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Accès à l'API</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">jusqu'à 1000 connexions</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Support par e-mail</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Assistance 5j/7 7h/j</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url('/dash') }}" class="btn btn-primary">Choisir cette offre</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-n10" data-aos="fade-up">
                    <div class="card pricing h-100 disabled">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <div
                                    class="badge badge-primary-soft badge-pill badge-marketing badge-sm text-primary">
                                    Offre standard
                                </div>
                                <div class="pricing-price"><sup>€</sup>29<span class="pricing-price-period">HT /mois</span>
                                </div>
                            </div>
                            <ul class="fa-ul pricing-list">
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Accès à l'API</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">jusqu'à 10 000 connexions</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Support par chat</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Assistance 7j/7 7h/j</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary">Prochainement</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-n10" data-aos="fade-up" data-aos-delay="100">
                    <div class="card pricing h-100">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <div class="badge badge-light badge-pill badge-marketing badge-sm">Enterprise
                                </div>
                                <p class="card-text py-10">Si vous avez besoin d'une offre avec plus de 10 000
                                    connexions ou si vous souhaitez intégrer JustAuthMe sur votre intranet,
                                    contactez-nous !</p>

                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="mailto:contact@justauth.me" class="btn btn-primary">Contactez-nous</a>
                        </div>
                    </div>
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
    <section class="bg-dark py-10">
        <div class="container">
            <div class="row my-10">
                <div class="col-lg-6">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i>
                        </div>
                        <div class="ml-4">
                            <h5 class="text-white">Est-ce que l'offre gratuite deviendra payante dans le futur
                                ?</h5>
                            <p class="text-white-50">Non ! Pas de surprise avec JustAuthMe ! Si vous choisissez
                                d'intégrer JustAuthMe avec l'offre gratuite, vous bénéficierez de la gratuitié à
                                vie avec les mêmes garanties !</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i>
                        </div>
                        <div class="ml-4">
                            <h5 class="text-white">Puis-je me passer de JustAuthMe sans perdre mes utilisateurs
                                ?</h5>
                            <p class="text-white-50">Oui ! Vous ou vos utilisateurs peuvent à tout moment
                                décider de se passer de notre solution sans perdre accès à votre site, il
                                n’auront qu’à créer un mot de passe via votre interface “Mot de passe perdu”</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="badge badge-transparent-light badge-pill badge-marketing mb-4">Intégrez votre
                        site dès maintenant
                    </div>
                    <h2 class="text-white">Gagnez des utilisateurs avec JustAuthMe</h2>
                    <p class="lead text-white-50 mb-5">Les utilisateurs seront plus enclin à créer un compte car
                        JustAuthMe les débarrasse de toutes les barrières qui séparent leur statut de visiteur
                        de celui de membre actif de votre communauté.</p>
                    <a class="btn btn-teal btn-marketing rounded-pill lift lift-sm" href="{{ url('/dash') }}">Intégrer
                        votre site</a>
                </div>
            </div>
        </div>
    </section>
@endsection

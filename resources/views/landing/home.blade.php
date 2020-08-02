@extends('layouts.landing')

@section('content')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content pt-10">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-up">
                        <h1 class="page-header-title">Le SSO biométrique sans mot de passe</h1>
                        <p class="page-header-text mb-5">Proposez à vos utilisateurs une solution
                            SSO sécurisée, ultra-rapide et respectueuse de la vie privée.</p>
                        <a class="btn btn-teal btn-marketing rounded-pill lift lift-sm"
                           href="{{ url('/dash/register') }}">Rendre mon site compatible</a>
                        <a class="btn btn-link btn-marketing"
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
                            data-feather="shield"></i></div>
                    <h3>Sécurité</h3>
                    <p class="mb-0">Grâce à la biométrie, JustAuthMe permet le plus haut niveau de sécurité jamais
                        atteint sur un site web.</p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                            data-feather="user-check"></i></div>
                    <h3>Authenticité</h3>
                    <p class="mb-0">Chaque utilisateur de JustAuthMe est certifié authentique. Terminé les e-mail
                        invalides et les robots.</p>
                </div>
                <div class="col-lg-4">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                            data-feather="thumbs-up"></i></div>
                    <h3>Confiance</h3>
                    <p class="mb-0">Les sites compatibles avec JustAuthMe inspirent la confiance de leurs utilisateurs
                        en se souciant de leur sécurité.</p>
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
                                <div class="pricing-price">0<sup>€</sup><span
                                        class="pricing-price-period"> /mois</span></div>
                            </div>
                            <ul class="fa-ul pricing-list">
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">1 site web</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">1 000 connexions / mois</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Support par e-mail</span>
                                </li>
                                <li class="pricing-list-item">
                                    <span class="fa-li">
                                        <svg class="svg-inline--fa fa-circle fa-w-16 text-gray-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z"></path>
                                        </svg>
                                    </span>
                                    Intégration "Same Page"
                                </li>
                                <li class="pricing-list-item">
                                    <span class="fa-li">
                                        <svg class="svg-inline--fa fa-circle fa-w-16 text-gray-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z"></path>
                                        </svg>
                                    </span>
                                    Assistance 24/7
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
                                <div class="pricing-price">29<sup>€</sup><span
                                        class="pricing-price-period">HT /mois</span>
                                </div>
                            </div>
                            <ul class="fa-ul pricing-list">
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">10 sites web</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">10 000 connexions / mois</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Support par chat</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Intégration "Same Page"</span>
                                </li>
                                <li class="pricing-list-item">
                                    <span class="fa-li">
                                        <svg class="svg-inline--fa fa-circle fa-w-16 text-gray-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z"></path>
                                        </svg>
                                    </span>
                                    Assistance 24/7
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-outline-primary">Prochainement</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-n10" data-aos="fade-up">
                    <div class="card pricing h-100 disabled">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <div
                                    class="badge badge-indigo-soft badge-pill badge-marketing badge-sm text-primary">
                                    Offre Premium
                                </div>
                                <div class="pricing-price">59<sup>€</sup><span
                                        class="pricing-price-period">HT /mois</span>
                                </div>
                            </div>
                            <ul class="fa-ul pricing-list">
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Sites web illimités</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Connexions illimités</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Support par chat</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Intégration "Same Page"</span>
                                </li>
                                <li class="pricing-list-item">
                                            <span class="fa-li"><i
                                                    class="far fa-check-circle text-teal"></i></span><span
                                        class="text-dark">Assistance 24/7</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-outline-primary">Prochainement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-jam">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                 fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </section>
    <section class="bg-jam py-10">
        <div class="container">
            <div class="row my-10">
                <div class="col-lg-6">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i>
                        </div>
                        <div class="ml-4">
                            <h5 class="text-white">L'offre gratuite deviendra-t-elle payante dans le futur ?</h5>
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
                            <h5 class="text-white">Pourrais-je me passer de JustAuthMe à l'avenir ?</h5>
                            <p class="text-white-50">Oui ! Vous ou vos utilisateurs pouvez à tout moment
                                décider de vous passer de notre solution, il suffira à vos utilisateurs de créer un mot
                                de passe via votre interface “Mot de passe oublié”</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

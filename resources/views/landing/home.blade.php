@extends('layouts.landing')

@section('content')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
        <div class="page-header-content pt-10">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-up">
                        <h1 class="page-header-title"><?= __('landing.slogan'); ?></h1>
                        <p class="page-header-text mb-5"><?= __('landing.description'); ?></p>
                        <a class="btn btn-teal btn-marketing rounded-pill lift lift-sm"
                           href="{{ url('/dash/register') }}"><?= __('landing.action-button'); ?></a>
                        <a class="btn btn-link btn-marketing"
                           href="{{ url('/documentation') }}"><?= __('landing.documentation'); ?></a>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block text-right" data-aos="fade-up" data-aos-delay="50">
                        <img class="img-fluid"
                             src="{{ asset('/img/landing/drawkit/color/drawkit-confirmed-color.svg') }}"
                             width="300px"/></div>
                </div>
            </div>
        </div>
        <div class="svg-border-rounded text-light">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                 fill="currentColor">
                <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
            </svg>
        </div>
    </header>
    <section class="bg-light py-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('img/softs/wordpress.png') }}" class="img-fluid" style="width: 150px;" alt="">
                </div>
                <div class="col-md-8">
                    <h2><span class="badge badge-warning">{{ __('landing.new') }}</span> {{ __('landing.wordpress.title') }}</h2>
                    <p class="lead mb-5 mb-lg-0">{{ __('landing.wordpress.description') }}</p><br />
                    <a href="{{ get_wordpress_plugin_url() }}" class="btn btn-secondary"><i class="fas fa-download mr-2"></i> {{ __('landing.wordpress.btn') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-10">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                                data-feather="shield"></i></div>
                    <h3><?= __('landing.reasons.security.badge'); ?></h3>
                    <p class="mb-0"><?= __('landing.reasons.security.description'); ?></p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                                data-feather="user-check"></i></div>
                    <h3><?= __('landing.reasons.authenticity.badge'); ?></h3>
                    <p class="mb-0"><?= __('landing.reasons.authenticity.description'); ?></p>
                </div>
                <div class="col-lg-4">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i
                                data-feather="thumbs-up"></i></div>
                    <h3><?= __('landing.reasons.trust.badge'); ?></h3>
                    <p class="mb-0"><?= __('landing.reasons.trust.description'); ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light pt-10 pb-10" id="pricing">
        <div class="container">
            <div class="text-center mb-5">
                <h2><?= __('landing.pricing.title'); ?></h2>
                <p class="lead"><?= __('landing.pricing.subtitle'); ?>.</p>
            </div>
            <div class="row no-gutters align-items-center">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="card pricing">
                        <div class="card-body p-5 d-flex flex-column align-items-center">
                            <div class="badge badge-primary-soft badge-pill badge-marketing badge-sm text-primary"><?= __('landing.pricing.plans.free.badge'); ?></div>
                            <div class="pricing-price">0<sup>€</sup><span class="pricing-price-period">/<?= __('landing.month'); ?></span></div>
                            <ul class="fa-ul pricing-list">
                                <li class="pricing-list-item">
                                    <span class="fa-li"><i class="far fa-check-circle text-teal"></i></span><span class="text-dark"><?= __('landing.pricing.plans.free.line1'); ?></span>
                                </li>
                                <li class="pricing-list-item">
                                    <span class="fa-li"><i class="far fa-check-circle text-teal"></i></span><span class="text-dark"><?= __('landing.pricing.plans.free.line2'); ?></span>
                                </li>
                                <li class="pricing-list-item">
                                    <span class="fa-li"><i class="far fa-check-circle text-teal"></i></span><span class="text-dark"><?= __('landing.pricing.plans.free.line3'); ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer px-5">
                            <a class="d-flex align-items-center justify-content-between" href="{{ url('/dash/register') }}"><?= __('landing.pricing.plans.free.submit'); ?><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
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
                            <h5 class="text-white"><?= __('landing.questions.free-offer.question'); ?></h5>
                            <p class="text-white-50 text-justify"><?= __('landing.questions.free-offer.answer'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i>
                        </div>
                        <div class="ml-4">
                            <h5 class="text-white"><?= __('landing.questions.leave-jam.question'); ?></h5>
                            <p class="text-white-50 text-justify"><?= __('landing.questions.leave-jam.answer'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h4><?= __('landing.download.title'); ?></h4>
                    <p class="lead mb-5 mb-lg-0"><?= __('landing.download.subtitle'); ?></p>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <a class="mr-3" href="https://apps.apple.com/fr/app/justauthme/id1506495629"><img class="mb-2" src="{{ asset('/img/landing/stores_badges/apple_'.\Illuminate\Support\Facades\Lang::getLocale().'.png') }}" style="height: 3rem;"/></a>
                    <a href="https://play.google.com/store/apps/details?id=me.justauth.app.android"><img class="mb-2" src="{{ asset('/img/landing/stores_badges/google_'.\Illuminate\Support\Facades\Lang::getLocale().'.png') }}" style="height: 3rem;"/></a>
                </div>
            </div>
        </div>
    </section>
@endsection


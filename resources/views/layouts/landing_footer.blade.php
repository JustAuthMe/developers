<div id="layoutDefault_footer">
    <footer class="footer pt-10 pb-5 mt-auto bg-dark footer-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-brand">{{ config('app.name', 'JustAuthMe Developers') }}</div>
                    <div class="mb-3"><?= __('landing.slogan'); ?></div>
                    <div class="icon-list-social mb-5">
                        <a class="icon-list-social-link" href="https://twitter.com/justauthmefr"><i class="fab fa-twitter"></i></a>
                        <a class="icon-list-social-link" href="https://www.facebook.com/justauthme/"><i class="fab fa-facebook"></i></a>
                        <a class="icon-list-social-link" href="https://www.instagram.com/justauthme/"><i class="fab fa-instagram"></i></a>
                        <a class="icon-list-social-link" href="https://www.linkedin.com/company/justauthme/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                            <div class="text-uppercase-expanded text-xs mb-4"><?= __('landing.footer.products.label'); ?></div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><a href="https://justauth.me"><?= __('landing.footer.products.application'); ?></a></li>
                                <li class="mb-2"><a href="{{ url('/dash') }}"><?= __('landing.footer.products.developers-panel'); ?></a></li>
                                <li class="mb-2"><a href="{{ url('/download/wordpress') }}"><?= __('landing.footer.products.wordpress-plugin'); ?></a></li>
                                <!-- <li class="mb-2"><a href="#">Prestashop</a></li>
                                    <li class="mb-2"><a href="#">Wordpress</a></li> -->
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                            <div class="text-uppercase-expanded text-xs mb-4"><?= __('landing.footer.resources.label'); ?></div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><a href="{{ url('/documentation') }}"><?= __('landing.footer.resources.documentation'); ?></a></li>
                                <li class="mb-2"><a href="https://justauth.me/press"><?= __('landing.footer.resources.press-kit'); ?></a></li>
                                <li class="mb-2"><a href="https://github.com/justauthme">Github</a></li>
                                <li class="mb-2"><a href="https://blog.justauth.me/"><?= __('landing.footer.resources.blog'); ?></a></li>
                                <li class="mb-2"><a href="https://core.justauth.me/rescue"><?= __('landing.footer.resources.smartphone-lost'); ?></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                            <div class="text-uppercase-expanded text-xs mb-4"><?= __('landing.footer.contact.label'); ?></div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><a href="mailto:press@justauth.me"><?= __('landing.footer.contact.press'); ?></a></li>
                                <li class="mb-2"><a href="mailto:partnership@justauth.me"><?= __('landing.footer.contact.partnerships'); ?></a></li>
                                <li class="mb-2"><a href="mailto:marketing@justauth.me"><?= __('landing.footer.contact.marketing'); ?></a></li>
                                <li class="mb-2"><a href="mailto:contact@justauth.me"><?= __('landing.footer.contact.other'); ?></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                            <div class="text-uppercase-expanded text-xs mb-4"><?= __('landing.footer.legal.label'); ?></div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><a href="https://justauth.me/p/mentions-legales"><?= __('landing.footer.legal.legal-notice'); ?></a></li>
                                <li class="mb-2"><a href="https://justauth.me/p/politique-de-confidentialite"><?= __('landing.footer.legal.privacy-policy'); ?></a></li>
                                <li class="mb-2"><a href="https://justauth.me/p/conditions-generales-dutilisation"><?= __('landing.footer.legal.terms'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-5" />
            <div class="row align-items-center">
                <div class="col-md-6 small"><?= __('landing.copyright.copyright'); ?> &copy; JustAuthMe 2019 - {{ date('Y') }} &middot; <?= __('landing.copyright.all-rights'); ?>.</div>
                <div class="col-md-6 text-md-right small">
                    <a href="{{ url('/localization/fr') }}" title="Passer en Français"><img src="{{ asset('/img/landing/flags/fr.svg') }}" height="20"></a>
                    &middot;
                    <a href="{{ url('/localization/en') }}" title="Passer en Anglais"><img src="{{ asset('/img/landing/flags/us.svg') }}" height="20"></a>
                </div>
            </div>
        </div>
    </footer>
</div>

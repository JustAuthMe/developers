<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('vendor/fontawesome-free/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <style>
        .social a {
            padding: 0 15px;
            font-size: 24px;
        }
    </style>

</head>

<body id="page-top">

<div class="container">
    <div class="my-3">
        <img src="{{ asset('img/logo_txt.png') }}" alt="JustAuthMe Logo" width="300px">
    </div>

    <div class="jumbotron">
        <p class="lead">Bienvenue sur la plateforme destinée aux développeurs.</p>
        <hr class="my-4">
        <p>
            Lors de notre navigation sur internet, nous faisons tous face aux même contraintes : de longs formulaires
            d'inscription, l'invention de <strong>mots de passe</strong> trop souvent <strong>oubliés</strong>, des
            e-mail de confirmation qui tombent en <strong>spam</strong>, etc.<br/><br/>
            Pour répondre à toutes ces problématiques, nous avons créé une application mobile
            <strong>privacy-by-design</strong> et <strong>#passwordless</strong> qui permet aux utilisateurs de se
            connecter aux sites compatibles avec un seul bouton : il suffit d'accepter la demande sur son smartphone et
            le tour est joué !<br/><br/>
            Vous pouvez intégrer dès maintenant JustAuthMe sur vos différents projets :
        </p>
        <a class="btn btn-primary btn-lg" href="{{ url('dash') }}" role="button">Commencer</a>
    </div>

    <div>
        <h3>Liens utiles</h3>
        <ul>
            <li><a href="https://justauth.me" target="_blank">Découvrir JustAuthMe</a></li>
            <li><a href="https://justauth.me/p/foire-aux-questions" target="_blank">Foire aux questions</a></li>
            <li><a href="mailto:hello@justauth.me" target="_blank">Contactez-nous</a></li>
        </ul>
    </div>

    <footer class="d-flex flex-column align-items-center text-center">
        <nav class="social mt-5 mb-4">
            <a target="_blank" rel="noopener" href="https://www.facebook.com/justauthme/" title="Facebook"><i
                    class="fab fa-facebook"></i></a>
            <a target="_blank" rel="noopener" href="https://twitter.com/justauthme" title="Twitter"><i
                    class="fab fa-twitter"></i></a>
            <a target="_blank" rel="noopener" href="https://www.instagram.com/justauthme/" title="Instagram"><i
                    class="fab fa-instagram"></i></a>
            <a href="mailto:contact@justauth.me" title="E-Mail"><i class="fa fa-envelope"></i></a>
        </nav>
        <div class="copyright mb-4">Copyright &copy; 2019 - {{ date('Y') }} JustAuthMe SAS</div>
        <nav class="legal mb-5">
            <a href="https://justauth.me/p/mentions-legales">Mention légales</a> -
            <a href="https://justauth.me/p/politique-de-confidentialite">Politique de confidentialité</a> -
            <a href="https://justauth.me/p/conditions-generales-dutilisation">Conditions générales d'utilisation</a>
        </nav>
    </footer>

</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dash') }}">
            <img src="{{ asset('img/logo_txt_white.png') }}" style="width: 80%">
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{ action('Dash\AppsController@index') }}">
                <i class="fas fa-fw fa-rocket"></i>
                <span><?= __('dash.apps.apps'); ?></span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ action('Dash\OrganizationsController@index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span><?= __('dash.organizations.organizations'); ?></span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/documentation')  }}" target="_blank">
                <i class="fas fa-fw fa-file-alt"></i>
                <span><?= __('dash.documentation'); ?></span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span
                                class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ action('Dash\UserController@edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                <?= __('dash.user.profile'); ?>
                            </a>

                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                <?= __('dash.user.logout'); ?>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container">

                @include('alerts.error')
                @include('alerts.success')
                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="row align-items-center">
                    <div class="col-md-6 small"><?= __('landing.copyright.copyright'); ?> &copy; JustAuthMe 2019 -
                        {{ date('Y') }} &middot; <?= __('landing.copyright.all-rights'); ?>.
                    </div>
                    <div class="col-md-6 text-md-right small">
                        <a href="{{ url('/localization/fr') }}" title="Passer en Français"><img
                                src="{{ asset('/img/landing/flags/fr.svg') }}" height="20"></a>
                        -
                        <a href="{{ url('/localization/en') }}" title="Passer en Anglais"><img
                                src="{{ asset('/img/landing/flags/us.svg') }}" height="20"></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@if(isset($load_js))
    @foreach($load_js as $js)
        @if(filter_var($js, FILTER_VALIDATE_URL))
            <script src="{{ $js }}"></script>
        @else
            <script>
                {!! $js !!}
            </script>
        @endif
    @endforeach
@endif
<script>
    let lang_show = '{{ __('dash.show') }}';
    let lang_hide = '{{ __('dash.hide') }}';
</script>
</body>

</html>

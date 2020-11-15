@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('dash.integration.application-integration') }} - WordPress</h1>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center mb-2">
                <div class="col-md-4 text-center">
                    <img src="https://developers.justauth.me/img/softs/wordpress.png" class="img-fluid" style="width: 150px;" alt="">
                </div>
                <div class="col-md-8">
                    <h2>{{ __('landing.wordpress.title') }}</h2>
                    <p class="lead mb-5 mb-lg-0">{{ __('landing.wordpress.description') }}</p><br />
                    <a href="{{ get_wordpress_plugin_url() }}" class="btn btn-secondary"><i class="fas fa-download mr-2"></i> {{ __('landing.wordpress.btn') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

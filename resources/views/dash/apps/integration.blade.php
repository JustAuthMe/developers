@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('dash.integration.application-integration') }}</h1>

    <div class="card mb-3">
        <div class="card-body d-flex flex-column justify-content-center align-items-center" id="card">
            @if($status == 'success')

                <h2>{{ __('dash.integration.its-ready') }}</h2>
                <div class="w-25 mt-3 mb-3">
                    <img src="{{ asset('img/illustrations/undraw_completed_ngx6.svg') }}" alt="Welcome"
                         class="img-fluid">
                </div>
                <p>{{ __('dash.integration.thank-phrase') }}</p>
                <a href="{{ $app->url }}/wp-content/plugins/justauthme/init.php?app_id={{ $app->app_id }}&secret={{ $app->secret }}"
                   class="btn btn-primary btn-lg">{{ __('dash.integration.finish') }}</a>
            @elseif($status == 'confirm')
                <h2>{{ __('dash.integration.confirm') }}</h2>
                <div class="w-25 mt-3 mb-3">
                    <img src="{{ asset('img/illustrations/undraw_choice.svg') }}" alt="Confirm"
                         class="img-fluid">
                </div>
                <h5>{{ __('dash.integration.confirm-question', ['platform' => $platform]) }}</h5>
                <div class="d-flex flex-row">
                    <a href="?confirm" class="btn btn-lg btn-primary mr-3">{{ __('dash.yes') }}</a>
                    <a href="{{ url('/dash/integration/abort') }}" class="btn btn-lg btn-outline-secondary">{{ __('dash.cancel') }}</a>
                </div>
            @else
                <h2>{{ __('dash.oops') }}</h2>
                <div class="w-25 mt-3 mb-3">
                    <img src="{{ asset('img/illustrations/undraw_server_down_s4lk.svg') }}" alt="Error"
                         class="img-fluid">
                </div>

                @switch($type)
                    @case('failed_verification')
                    <p>{{ __('dash.integration.alerts.failed-verification') }}</p>
                    @break

                    @case('already_exists')
                    <p>{{ __('dash.integration.alerts.already-exists') }}</p>
                    @break
                @endswitch
                <a href="mailto:developers@justauth.me"
                   class="btn btn-outline-secondary btn-lg">{{ __('dash.contact-support') }}</a>
            @endif
        </div>
    </div>
@endsection

@extends('layouts.dash')

@section('content')
    @if(session()->has('integration') && isset(session()->get('integration')['url']) && !request()->is('dash/apps/create-integration'))
        <div class="card card-icon mb-4" style="overflow: hidden; display: none;" id="alert-integration">
            <div class="row no-gutters">
                <div class="col-auto bg-gradient-primary d-flex align-items-center justify-content-center p-5" style="font-size: 3rem;">
                    <i class="fas fa-plug text-white-50"></i>
                </div>
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('dash.integration.complete-integration') }}</h5>
                        <p>{!! __('dash.integration.complete-integration-phrase', ['url' => session()->get('integration')['url']]) !!}</p>
                        <a href="{{ url('dash/apps/create-integration') }}" class="btn btn-primary btn-sm">{{ __('dash.integration.continue-here') }}</a>
                        <a href="{{ url('dash/integration/abort') }}" class="btn btn-outline-secondary btn-sm">{{ __('dash.integration.ignore') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @php($load_js[] = "$('#alert-integration').show(1000);")
    @endif

    <h1 class="h3 mb-4 text-gray-800">Applications</h1>

    <div class="card">
        <div class="card-body">
            <p>
                <a href="{{ action('Dash\AppsController@create') }}" class="btn btn-primary"><?= __('dash.apps.create-an-app'); ?></a>
                <a href="{{ url('/dash/integration/setup?type=wordpress') }}" class="btn btn-secondary"><i class="fab fa-wordpress-simple mr-2"></i> <?= __('dash.apps.create-wordpress'); ?></a>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th col="1"></th>
                    <th><?= __('dash.apps.name'); ?></th>
                    <th><?= __('dash.apps.url'); ?></th>
                    <th><?= __('dash.apps.owner'); ?></th>
                    <th><?= __('dash.action'); ?></th>
                </tr>
                </thead>
                <tbody>
                @foreach($apps as $app)
                    <tr>
                        <td><img src="{{ $app->logo }}" width="25" class="rounded-circle" alt=""></td>
                        <td>
                            {{ $app->name }}
                        </td>
                        <td><a href="{{ $app->url }}" target="_blank">{{ $app->url }}</a></td>
                        <td>
                            @if(get_class($app->getOwner()) == \App\User::class) <i class="fas fa-user fa-fw"></i> {{ $app->getOwner()->username }} @endif
                            @if(get_class($app->getOwner()) == \App\Organization::class) <i class="fas fa-building fa-fw"></i> {{ $app->getOwner()->name }} @endif
                        </td>
                        <td>
                            <a href="{{ action('Dash\AppsController@edit', $app->id) }}" class="btn btn-secondary btn-sm"><?= __('dash.apps.manage'); ?></a>
                            <a href="{{ get_jam_url($app->app_id, $app->redirect_url) }}" target="_blank" class="btn btn-primary btn-sm"><?= __('dash.user.login'); ?></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

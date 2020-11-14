@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Applications</h1>

    <div class="card">
        <div class="card-body">
            <p>
                <a href="{{ action('Dash\AppsController@create') }}" class="btn btn-primary"><?= __('dash.apps.create-an-app'); ?></a>
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

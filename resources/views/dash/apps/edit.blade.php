@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"><?= __('dash.apps.application-management'); ?></h1>

    <div class="card mb-3">
        <div class="card-body">
            {{ Form::model($app, ['method' => 'PUT', 'url' => action("Dash\AppsController@update", $app->id), 'enctype' => 'multipart/form-data']) }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('name', __('dash.apps.name')) }}
                        {{ Form::text('name', $app->name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-sm-10">
                            {{ Form::label('logo', __('dash.apps.logo')) }}
                            {{ Form::file('logo', ['class' => 'form-control-file']) }}
                        </div>
                        <div class="col-sm-2 text-right">
                            <img src="{{ $app->logo }}" width="50" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('redirect_url', __('dash.apps.redirect-url')) }}
                        {{ Form::text('redirect_url', $app->redirect_url, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            {{ Form::checkbox('dev', 1, $app->dev, ['class' => 'form-check-input', 'id' => 'devCheck']) }}
                            <label class="form-check-label" for="devCheck">
                                <?= __('dash.apps.dev-mode'); ?>
                            </label>
                            <small><span class="text text-warning"><i class="fas fa-exclamation-triangle"></i> {{ __('dash.apps.dev-mode-warning') }}</span></small>
                        </div>
                        <small><?= __('dash.apps.dev-mode-help'); ?></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url"><?= __('dash.apps.url'); ?></label>
                        <input type="text" id="url" value="{{ $app->url }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="app_id"><?= __('dash.apps.app-id'); ?></label>
                        <input type="text" id="app_id" value="{{ $app->app_id }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="secret"><?= __('dash.apps.secret-key'); ?></label>
                        <input type="hidden" id="real-secret" value="{{ $app->secret }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" onclick="hideShowSecret(this)">
                                    <?= __('dash.show'); ?>
                                </button>
                            </div>
                            <input type="text" id="secret" value="****************" class="form-control" disabled>
                            <div class="input-group-append">
                                <a onclick="return confirm('<?= __('dash.are-you-sure'); ?>')" href="?revoke_secret"
                                   class="btn btn-outline-warning" type="button"><?= __('dash.apps.renew-key'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <label><?= __('dash.apps.data'); ?></label><br/>
            <div class="mb-2">
                <small>{{ __('dash.apps.data-help') }}</small>
            </div>

            @include('dash.apps.data-selector', ['available_category' => \App\App::$data_available])

            {{ Form::submit(__('dash.submit'), ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <?= __('dash.apps.owner'); ?> :
                @if(get_class($app->getOwner()) == \App\User::class)
                    {{ $app->getOwner()->username }} (<?= __('dash.user.user'); ?>)
                @elseif(get_class($app->getOwner()) == \App\Organization::class)
                    <a href="{{ url(action('Dash\OrganizationsController@manage',  $app->getOwner())) }}">{{ $app->getOwner()->name }}</a>
                    (<?= __('dash.organizations.organization'); ?>)
                @endif
            </div>

            @if(get_class($app->getOwner()) == \App\User::class || auth()->user()->organizations()->where('organization_id', $app->getOwner()->id)->get()->first()->pivot->role == \App\Organization::ROLE_OWNER)
                @include('dash.apps.owner_transfer')
            @endif
        </div>
    </div>

@endsection

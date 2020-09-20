@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"><?= __('dash.apps.edit-an-app'); ?></h1>
    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="domain"><?= __('dash.apps.domain'); ?></label>
                        <input type="text" id="domain" value="{{ $app->domain }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="app_id"><?= __('dash.apps.app-id'); ?></label>
                        <input type="text" id="app_id" value="{{ $app->app_id }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="secret"><?= __('dash.apps.secret'); ?></label>
                        <input type="hidden" id="real-secret" value="{{ $app->secret }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" onclick="hideShowSecret(this)">
                                    <?= __('dash.apps.see'); ?>
                                </button>
                            </div>
                            <input type="text" id="secret" value="********" class="form-control" disabled>
                        </div>
                        <a href="?revoke_secret"
                           onclick="return confirm('<?= __('dash.are-you-sure'); ?>')"
                           class="btn btn-outline-warning btn-sm"><?= __('dash.apps.revoke'); ?></a>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <?= __('dash.apps.owner'); ?> :
                        @if(get_class($app->getOwner()) == \App\User::class)
                            {{ $app->getOwner()->username }} (Utilisateur)
                        @endif
                        @if(get_class($app->getOwner()) == \App\Organization::class)
                            <a href="{{ url(action('Dash\OrganizationsController@manage',  $app->getOwner())) }}">{{ $app->getOwner()->name }}</a>
                            (Organisation)
                        @endif
                        @if(get_class($app->getOwner()) == \App\User::class || auth()->user()->organizations()->where('organization_id', $app->getOwner()->id)->get()->first()->pivot->role == \App\Organization::ROLE_OWNER)
                            <br /><br />
                            <h5><?= __('dash.apps.transfer-to-user'); ?></h5>
                            @include('dash.apps.owner_transfer')
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card mb-3">
                <div class="card-body">
                    {{ Form::model($app, ['method' => 'PUT', 'url' => action("Dash\AppsController@update", $app->id), 'enctype' => 'multipart/form-data']) }}
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
                        </div>
                        <small><?= __('dash.apps.dev-mode-help'); ?></small>
                    </div>
                    <label><?= __('dash.apps.data'); ?></label>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th><?= __('dash.apps.data-label'); ?></th>
                            <th><?= __('dash.apps.desired'); ?></th>
                            <th><?= __('dash.apps.required'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= __('dash.apps.email'); ?></td>
                            <td><input type="checkbox" checked="checked" disabled></td>
                            <td><input type="checkbox" checked="checked" disabled></td>
                        </tr>
                        <?php foreach (\App\App::$data_available as $data){ ?>
                        <tr>
                            <td><?= __('dash.apps.'.$data); ?></td>
                            <td><input type="checkbox"
                                       name="retrieve_<?= $data; ?>" <?= (in_array($data, $app->data) || in_array($data.'!' , $app->data)) ? 'checked="checked"' : ''; ?>>
                            </td>
                            <td><input type="checkbox"
                                       name="require_<?= $data; ?>" <?= (in_array($data.'!', $app->data)) ? 'checked="checked"' : ''; ?>>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection

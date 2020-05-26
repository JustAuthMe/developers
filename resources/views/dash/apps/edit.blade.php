@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Modifier une application</h1>
    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="domain">Domaine</label>
                        <input type="text" id="domain" value="{{ $app->domain }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="app_id">App ID</label>
                        <input type="text" id="app_id" value="{{ $app->app_id }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="secret">Clé secrète</label>
                        <input type="hidden" id="real-secret" value="{{ $app->secret }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" onclick="hideShowSecret(this)">
                                    Voir
                                </button>
                            </div>
                            <input type="text" id="secret" value="********" class="form-control" disabled>
                        </div>
                        <a href="?revoke_secret"
                           onclick="return confirm('Souhaitez-vous révoquer la clé secrète ? Elle deviendra inutilisable.')"
                           class="btn btn-outline-warning btn-sm">Révoquer</a>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        Propriétaire :
                        @if(get_class($app->getOwner()) == \App\User::class)
                            {{ $app->getOwner()->username }} (Utilisateur)
                        @endif
                        @if(get_class($app->getOwner()) == \App\Organization::class)
                            <a href="{{ url(action('Dash\OrganizationsController@manage',  $app->getOwner())) }}">{{ $app->getOwner()->name }}</a>
                            (Organisation)
                        @endif
                        @if(get_class($app->getOwner()) == \App\User::class || auth()->user()->organizations()->where('organization_id', $app->getOwner()->id)->get()->first()->pivot->role == \App\Organization::ROLE_OWNER)
                            <br /><br />
                            <h5>Transférer à un utilisateur</h5>
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
                        {{ Form::label('name', 'Nom') }}
                        {{ Form::text('name', $app->name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-sm-10">
                            {{ Form::label('logo', 'Logo') }}
                            {{ Form::file('logo', ['class' => 'form-control-file']) }}
                        </div>
                        <div class="col-sm-2 text-right">
                            <img src="{{ $app->logo }}" width="50" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('redirect_url', 'URL de redirection') }}
                        {{ Form::text('redirect_url', $app->redirect_url, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            {{ Form::checkbox('dev', 1, $app->dev, ['class' => 'form-check-input', 'id' => 'devCheck']) }}
                            <label class="form-check-label" for="devCheck">
                                Mode développeur
                            </label>
                        </div>
                        <small>Le mode développeur permet d'autoriser la redirection sur n'importe quelle adresse IP
                            locale.</small>
                    </div>
                    <label>Données</label>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Donnée</th>
                            <th>Souhaitée</th>
                            <th>Obligatoire</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Adresse e-mail</td>
                            <td><input type="checkbox" checked="checked" disabled></td>
                            <td><input type="checkbox" checked="checked" disabled></td>
                        </tr>
                        <?php foreach (\App\App::$data_available as $data => $data_name){ ?>
                        <tr>
                            <td><?= $data_name; ?></td>
                            <td><input type="checkbox"
                                       name="retrieve_<?= $data; ?>" <?= (in_array($data, $app->data) || in_array('!' . $data, $app->data)) ? 'checked="checked"' : ''; ?>>
                            </td>
                            <td><input type="checkbox"
                                       name="require_<?= $data; ?>" <?= (in_array('!' . $data, $app->data)) ? 'checked="checked"' : ''; ?>>
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

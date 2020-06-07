@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Créer une application</h1>

    <div class="card mb-3">
        <div class="card-body">
            {{ Form::model($app, ['method' => 'POST', 'url' => action("Dash\AppsController@store", $app->id), 'enctype' => 'multipart/form-data']) }}
            <div class="form-group">
                {{ Form::label('name', 'Nom') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('logo', 'Logo') }}
                {{ Form::file('logo', ['class' => 'form-control-file']) }}
            </div>
            <div class="form-group">
                {{ Form::label('domain', 'Domaine') }}
                {{ Form::text('domain', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('redirect_url', 'URL de redirection') }}
                {{ Form::text('redirect_url', 'https://', ['class' => 'form-control']) }}
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
                               name="retrieve_<?= $data; ?>" <?= (isset($_POST['retrieve_' . $data])) ? 'checked="checked"' : ''; ?>>
                    </td>
                    <td><input type="checkbox"
                               name="require_<?= $data; ?>" <?= (isset($_POST['require_' . $data])) ? 'checked="checked"' : ''; ?>>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

            {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection

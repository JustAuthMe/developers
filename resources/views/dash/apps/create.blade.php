@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"><?= __('dash.apps.create-an-app'); ?></h1>

    <div class="card mb-3">
        <div class="card-body">
            {{ Form::model($app, ['method' => 'POST', 'url' => action("Dash\AppsController@store", $app->id), 'enctype' => 'multipart/form-data']) }}
            <div class="form-group">
                {{ Form::label('name', __('dash.apps.name')) }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('logo', __('dash.apps.logo')) }}
                {{ Form::file('logo', ['class' => 'form-control-file']) }}
            </div>
            <div class="form-group">
                {{ Form::label('domain', __('dash.apps.domain')) }}
                {{ Form::text('domain', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('redirect_url', __('dash.apps.redirect-url')) }}
                {{ Form::text('redirect_url', 'https://', ['class' => 'form-control']) }}
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

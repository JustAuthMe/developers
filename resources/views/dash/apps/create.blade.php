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
                {{ Form::label('url', __('dash.apps.url')) }}
                {{ Form::text('url', 'https://', ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('redirect_url', __('dash.apps.redirect-url')) }}
                {{ Form::text('redirect_url', 'https://', ['class' => 'form-control']) }}
            </div>

            <label><?= __('dash.apps.data'); ?></label><br />
            <div class="mb-2">
                <small>Naviguez dans les catégories ci-dessous pour séléctionner les données que vous souhaitez récupérer.</small>
            </div>

            @include('dash.apps.data-selector', ['available_category' => \App\App::$data_available])

            {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection

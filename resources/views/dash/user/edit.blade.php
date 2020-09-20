@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Profil</h1>

    <div class="card">
        <div class="card-body">
            {{ Form::model($user, ['method' => 'PUT']) }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('email', __('dash.user.email')) }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('firstname', __('dash.user.lastname')) }}
                        {{ Form::text('firstname', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('lastname', __('dash.user.firstname')) }}
                        {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('password', __('dash.user.password')) }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password_confirmation', __('dash.user.password-confirmation')) }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    </div>
                    @if(!$user->jam_id)
                        <p><?= __('dash.user.jam-reason'); ?></p>
                        <a href="{{ get_jam_url() }}" class="btn btn-block btn-primary"><?= __('dash.user.jam-link'); ?></a>
                    @else
                        <p class="text-secondary"><?= __('dash.user.jam-linked'); ?></p>
                    @endif
                </div>
            </div>
            {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection

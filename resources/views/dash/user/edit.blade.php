@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <div class="card">
        <div class="card-body">
            {{ Form::model($user, ['method' => 'PUT']) }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('email', 'Adresse e-mail') }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('firstname', 'Nom') }}
                        {{ Form::text('firstname', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('lastname', 'Prénom') }}
                        {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('password', 'Mot de passe') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password_confirmation', 'Confirmation du mot de passe') }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    </div>
                    @if(!$user->jam_id)
                        <p>Vous ne voulez plus utiliser de mots de passe ? </p>
                        <a href="{{ get_jam_url() }}" class="btn btn-block btn-primary">Lier votre compte JustAuthMe</a>
                    @else
                        <p class="text-secondary">Votre compte est lié à JustAuthMe mais vous pouvez redéfinir un mot de passe pour le délier.</p>
                    @endif
                </div>
            </div>
            {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection

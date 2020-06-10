@extends('layouts.dash_guest')

@section('content')

    <div class="card">
        <div class="card-header">Inscription</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                @if(isset($invitation))
                    <input type="hidden" name="token" value="{{ $invitation->token }}">

                @endif
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Adresse e-mail</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ (isset($invitation)) ? $invitation->email : old('email') }}"
                               {{ (isset($invitation) ? 'readonly="readonly"' : 'required') }} autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-md-4 col-form-label text-md-right">Confirmation du mot de passe</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">
                    </div>
                </div>

                <p>En vous inscrivant, vous acceptez les <a href="https://justauth.me/p/conditions-generales-dutilisation" target="_blank">conditions générales d'utilisation</a>.</p>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Inscription
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="btn btn-secondary">Connexion</a>
        <a href="{{ get_jam_url() }}" class="btn btn-primary">Connexion avec JustAuthMe</a>
    </div>

@endsection

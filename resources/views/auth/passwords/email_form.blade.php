@extends('layouts.dash_guest')

@section('content')
    <a href="{{ url('/dash/login') }}" class="btn btn-secondary">Retour</a><br /><br />
    <div class="card">
        <div class="card-header">Réinitialiser votre mot de passe</div>

        <div class="card-body">
            <form class="d-inline" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

@endsection

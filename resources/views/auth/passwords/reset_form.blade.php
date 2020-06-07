@extends('layouts.dash_guest')

@section('content')

    <div class="card">
        <div class="card-header">Réinitialiser votre mot de passe</div>

        <div class="card-body">
            <form class="d-inline" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" class="form-control" name="password"  required autofocus>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmation du mot de passe</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">Réinitialiser</button>
            </form>
        </div>
    </div>

@endsection

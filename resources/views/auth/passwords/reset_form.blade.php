@extends('layouts.dash_guest')

@section('content')

    <div class="card">
        <div class="card-header"><?= __('dash.user.reset-password'); ?></div>

        <div class="card-body">
            <form class="d-inline" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="password"><?= __('dash.user.password'); ?></label>
                    <input id="password" type="password" class="form-control" name="password"  required autofocus>
                </div>
                <div class="form-group">
                    <label for="password_confirmation"><?= __('dash.user.password-confirmation'); ?></label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary"><?= __('dash.submit'); ?></button>
            </form>
        </div>
    </div>

@endsection

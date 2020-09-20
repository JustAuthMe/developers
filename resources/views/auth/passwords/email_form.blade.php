@extends('layouts.dash_guest')

@section('content')
    <a href="{{ url('/dash/login') }}" class="btn btn-secondary"><?= __('dash.back'); ?></a><br /><br />
    <div class="card">
        <div class="card-header"><?= __('dash.user.reset-password'); ?></div>

        <div class="card-body">
            <form class="d-inline" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="email"><?= __('dash.user.email'); ?></label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <button type="submit" class="btn btn-primary"><?= __('dash.submit'); ?></button>
            </form>
        </div>
    </div>

@endsection

@extends('layouts.dash_guest')

@section('content')
    <div class="text-center mb-3">
        <a href="{{ get_jam_url() }}" class="jam-button">
            <div class="jam-btn-content">
                <div class="jam-btn-logo">
                    <img src="https://static.justauth.me/medias/2_WHITE.png"/>
                </div>
                <div class="jam-btn-text">
                    <?= __('dash.user.login-with');?>
                    <span class="jam-btn-brand">
                <span class="jam-btn-bold">JustAuth</span><span class="jam-btn-thin">Me</span>
            </span>
                </div>
            </div>
        </a>
    </div>

    <div class="card">
        <div class="card-header"><?= __('dash.user.login');?></div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email"><?= __('dash.user.email');?></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div class="form-group">
                    <label for="password"><?= __('dash.user.password');?></label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password">
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            <?= __('dash.user.remember-me');?>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <?= __('dash.user.login');?>
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ url('/dash/password') }}">
                            <?= __('dash.user.password-lost');?>
                        </a>
                    @endif
                </div>
            </form>

        </div>
    </div>
@endsection

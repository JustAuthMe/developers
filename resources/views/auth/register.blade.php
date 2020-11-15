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
        <div class="card-header">{{ __('dash.user.register') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                @if(isset($invitation))
                    <input type="hidden" name="token" value="{{ $invitation->token }}">
                @endif

                <div class="form-group">
                    <label for="email"><?= __('dash.user.email');?></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ (isset($invitation)) ? $invitation->email : old('email') }}"
                           {{ (isset($invitation) ? 'readonly="readonly"' : 'required') }} autocomplete="email">
                </div>

                <div class="form-group">
                    <label for="password"><?= __('dash.user.password');?></label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="password-confirm"><?= __('dash.user.password-confirmation');?></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password">
                </div>

                <p><?= __('dash.user.terms-register', ['url' => 'https://justauth.me/p/conditions-generales-dutilisation']);?></p>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <?= __('dash.user.register');?>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

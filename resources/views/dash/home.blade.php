@extends('layouts.dash')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">JustAuthMe Dash</h4>
            <p>
                <?= __('dash.home.welcome-message'); ?><br /><br />
                <a href="{{ url(action('Dash\AppsController@create')) }}" class="btn btn-secondary"><?= __('dash.home.create-an-app'); ?></a>
            </p>
            
        </div>
    </div>
@endsection

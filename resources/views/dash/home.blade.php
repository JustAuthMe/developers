@extends('layouts.dash')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">JustAuthMe Dash</h4>
            <p>
                Bienvenue sur la plateforme destinée aux développeurs, vous pouvez ici générer des identifiants pour intégrer JustAuthMe sur vos applications.<br /><br />
                <a href="{{ url(action('Dash\AppsController@create')) }}" class="btn btn-secondary">Créer une application</a>

            </p>
            
        </div>
    </div>
@endsection

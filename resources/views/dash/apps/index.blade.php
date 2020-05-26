@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Applications</h1>

    <div class="card">
        <div class="card-body">
            <p>
                <a href="{{ action('Dash\AppsController@create') }}" class="btn btn-primary">Créer une
                    application</a>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th col="1"></th>
                    <th>Nom</th>
                    <th>Domaine</th>
                    <th>Propriétaire</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($apps as $app)
                    <tr>
                        <td><img src="{{ $app->logo }}" width="25" class="rounded-circle" alt=""></td>
                        <td>
                            {{ $app->name }}
                        </td>
                        <td>{{ $app->domain }}</td>
                        <td>
                            @if(get_class($app->getOwner()) == \App\User::class) {{ $app->getOwner()->username }} (Utilisateur) @endif
                            @if(get_class($app->getOwner()) == \App\Organization::class) <a href="{{ url(action('Dash\OrganizationsController@manage',  $app->getOwner())) }}">{{ $app->getOwner()->name }}</a> (Organisation) @endif
                        </td>
                        <td>
                            <a href="{{ action('Dash\AppsController@edit', $app->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                            <a href="{{ get_jam_url($app->app_id, $app->redirect_url) }}" target="_blank" class="btn btn-primary btn-sm">Se connecter</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

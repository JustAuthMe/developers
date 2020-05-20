@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Gérer une organisation</h1>

    <div class="row">
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Paramètres généraux</h5>
                    @include('dash.organizations.form', ['action' => 'update'])
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Inviter un nouvel utilisateur</h5>
                    {{ Form::open(['method' => 'POST', 'url' => action('Dash\OrganizationsController@invite', $organization)]) }}
                    <div class="form-group">
                        {{ Form::label('email', 'Adresse e-mail') }}
                        {{ Form::email('email', null, ['class' => 'form-control']) }}
                    </div>
                    {{ Form::submit('Inviter', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Rôle</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($organization->users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{!! readable_role($user->pivot->role) !!}</td>
                        <td>
                            @if($user->id != auth()->user()->id)
                                @if($user->pivot->role == \App\Organization::ROLE_USER)
                                    <a href="{{ action('Dash\OrganizationsController@changeMemberRole', ['id' => $organization->id, 'user_id' => $user->id, 'role' => \App\Organization::ROLE_ADMIN]) }}"
                                       class="btn btn-outline-warning btn-sm"
                                       onclick="return confirm('Souhaitez-vous promouvoir cet utilisateur au rôle d\'administrateur ? ')">Promouvoir</a>
                                @endif
                                @if($user->pivot->role == \App\Organization::ROLE_ADMIN)
                                    <a href="{{ action('Dash\OrganizationsController@changeMemberRole', ['id' => $organization->id, 'user_id' => $user->id, 'role' => \App\Organization::ROLE_USER]) }}"
                                       class="btn btn-outline-warning btn-sm"
                                       onclick="return confirm('Souhaitez-vous destituer cet utilisateur au rôle de développeur ? ')">Destituer</a>
                                @endif
                                @if($user->pivot->role < \App\Organization::ROLE_OWNER)
                                    <a href="{{ action('Dash\OrganizationsController@removeMember', ['id' => $organization->id, 'user_id' => $user->id]) }}"
                                       class="btn btn-outline-danger btn-sm"
                                       onclick="return confirm('Souhaitez-vous retirer cet utilisateur de l\'organisation ?')">Retirer</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

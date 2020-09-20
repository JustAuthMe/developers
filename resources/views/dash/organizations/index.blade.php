@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"><?= __('dash.organizations.organization'); ?></h1>

    <div class="card">
        <div class="card-body">
            <p>
                <a href="{{ action('Dash\OrganizationsController@create') }}" class="btn btn-primary"><?= __('dash.organizations.create-an-organization'); ?></a>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th><?= __('dash.organizations.name'); ?></th>
                    <th><?= __('dash.organizations.role'); ?></th>
                    <th><?= __('dash.organizations.action'); ?></th>
                </tr>
                </thead>
                <tbody>
                @foreach($organizations as $organization)
                    <tr>
                        <td>{{ $organization->name }}</td>
                        <td>{!! readable_role($organization->pivot->role) !!}</td>
                        <td>
                            @if($organization->pivot->role >= \App\Organization::ROLE_ADMIN)
                                <a href="{{ action('Dash\OrganizationsController@manage', $organization) }}"
                                   class="btn btn-secondary btn-sm"><?= __('dash.organizations.manage'); ?></a>
                            @endif
                            @if($organization->pivot->role < \App\Organization::ROLE_OWNER)
                                <a href="{{ action('Dash\OrganizationsController@removeMember', ['id' => $organization->id, 'user_id' => auth()->user()->id]) }}"
                                   class="btn btn-outline-warning btn-sm"><?= __('dash.organizations.leave'); ?></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

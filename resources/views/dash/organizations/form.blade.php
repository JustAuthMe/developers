{{ Form::model($organization, ['method' => $action == 'store' ? 'POST' : 'PUT', 'url' => action("Dash\OrganizationsController@$action", $organization)]) }}
<div class="form-group">
    {{ Form::label('name', 'Nom') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

{{ Form::submit(null, ['class' => 'btn btn-primary']) }}
{{ Form::close() }}

<div class="row">
    <div class="col-md-6">
        <h5><?= __('dash.apps.transfer-to-user'); ?></h5>
        {{ Form::open(['method' => 'PUT', 'url' => action("Dash\AppsController@changeOwner", $app->id)]) }}
        <div class="form-group">
            {{ Form::label('email', __('dash.user.email')) }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
        </div>
        <input type="hidden" name="type" value="user">
        {{ Form::submit(null, ['class' => 'btn btn-secondary btn-sm']) }}
        {{ Form::close() }}
    </div>
    <div class="col-md-6">
        @if(!auth()->user()->organizations->isEmpty())
            <h5><?= __('dash.apps.transfer-to-organization'); ?></h5>
            {{ Form::open(['method' => 'PUT', 'url' => action("Dash\AppsController@changeOwner", $app->id)]) }}
            <input type="hidden" name="type" value="organization">
            <div class="form-group">
                {{ Form::label('email', __('dash.organizations.organization')) }}
                <select class="form-control" name="organization_id">
                    @foreach(auth()->user()->organizations as $organization)
                        <option value="{{ $organization->id }}">
                            {{$organization->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            {{ Form::submit(null, ['class' => 'btn btn-secondary btn-sm']) }}
            {{ Form::close() }}
        @endif
    </div>
</div>



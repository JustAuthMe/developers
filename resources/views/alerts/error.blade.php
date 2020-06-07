@if (session('errors'))
    <div class="alert alert-danger" role="alert">
        Des erreurs sont survenues :
        <ul>
            @foreach(session('errors')->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {!! session('error') !!}
    </div>
@endif

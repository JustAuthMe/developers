@extends('layouts.dash')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Créer une organisation</h1>

    <div class="card">
        <div class="card-body">
            @include('dash.organizations.form', ['action' => 'store'])
        </div>
    </div>
@endsection

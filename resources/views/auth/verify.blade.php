@extends('layouts.dash_guest')

@section('content')

    <div class="card">
        <div class="card-header">Vérifiez votre adresse e-mail</div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    Un nouveau lien de vérification a été envoyé à cette adresse e-mail.
                </div>
            @endif

                Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.
                Si vous n'avez pas reçu l'e-mail,
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                        class="btn btn-link p-0 m-0 align-baseline">cliquez ici pour en demander un autre</button>
                .
            </form>
        </div>
    </div>

@endsection

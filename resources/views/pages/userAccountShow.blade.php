@extends('layout.layout')
@section('content')
    @include('inc.flash')

    <div class="mt-2">
        <a href="{{ route('blog.index') }}"><button class="mb-2">Retour Conseils de Pro & Actualités</button></a>
    </div>

    <div class="bg-light px-2">
        <h3>Mon compte utilisateur :</h3>
        <div>
            <b>Utilisateur :</b> {{ $user->userName }}
        </div>
        <div class="mt-2">
            <b>Identité :</b>

            {{ $user->firstName }} {{ $user->lastName }}
        </div>
        <div class="mt-2">
            <b>Coordonées :</b>
            <ul>
                <li><b>Email :</b> {{ $user->email }}
                </li>
                <li><b>Téléphone :</b> {{ $user->phoneNumber }}
                </li>
                <li><b>Adresse :</b> {{ $user->streetAddress }}
                </li>
                <li><b>Ville :</b> {{ $user->postcode }} {{ $user->city }}
                </li>
                <li><b>Pays :</b> {{ $user->country }}
                </li>
        </div>
        <div class="mt-2">
            <b>Conditions Générales d'Utilisation acceptées :</b> {{ $user->gtc ? 'Oui' : 'Non' }}
        </div>
    </div>
    <div class="mt-2">
        <a href="{{ route('user.update', auth()->user()->id) }}"><button class="mb-2">Modifier mon compte</button></a>
    </div>

@endsection

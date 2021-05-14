@extends('layout.layoutAdmin')
@section('content')

<div>
    Utilisateur :  {{ $user->userName }}
</div>
<div>
    Identité : {{ $user->lastName }} {{ $user->firstName }}
</div>
<div>
Coordonées :
Email : {{ $user->email }}
Téléphone : {{ $user->phoneNumber }}
Adresse :  {{ $user->address }} -  {{ $user->postcode }}  {{ $user->city }} -  {{ $user->country }}
</div>
<div>
Divers :
Administrateur : {{ $user->Administrator ? '@mdo' : 'Non' }}
Conditions Générales d'Utilisation acceptées : {{ $user->gtc ? 'Oui' : 'Non' }}
</div>

@endsection

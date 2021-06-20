@extends('layout.layout')
@section('content')

    <h1>Isolation thermique par l'extérieur</h1>
    <div class="d-flex justify-content-center">
        <div class="bg-light text-dark p-2" align="justify">
            <div class="d-flex flex-column flex-lg-row justify-content-center">
                <img src={{ asset('/images/homePage/latu-ite.jpg') }} class="img-fluid m-2 img-metier"
                    alt="Latu isolation ITE">
                <img src={{ asset('/images/homePage/latu-ite2.jpg') }} class="img-fluid m-2 img-metier"
                    alt="Latu isolation ITE">
            </div>
        <p class="text-metier mt-2">
                Nous réalisons une isolation qui consiste à entourer, par l’extérieur, votre maison d’une couverture de
                matériaux isolants.
            </p>
            <p class="text-metier">
                Cette opération élimine les ponts thermiques et vous permet de réduire vos coût de chauffage.
            </p>
        </div>
    </div>
@endsection

@extends('layout.layout')
@section('content')

    <h1>Peinture</h1>
    <div class="d-flex justify-content-center">
        <div class="bg-light text-dark p-2" align="justify">
            <div class="d-flex justify-content-center">
                <img src={{ asset('/images/homePage/latu-peinture.jpg') }} class="img-fluid mx-2 img-metier"
                    alt="Latu peinture" width="auto" height="auto">
                <img src={{ asset('/images/homePage/latu-peinture2.jpg') }} class="img-fluid mx-2 img-metier"
                    alt="Latu peinture" width="auto" height="auto">
            </div>
            <p class="text-metier mt-2">
                Nous intervenons dans les bâtiments industriels, les logements collectifs ainsi que les particuliers.
            </p>
            <p class="text-metier">
                Nous déposons un film de peinture mat, velouté ou satiné sur tous supports après une préparation réalisée
                par nos soins.
            </p>
            <p class="text-metier">
                Nous réalisons aussi des peintures extérieures en film mince ou semi-épais ainsi que le traitement des
                imperméabilités.
            </p>
            <p class="text-metier">
                La peinture de sol à base de résine époxy fait partie de notre savoir-faire.
            </p>
        </div>
    </div>
@endsection

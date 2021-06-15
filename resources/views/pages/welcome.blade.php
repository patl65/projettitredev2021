@extends('layout.layout')
@section('content')

    <h1>Nos métiers</h1>

    <div class="row d-flex justify-content-sm-between mx-5 mb-5">

        <div class="card my-3 card-shadow" style="width: 26rem;">
            <div class="card-body">
                <h5 class="card-title">La peinture</h5>
                <div class="d-flex justify-content-center">
                    <img src={{ asset('/images/homePage/latu-peinture.jpg') }} class="img-fluid mx-2 img-metier"
                        alt="Latu peinture" width="auto" height="auto">
                    <img src={{ asset('/images/homePage/latu-peinture2.jpg') }} class="img-fluid mx-2 img-metier"
                        alt="Latu peinture" width="auto" height="auto">
                </div>
                <p class="card-text mt-2" align="justify">
                    Nous intervenons dans les bâtiments industriels, les logements collectifs ainsi que les particuliers.
                    <br>
                    Nous déposons un film de peinture mat, velouté ou satiné sur tous supports après une préparation
                    réalisée par nos soins.
                    <br>
                    Nous réalisons aussi des peintures extérieures en film mince ou semi-épais ainsi que le traitement des
                    imperméabilités.
                    <br>
                    La peinture de sol à base de résine époxy fait partie de notre savoir-faire.
                </p>
            </div>
        </div>

        <div class="card my-3 card-shadow" style="width: 26rem;">
            <div class="card-body">
                <h5 class="card-title">Les sols</h5>
                <div class="d-flex justify-content-center">
                    <img src={{ asset('/images/homePage/latu-sol.jpg') }} class="img-fluid mx-2 img-metier" alt="Latu sol"
                        width="auto" height="auto">
                    <img src={{ asset('/images/homePage/latu-sol2.jpg') }} class="img-fluid mx-2 img-metier"
                        alt="Latu sol" width="auto" height="auto">
                </div>
                <p class="card-text mt-2" align="justify">
                    Nous faisons les ragréages et la pose de pvc, lino, moquette et parquet.
                    <br>
                    Tous type de pose soit tendue, collée ou clipsée.
                </p>
            </div>
        </div>

        <div class="card my-3 card-shadow" style="width: 26rem;">
            <div class="card-body">
                <h5 class="card-title">L'isolation thermique par l'extérieur</h5>
                <div class="d-flex justify-content-center">
                    <img src={{ asset('/images/homePage/latu-ite.jpg') }} class="img-fluid mx-2 img-metier"
                        alt="Latu isolation ITE" width="auto" height="auto">
                    <img src={{ asset('/images/homePage/latu-ite2.jpg') }} class="img-fluid mx-2 img-metier"
                        alt="Latu isolation ITE" width="auto" height="auto">
                </div>
                <p class="card-text mt-2" align="justify">
                    Nous réalisons une isolation qui consiste à entourer, par l’extérieur, votre maison d’une couverture de
                    matériaux isolants.
                    <br>
                    Cette opération élimine les ponts thermiques et vous permet de réduire vos coût de chauffage.
                </p>
            </div>

        </div>

        <div class="container card card-entreprise mt-5 card-shadow">
            <p class="card-text m-2" align="justify">L'entreprise Latu fondée en 1928 est présente en Bigorre sur la côte
                Basque et sur Bordeaux.</p>
        </div>

    </div>

@endsection

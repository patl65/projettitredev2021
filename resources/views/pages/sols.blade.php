@extends('layout.layout')
@section('content')

    <h1>Sols</h1>
    <div class="d-flex justify-content-center">
        <div class="bg-light text-dark p-2" align="justify">
            <div class="d-flex flex-column flex-lg-row justify-content-center">
                <img src={{ asset('/images/homePage/latu-sol.jpg') }} class="img-fluid m-2 img-metier"
                    alt="Latu sol">
                <img src={{ asset('/images/homePage/latu-sol2.jpg') }} class="img-fluid m-2 img-metier"
                    alt="Latu sol">
            </div>
        <p class="text-metier mt-2">
                Nous faisons les ragréages et la pose de pvc, lino, moquette et parquet.
            </p>
            <p class="text-metier">
                Tous type de pose soit tendue, collée ou clipsée.
            </p>
        </div>
    </div>
@endsection

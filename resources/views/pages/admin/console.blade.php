{{-- @extends('layout.layoutAdmin') --}}
@extends('layout.layoutAdmin')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card bg-secondary text-primary border-primary rounded-pill shadow-lg p-2">
            <div class="card-body">
                <center><i>
                        <h2>Administration du site projet 2021</h2>
                    </i></center>
                <center><i>
                        <h2>Titre développeuse web et web mobile</h2>
                    </i></center>
                <center><i>
                        <h2>Patricia Layerle</h2>
                    </i></center>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <div>
            <img class="logo"
                src={{ asset('/images/consolaAdmin/VictoireTitre.jpg') }} alt="Titre validé !!!" class="img-fluid mx-2"
                width="auto" height="auto">
        </div>
    </div>

@endsection

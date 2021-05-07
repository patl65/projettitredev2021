@extends('layout.layout')
@section('content')

    <h1>Latu entreprise</h1>

    <div class="d-flex justify-content-start">
        <div><img class="rounded-circle me-2" src="{{ asset('/images/latuEntreprise/EmileLatu.jpg') }}"
            alt="Emile Latu Latu Entreprise"  width="auto" height="250"></div>
        <div class="modal-dialog-centered modal-dialog-scrollable p-3 mt-5 d-flex bg-light text-dark content-box" align="justify">
            Créer en 1928 par Mr Emile Latu qui, a 21 ans après avoir
            fait ses classes et son apprentissage, a sur les conseils appuyés de son père à créé l’entreprise Latu.
            Il fut rejoint par son fils Jean et quelques années après par le cadet Daniel.
            Ce dernier a suivi des cours dans la célèbre école Yves Derval.
            Quelques années plus tard Emile prend sa retraite, l’ainé arrête et Daniel se retrouve seul à la tête de
            l’entreprise en 2003 qui compte 25 salariés.
        </div>
    </div>

    <div>  
    </div>

    <div class="modal-dialog-centered modal-dialog-scrollable p-3 mt-5 d-flex bg-light text-dark content-box" align="justify">
        A ce jour l'entreprise Latu est gérée par Monsieur Jean-Philippe Ader et Monsieur Yannick Martin.
    </div>


@endsection

@extends('layout.layout')
@section('content')
@include('inc.flash')


    <h1>Contact</h1>
    <center>
        <h3 mb-2>Un renseignement ? - Une demande de devis ?</h3>
    </center>


    <div class="d-flex row justify-content-around">

        <div class="p-3 mb-2 bg-light text-dark" style="width: 40rem;">
            <center>
                <p><b> Vos donneés personnelles ne seront pas enregistrées</b></p>
            </center>

            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="form-group">
                    <label for="contactNotification">Nom - Prénom</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Renseignez votre nom  et prénom">
                </div>
                <div class="form-group">
                    <label for="contactNotification">Code postal et ville</label>
                    <input type="text" class="form-control" id="adress" name="adress"
                        placeholder="Renseignez votre code postal et votre ville">
                </div>
                <div class="form-group">
                    <label for="contactNotification">Téléphone</label>
                    <input type="text" class="form-control" id="phoneContact" name="phone"
                        placeholder="Renseignez votre numéro de téléphone">
                </div>
                <div class="form-group">
                    <label for="contactNotification">Email</label>
                    <input type="email" class="form-control" id="inputPassword" name="email"
                        placeholder="Renseignez votre email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Votre message</label>
                    <textarea type="text" class="form-control" id="message" name="message" rows="3"
                        placeholder="Saisissez votre message"></textarea>
                </div>
                <center class="mt-3">
                    <button type="submit" class="btn btn-outline-secondary">Envoyer message</button>
                    @include('inc.flash')
                </center>
            </form>
        </div>

        <div class="p-3 mb-2 bg-light text-dark" style="width: 40rem;"">
                                                            <p><b>Latu entreprise</b></p>
                                                            <p>05-62-967-067</p>
                                                            <p>Rue des Gargousses, 65000 Tarbes</p>
                                                            <center> <iframe src="
            https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5812.81836732359!2d0.0780065663225181!3d43.242845421334046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x33dfaebc10265261!2slatu%20entreprise!5e0!3m2!1sfr!2sfr!4v1617196387098!5m2!1sfr!2sfr"
            width="500" height="375" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </center>
        </div>


    </div>


@endsection

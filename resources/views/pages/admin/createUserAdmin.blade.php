{{-- @extends('layout.layoutAdmin') --}}
@extends('layout.layoutAdmin')
@section('content')

<h3>Créer un utilisateur par Administrateur :</h3>

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf
        <div>
            <label for="lastName" class="col-sm-3 col-form-label">Nom</label>
            <input type="text" id="lastName" name="lastName" placeholder="Nom" value="{{ old('lastName') }}" class="col-sm-3">
            @error('lastName')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="firstName" class="col-sm-3 col-form-label">Prénom</label>
            <input type="text" id="firstName" name="firstName" placeholder="Prénom" value="{{ old('firstName') }}" class="col-sm-3">
            @error('firstName')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="userName" class="col-sm-3 col-form-label">Nom d'utilisateur</label>
            <input type="text" id="userName" name="userName" placeholder="Nom d'utilisateur" value="{{ old('userName') }}" class="col-sm-3">
            @error('userName')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" class="col-sm-3">
            @error('email')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="password" class="col-sm-3 col-form-label">Mot de passe</label>
            <input type="text" id="password" name="password" placeholder="Mot de passe" class="col-sm-3">
            @error('password')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="confirm_password" class="col-sm-3 col-form-label">Confirmation du mot de passe</label>
            <input type="text" id="confirm_password" name="confirm_password" placeholder="Confirmation du ot de passe"
                class="col-sm-3">
            @error('confirm_password')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="phoneNumber" class="col-sm-3 col-form-label">Téléphone</label>
            <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Téléphone" value="{{ old('phoneNumber') }}" class="col-sm-3">
            @error('phoneNumber')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="streetAddress" class="col-sm-3 col-form-label">Adresse</label>
            <input type="text" id="streetAddress" name="streetAddress" placeholder="Adresse" value="{{ old('streetAddress') }}" class="col-sm-3">
            @error('streetAddress')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="postcode" class="col-sm-3 col-form-label">Code postal</label>
            <input type="text" id="postcode" name="postcode" placeholder="Code postal" value="{{ old('postcode') }}" class="col-sm-3">
            @error('postcode')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="city" class="col-sm-3 col-form-label">Ville</label>
            <input type="text" id="city" name="city" placeholder="Ville" value="{{ old('city') }}" class="col-sm-3">
            @error('city')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="country" class="col-sm-3 col-form-label">Pays</label>
            <input type="text" id="country" name="country" placeholder="Pays" value="{{ old('country') }}" class="col-sm-3">
            @error('country')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="scales" class="col-sm-3 col-form-label">Administrateur</label>
            <input type="checkbox" name="administrator" value="true" {{ old('administrator') ? 'checked' : '' }}>
            @error('administrator')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div>
            <label for="scales" class="col-sm-3 col-form-label">Conditions Générales d'Utilisation : acceptées</label>
            <input type="checkbox" name="gtc" value="true" {{ old('gtc') ? 'checked' : '' }}>
            @error('administrator')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>

        <div class="mx-auto col-sm-3 col-form-label" style="width: 600px;">
            <button type="submit" class="col-form-label">Ajouter</button>
        </div>
    </form>


    @endsection

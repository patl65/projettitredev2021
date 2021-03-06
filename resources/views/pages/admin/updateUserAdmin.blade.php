@extends('layout.layoutAdmin')
{{-- @extends('layout.layoutAdminCoreui') --}}
@section('content')

    @include('inc.flash')


    <div class="d-flex">
        <h3>Modifier utilisateur dans Administrateur :</h3>
        <div class="mx-auto col-form-label" style="width: 600px;">
            <a href="{{ route('admin.user') }}"><button class="col-form-label">Annuler / Quitter</button></a>
        </div>
    </div>

    <div>
        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
            @csrf
            <div>
                <label for="lastName" class="col-sm-3 col-form-label">Nom</label>
                <input type="text" id="lastName" name="lastName" value="{{ $user->lastName }}" class="col-sm-3">
                @error('lastName')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="firstName" class="col-sm-3 col-form-label">Prénom</label>
                <input type="text" id="firstName" name="firstName" placeholder="Prénom" value="{{ $user->firstName }}"
                    class="col-sm-3">
                @error('firstName')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="phoneNumber" class="col-sm-3 col-form-label">Téléphone</label>
                <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Téléphone"
                    value="{{ $user->phoneNumber }}" class="col-sm-3">
                @error('phoneNumber')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="streetAddress" class="col-sm-3 col-form-label">Adresse</label>
                <input type="text" id="streetAddress" name="streetAddress" placeholder="Adressse"
                    value="{{ $user->streetAddress }}" class="col-sm-3">
                @error('streetAddress')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="postcode" class="col-sm-3 col-form-label">Code postal</label>
                <input type="text" id="postcode" name="postcode" placeholder="Code postal" value="{{ $user->postcode }}"
                    class="col-sm-3">
                @error('postcode')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="city" class="col-sm-3 col-form-label">Ville</label>
                <input type="text" id="city" name="city" placeholder="Ville" value="{{ $user->city }}" class="col-sm-3">
                @error('city')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="country" class="col-sm-3 col-form-label">Pays</label>
                <input type="text" id="country" name="country" placeholder="Pays" value="{{ $user->country }}"
                    class="col-sm-3">
                @error('country')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="administrator" class="col-sm-3 col-form-label">Administrateur</label>
                <input type="checkbox" name="administrator" value="true"
                    {{ $user->administrator === 1 ? 'checked' : '' }}>
                @error('administrator')
                    <span style="color:red">{{ $message }}</span>;
                @enderror
            </div>
            <div>
                <label for="gtc" class="col-sm-3 col-form-label">CGU acceptées</label>
                <input type="checkbox" name="gtc" value="true" {{ $user->gtc === 1 ? 'checked' : '' }}>
                @error('gtc')
                    <span style="color:red">{{ $message }}</span>;
                @enderror
            </div>
            <div class="mx-auto col-sm-6 col-form-label" style="width: 600px;">
                <button type="submit" class="col-form-label">Mettre à jour</button>
            </div>
        </form>
    </div>


    <div class='mt-5'>
        <h3>Modification du nom d'utilisateur :</h3>
        <form action="{{ route('admin.user.update.userName', $user->id) }}" method="POST">
            @csrf
            <div>
                <label for="userName" class="col-sm-3 col-form-label">Nom d'utilisateur</label>
                <input type="text" id="userName" name="userName" placeholder="Nom d'utilisateur"
                    value="{{ $user->userName }}" class="col-sm-3">
                @error('userName')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mx-auto col-sm-6 col-form-label" style="width: 600px;">
                <button type="submit" class="col-form-label">Mettre à jour</button>
            </div>
        </form>
    </div>


    <div class='mt-5'>
        <h3>Modification de l'email :</h3>
        <form action="{{ route('admin.user.update.email', $user->id) }}" method="POST">
            @csrf
            <div>
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" value="{{ $user->email }}"
                    class="col-sm-3">
                @error('email')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mx-auto col-sm-6 col-form-label" style="width: 600px;">
                <button type="submit" class="col-form-label">Mettre à jour</button>
            </div>
        </form>
    </div>


    <div class='mt-5'>
        <h3>Modification du mot de passe :</h3>
        <form action="{{ route('admin.user.update.password', $user->id) }}" method="POST">
            @csrf
            <div>
                <label for="password" class="col-sm-3 col-form-label">Nouveau mot de passe</label>
                <input type="password" id="password" name="password" placeholder="password" class="col-sm-3">
                @error('password')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="confirm_password" class="col-sm-3 col-form-label">Confirmation nouveau mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="password"
                    class="col-sm-3">
                @error('confirm_password')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mx-auto col-sm-6 col-form-label" style="width: 600px;">
                <button type="submit" class="col-form-label">Mettre à jour</button>
            </div>
        </form>
    </div>

@endsection

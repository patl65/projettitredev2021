@extends('layout.layoutAdmin')
{{-- @extends('layout.layoutAdminCoreui') --}}
@section('content')

@include('inc.flash')


    <div class="d-flex">
        <h3>Modifier utilisateur dans Administrateurs :</h3>
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
                <label for="scales" class="col-sm-3 col-form-label">Administrateur</label>
                <input type="checkbox" name="administrator" value="true"
                    {{ $user->administrator === 1 ? 'checked' : '' }}>
                @error('administrator')
                    <span style="color:red">{{ $message }}</span>;
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
                <label for="firstName" class="col-sm-3 col-form-label">Email</label>
                <input type="text" id="email" name="email" placeholder="Email" value="{{ $user->email }}"
                    class="col-sm-3">
                @error('firstName')
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
                <label for="password" class="col-sm-3 col-form-label">Nouveau Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="password" class="col-sm-3">
                @error('password')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="confirm_password" class="col-sm-3 col-form-label">Confirmation nouveau Mot de passe</label>
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

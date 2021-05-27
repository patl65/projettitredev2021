@extends('layout.layout')
@section('content')


<div class="d-flex justify-content-center mt-5 bg-light text-dark">
@include('inc.flash')
</div>






    <div class="d-flex justify-content-center mt-5">
        <div class="mt-5">
            <div class="bg-light text-dark p-3" style="width: 300px">
                <form action="{{ route('auth.login') }}" method='POST'>
                    @csrf
                    <div>
                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                        <input type="email" name="email" placeholder="Email"
                            value="{{ old('email') ? old('email') : App\Models\User::first()->email }}">
                        {{-- old : se rappelle du derner email saisi --}}
                        @error('email') <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                        <input type="password" name="password" placeholder="password">
                        @error('password')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="col-sm-3 col-form-label"></label>
                        <button type="submit">Se connecter</button>
                        @include('inc.flash')
                    </div>
                </form>
                <div class="mt-3">
                    <i> Mot de passe oublié ?</i>
                    <button type="submit">Réinitialiser son mot de passe</button>
                </div>
            </div>
            <div class="mt-2 bg-light text-dark p-2" style="width: 300px">
                Si vous n'avez pas de compte :
                <label for="" class="col-sm-3 col-form-label"></label>
                <a href="{{ route('user.create') }}"><button class="">Créer un compte</button></a>
            </div>
        </div>
    </div>


@endsection

@extends('layout.layoutAdmin')
@section('content')

    @include('inc.flash')

    <form action="{{ route('auth.login') }}" method='POST'>
        @csrf
        <div>
            <label for="inputPassword" class="col-sm-1 col-form-label">Email</label>
            <input type="email" name="email" placeholder="Email"
            {{-- value="{{ old('email') ? old('email') : App\Models\User::first()->email }}"> --}}
            {{-- old : se rappelle du derner email saisi --}}
            @error('email')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="inputPassword" class="col-sm-1 col-form-label">Password</label>
            <input type="password" name="password" placeholder="password">
            @error('password')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="" class="col-sm-1 col-form-label"></label>
            <button type="submit">Se connecter</button>
        </div>
    </form>


@endsection

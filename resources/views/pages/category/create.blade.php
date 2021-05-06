@extends('layout.layoutAdmin')
@section('content')

<div class="d-flex">
    <h3>Créer une catégorie :</h3>

<a href="{{ route('category.index') }}"><button class="ms-2">Annuler</button></a>
</div>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div>
            <label for="name" class="col-sm-2 col-form-label">Nouvelle catégorie</label>
            <input type="text" id="name" name="name" placeholder="Nom catégorie" value="{{ old('name') }}" class="col-sm-3">
            @error('name')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <button type="submit" class="ms-2">Ajouter</button>
        </div>

    </form>


    @endsection

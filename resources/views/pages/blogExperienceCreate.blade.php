@extends('layout.layout')
@section('content')
@include('inc.flash')

    <div class="d-flex mt-2">
        <h3>Mon expérience avec Latu entreprise !</h3>
        <a href="{{ route('blog.index') }}"><button class="ms-2">Annuler</button></a>
    </div>

    <form action="{{ route('blog.experience.store') }}" method="POST" enctype="multipart/form-data">
        {{-- enctype pour les fichiers photos --}}
        @csrf
        <div class="form-group  mt-2">
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                placeholder="Votre titre">
            @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <p class="">
                <textarea type="textbox" name="content" id="content" rows="5" class="form-control textarea-control"
                    placeholder="Votre texte"></textarea>
            </p>
            @error('content')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group  mt-2">
            <label for="image">Vos photos</label>
            <input type="file" multiple name="images[]" class="form-control" id="image">
            @error('images')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="ms-2 mt-3">Enregistrer</button>
        </div>

    </form>



@endsection

@extends('layout.layoutAdmin')
@section('content')

    <div class="d-flex">
        <h3>Mon expérience avec Latu entreprise !</h3>
        <a href="{{ route('blog.index') }}"><button class="ms-2">Annuler</button></a>
    </div>

    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        {{-- enctype pour les fichiers photos --}}
        @csrf
        <div>
            <label for="category" class="col-form-label">Catégorie</label>
            <select name="category" id="Sélectionner une catégorie">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group  mt-2">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="content">Texte</label>
            <p class="">
                <textarea type="textbox" name="content" id="editor" rows="10" class="form-control textarea-control"
                    > {{ old('content') }}</textarea>
            </p>
            @error('content')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group  mt-2">
            <label for="video">Vidéos Youtube : lien,lien,lien (mettre une "," entre 2 liens)</label>
            <input type="text" class="form-control" id="video" name="video" value="{{ old('video') }}">
            @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group  mt-2">
            <label for="image">Photos</label>
            <input type="file" multiple name="images[]" class="form-control" id="image">
            @error('images')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-check form-switch mt-2">
            <input type="checkbox" class="form-check-input" name="published" value="true"
                {{ old('published') ? 'checked' : '' }}>
                <label class="form-check-label col-sm-2" for="flexSwitchCheckDefault">Publier article</label>
                @error('published')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="ms-2 mt-3">Enregistrer</button>
        </div>

    </form>



@endsection

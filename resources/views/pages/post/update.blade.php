@extends('layout.layoutAdmin')
@section('content')

    @include('inc.flash')

    <div class="d-flex">
        <h3>Modifier article :</h3>
        <a href="{{ route('post.index') }}"><button class="ms-2">Retour à l'index Articles</button></a>
        <a href="{{ route('category.show', $post->category->slug) }}"><button class="ms-2">Retour à la
                Catégorie</button></a>
    </div>

    <form action="{{ route('post.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
        {{-- enctype pour les fichiers photos --}}

        @csrf
        <div>
            <label for="category" class="col-form-label">Catégorie</label>
            <select name="category" id="Sélectionner une catégorie">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($post->category->name === $category->name) selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group  mt-2">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="content">Texte</label>
            <p class="">
                <textarea type="textbox" name="content" id="editor" rows="10"
                    class="form-control textarea-control"> {!! $post->content !!}</textarea>
            </p>
            @error('content')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        {{ session('errors') }}
        {{-- mis pour videoYoutube, pb pour la mise à jour et pour check les pb --}}
        <div class="mt-2">
            @foreach ($post->videos as $video)
                <iframe width="300" height="150" src="https://www.youtube.com/embed/{{ $video->link }}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <a style="color: red" href="{{ route('post.video.delete', [$post->slug, $video->id]) }}">Supprimer</a>
            @endforeach
        </div>
        <div class="form-group mt-2">
            <label for="video">Vidéos Youtube : lien,lien,lien (mettre une "," entre 2 liens)</label>
            {{-- <input type="text" class="form-control" id="video" name="video" value="@foreach ($post->videos as $video) https://youtube.com/watch?v={{ $video->link }}, @endforeach"> --}}
            <input type="text" class="form-control" id="video" name="video" value="{{ old('video') }}">
            @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-2">
            @foreach ($post->images as $image)
                <img src="{{ asset('storage/posts/' . $image->name) }}" alt="" width="200" wheight="auto">
                <a style="color: red" href="{{ route('post.image.delete', [$post->slug, $image->id]) }}">Supprimer</a>
            @endforeach
        </div>
        <div class="form-group mt-2">
            <label for="image">Photos</label>
            <input type="file" multiple name="images[]" class="form-control" id="image">
            @error('images')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-check form-switch mt-2">
            <input type="checkbox" class="form-check-input" name="visible" value="true"
                {{ $post->visible == true ? 'checked' : '' }}>
            <label class="form-check-label col-sm-2 ms-0" for="flexSwitchCheckDefault">Publier article</label>
            @error('visible')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="ms-2 mt-3">Enregistrer</button>
        </div>
    </form>

@endsection

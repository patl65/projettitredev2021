@extends('layout.layoutAdmin')
@section('content')

    @include('inc.flash')

    <div class="container">
        <div class="mb-3">
            <a href="{{ route('category.show', $post->category->slug) }}"><button>Retour à la
                    Catégorie</button></a>
            <a href="{{ route('post.index') }}"><button>Retour à l'index Articles</button></a>
            - Article :
            <a style="color: red" href="{{ route('post.delete', $post->slug) }}">Supprimer</a>
            <a style="color: green" href="{{ route('post.edit', $post->slug) }}">Modifier</a>
        </div>

        <h3>{{ $post->title }}</h3>
        <p>Catégorie : {{ $post->category->name }} - Date création : {{ $post->created_at->isoFormat('LL') }} - Date
            dernière mise à jour : {{ $post->updated_at->isoFormat('LL') }} - Par : {{ $post->user->lastName }}
            {{ $post->user->firstName }} </p>

        <p> {!! nl2br(htmlspecialchars($post->content)) !!}</p>

        {{ session('errors') }}
        {{-- mis pour videoYoutube --}}
        <div class="mt-2">
            @foreach ($post->videos as $video)
                <iframe width="300" height="150" src="https://www.youtube.com/embed/{{ $video->link }}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            @endforeach
        </div>
        <div class="mt-2">
            @foreach ($post->images as $image)
                <img src="{{ asset('storage/posts/' . $image->name) }}" alt="" width="200" wheight="auto">
            @endforeach
        </div>
        <div class="form-check form-switch mt-2">
            <label class="form-check-label col-sm-2" for="flexSwitchCheckDefault">Article publié</label>
            <input type="checkbox" class="form-check-input" name="visible" value="true"
                {{ $post->visible === 1 ? 'checked' : '' }}>
        </div>


    @endsection

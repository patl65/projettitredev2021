@extends('layout.layout')
@section('content')

    <h1>Conseils de Pro & Actualités</h1>

    @include('inc.buttons')

    <div class="container bg-light mt-5 mb-5">

        <h3>{{ $post->title }}</h3>
        <p>Catégorie : {{ $post->category->name }} -Dernière mise à jour : {{ $post->updated_at->isoFormat('LL') }}</p>
        <p> {!! nl2br(htmlspecialchars($post->content)) !!}</p>

        {{ session('errors') }}
        <div class="parent-container card-blog-body mt-2>
            @foreach ($post->images as $image)
                <a href="{{ asset('storage/posts/' . $image->name) }}">
                    <img class="img-fluid card-blog-img" src="{{ asset('storage/posts/' . $image->name) }}"
                        alt="{{ $image->name }}">
                </a>
            @endforeach
        </div>
        <div class="embed-responsive embed-responsive-16by9 card-blog-body mt-2">
            @foreach ($post->videos as $video)
                <iframe class="embed-responsive-item card-blog-video"
                    src="https://www.youtube.com/embed/{{ $video->link }}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            @endforeach
        </div>

    @endsection

@extends('layout.layoutAdmin')
@section('content')

    <a href="{{ route('category.index') }}"><button class="mb-2">Retour Index Catégories</button></a>
    <h3>{{ $category->name }} - Les articles :</h3>


    <ul>
        @foreach ($category->posts as $post)
            <li><b>{{ $post->title }}</b> - <span style="color: blue">Article : {{ $post->visible ? 'Publié' : 'Non publié' }}</span>
                 - <a style="color: green" href="{{ route('post.show', $post->slug) }}">Afficher article</a>
            </li>
        @endforeach
    </ul>

@endsection

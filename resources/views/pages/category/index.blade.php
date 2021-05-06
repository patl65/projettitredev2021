@extends('layout.layoutAdmin')
@section('content')

    @include('inc.flash')

    <a href="{{ route('post.index') }}"><button class="mb-2">Retour à Articles</button></a>
    <a href="{{ route('category.create') }}"><button class="mb-2">Créer une catégorie</button></a>

    <h3 class="mt-3">Liste des catégories :</h3>
    <ul class="mt-4">
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                <a style="color: red" href="{{ route('category.delete', $category->slug) }}">Supprimer</a>
                <a style="color: green" href="{{ route('category.edit', $category->slug) }}">Modifier</a>
            </li>
        @endforeach

    </ul>


@endsection

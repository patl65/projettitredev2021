@extends('layout.layoutAdmin')
@section('content')

    @include('inc.flash')

    <div>
        <a href="{{ route('post.create') }}"><button class="me-2">Créer un article</button></a>
        <a href="{{ route('category.index') }}"><button>Les catégories</button></a>
    </div>
    <div class="d-flex">
        @include('inc.buttonsPostAdmin')
        @include('inc.searchPostAdmin')
    </div>


    <div>
        <table class="table mt-3" data-tooggle="table">
            <thead>
                <tr>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Date</th>
                    <th scope="col">Créateur</th>
                    <th scope="col">Publié</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->updated_at->isoFormat('LL') }}</td>
                        <td>{{ $post->user->lastName }} {{ $post->user->firstName }}</td>
                        <td>{{ $post->visible ? 'Oui' : '' }}</td>
                        <td>
                            <a style="color: red" href="{{ route('post.delete', $post->slug) }}">Supprimer</a>
                            <a style="color: green" href="{{ route('post.edit', $post->slug) }}">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div mt-2>
        {{ $posts->links() }}
        {{-- pour la pagination --}}
    </div>


@endsection

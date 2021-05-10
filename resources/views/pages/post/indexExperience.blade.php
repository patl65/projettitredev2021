@extends('layout.layoutAdmin')
@section('content')

    @include('inc.flash')

    <div>
        <a href="{{ route('category.index') }}"><button>Les catégories</button></a>
    </div>

    <h4 class='mt-2'>Articles en attente de validation :</h4>
    <div>
        <table class="table mt-3" data-tooggle="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Créateur</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Texte</th>
                    <th scope="col">Refusé</th>
                    <th scope="col">Publié</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($toCheck as $post)
                    <tr>
                        <td>{{ $post->updated_at->isoFormat('LL') }}</td>
                        <td>{{ $post->user->lastName }} {{ $post->user->firstName }}</td>
                        <td><a href="{{ route('post.show', $post->title) }}">{{ $post->title }}</a></td>
                        <td> {!! nl2br(Str::limit($post->content, 500, '...')) !!} </td>
                        <td>{{ $post->refused ? 'Oui' : '' }}</td>
                        <td>{{ $post->published ? 'Oui' : '' }}</td>
                        <td>
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


    <h4 class='mt-5'>Articles de la catégorie Expérience :</h4>
    <div>
        <table class="table mt-3" data-tooggle="table">
            <thead>
                <tr>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Date</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Créateur</th>
                    <th scope="col">Refusé</th>
                    <th scope="col">Publié</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->updated_at->isoFormat('LL') }}</td>
                        <td><a href="{{ route('post.show', $post->title) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->user->lastName }} {{ $post->user->firstName }}</td>
                        <td>{{ $post->refused ? 'Oui' : '' }}</td>
                        <td>{{ $post->published ? 'Oui' : '' }}</td>
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

@extends('layout.layoutAdmin')
@section('content')

    @include('inc.flash')


    <a href="{{ route('admin.user.create') }}"><button class="mb-2">Créer un utilisateur</button></a>

    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Administrateur</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->lastName }}</td>
                    <td>{{ $user->firstName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->administrator ? '@mdo' : '' }}</td>
                    <td>
                        <a style="color: red" href="{{ route('admin.user.delete', $user->id) }}">Supprimer</a>
                        <a style="color: green" href="{{ route('admin.user.edit', $user->id) }}">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection

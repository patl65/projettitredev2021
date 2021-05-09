@extends('layout.layoutAdmin')
@section('content')

    @include('inc.flash')

    <div>
        <a href="{{ route('job.create') }}"><button class="me-2">Créer une offre d'emploi</button></a>

    </div>
    <div>
        <table class="table mt-3" data-tooggle="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Créateur</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Contrat</th>
                    <th scope="col">Détail</th>
                    <th scope="col">Publiée</th>
                    <th scope="col">Fermée</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->updated_at->isoFormat('LL') }}</td>
                        <td>{{ $job->user->lastName }} {{ $job->user->firstName }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->contract }}</td>
                        <td>
                            {{-- {{ $job->job }} --}}
                            {{-- {!! nl2br(htmlspecialchars($job->job)) !!} --}}
                            {!! nl2br(Str::limit($job->job, 500, '...')) !!}

                        </td>

                        <td>{{ $job->published ? 'Oui' : '' }}</td>
                        <td>{{ $job->closed ? 'Oui' : '' }}</td>
                        <td>
                            <a style="color: red" href="{{ route('job.delete', $job->slug) }}">Supprimer</a>
                            <a style="color: green" href="{{ route('job.edit', $job->slug) }}">Modifier</a>
                            <a style="color: blue" href="{{ route('job.show', $job->slug) }}">Afficher</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div mt-2>
        {{ $jobs->links() }}
        {{-- pour la pagination --}}
    </div>


@endsection

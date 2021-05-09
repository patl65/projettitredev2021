@extends('layout.layoutAdmin')
@section('content')

@include('inc.flash')

    <div class="container">
        <div class="mb-3">
            <a href="{{ route('job.index') }}"><button>Index offres d'emploi</button></a>
            <a href="{{ route('job.edit', $job->slug) }}"><button>Modifier offre</button></a>
        </div>

        <p>Date création : {{ $job->created_at->isoFormat('LL') }} - Date dernière mise à jour : {{ $job->updated_at->isoFormat('LL') }} - Par : {{ $job->user->lastName }} {{ $job->user->firstName }} </p>
        <h3>{{ $job->title }}</h3>
        <h5>{{ $job->contract }}</h5>
        <p> {!! nl2br(htmlspecialchars($job->job)) !!}</p>

        <div class="form-check form-switch mt-2">
            <label class="form-check-label col-sm-2" for="flexSwitchCheckDefault">Offre publiée</label>
            <input type="checkbox" class="form-check-input" name="published" value="true"
                {{ $job->published === 1 ? 'checked' : '' }}>
        </div>

        <div class="form-check form-switch mt-2">
            <label class="form-check-label col-sm-2" for="flexSwitchCheckDefault">Offre fermée</label>
            <input type="checkbox" class="form-check-input" name="published" value="true"
                {{ $job->closed === 1 ? 'checked' : '' }}>
        </div>



    @endsection

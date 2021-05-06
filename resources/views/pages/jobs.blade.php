@extends('layout.layout')
@section('content')

    <h1>Offres d'emploi</h1>
    <div class="container bg-light text-dark mb-3" align="center" style="width: 50rem;">

    </div>
    @include('inc.flash')


    <div class="d-flex row justify-content-sm-around">
        @foreach ($jobs as $job)
            <div class="card-blog card bg-light mb-3 container-md" style="width: 50rem;">

                {{-- TODO: pour vérif, à supp quand tout ok --}}
                {{-- <div class="card-header">
                    {{ $job->visible ? 'Oui' : 'Non' }}
                </div> --}}
                {{-- TODO: pour vérif, à supp quand tout ok --}}
                {{-- <div class="card-header">
                        {{ $job->closed ? 'Oui' : 'Non' }}
                    </div> --}}

                <div class="card-header">
                    <h5 style="color: rgb(218, 15, 49)">{{ $job->title }}</h5>
                    <h6>{{ $job->contract }}</h6>
                </div>
                <div class="card-body">
                    <p class="card-textclass card-blog-body">
                        {!! nl2br(htmlspecialchars($job->job)) !!} 
                    </p>
                    <p class="card-textclass card-blog-body">
                        <b>Pour postuler : </b>par mail sur la page <a class="" href="{{ route('contact') }}">Contact</a>
                        ou par téléphone : Yannick Martin 06-79-76-54-19 ou Jean-Philippe Ader 06-16-10-15-73
                    </p>
                </div>

                <div class="card-footer">
                    Offre du {{ $job->updated_at->isoFormat('LL') }}
                </div>
            </div>
        @endforeach
    </div>

@endsection

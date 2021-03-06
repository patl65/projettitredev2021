@extends('layout.layout')
@section('content')
@include('inc.flash')

    <h1>Conseils de Pro & Actualités : {{ $category->name }}</h1>

    <a href="{{ route('blog.experience.create') }}"><button type=" button"
        class="btn btn-success text-info btn-experience me-2 mb-2"><img src={{ asset('/images/layout/parler.png') }}
            alt="" width="10%" height="auto"><b> Partagez ici votre
            expérience Latu</b></button></a>

    @include('inc.buttonsPost')
@include('inc.search')

    <div class="d-flex row justify-content-sm-around">

        @foreach($category->posts as $post)
        <div class="card-blog card bg-light mb-3  container-md" style="width: 50rem;">

                {{-- TODO: pour vérif, à supp quand tout ok --}}
                {{-- <div class="card-header">
                    {{ $post->published ? 'Oui' : 'Non' }}
                </div> --}}

                <h5 class="card-header">{{ $post->title }}</h5>
                <div class="card-body">
                    <p class="card-textclass card-blog-body">
                        {!! nl2br(htmlspecialchars($post->content)) !!}
                    </p>
                </div>

                {{-- <div class="d-flex justify-content-around blog-card-photo-vid"> --}}
                    <div class="parent-container card-blog-body mt-2">
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
                {{-- </div> --}}
                <div class="card-footer">
                    {{ $post->updated_at->isoFormat('LL') }} -
                    <a href="{{ route('blog.post.show', $post->slug) }}"><button type="button" class="btn btn-outline-dark">Article complet</button></a>
                </div>
            </div>
        @endforeach
    </div>


@endsection

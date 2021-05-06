@extends('layout.layout')
@section('content')

    <h1>Conseils de Pro & Actualités</h1>

    @include('inc.buttons')
    @include('inc.search')
    @include('inc.flash')


    <div class="d-flex row justify-content-sm-around">
        @foreach ($posts as $post)
            <div class="card-blog card bg-light mb-3  container-md" style="width: 50rem;">

                {{-- TODO: pour vérif, à supp quand tout ok --}}
                {{-- <div class="card-header">
                    {{ $post->visible ? 'Oui' : 'Non' }}
                </div> --}}

                <h5 class="card-header">{{ $post->title }}</h5>
                <div class="card-body">
                    <p class="card-textclass card-blog-body">
                        {!! nl2br(htmlspecialchars($post->content)) !!}
                    </p>
                </div>

                <div class="d-flex justify-content-around">
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
                </div>
                <div class="card-footer">
                    {{ $post->updated_at->isoFormat('LL') }} -
                    <a href="{{ route('blog.post.show', $post->slug) }}"><button type="button" class="btn btn-outline-dark">Article complet</button></a>
                </div>
            </div>
        @endforeach
    </div>
   



@endsection

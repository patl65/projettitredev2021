<div class="">
    <a href="{{ route('blog.index') }}">
        <button type=" button" class="btn btn-secondary me-2 mb-2">
            Conseils de Pro & Actualités</button> </a>
    @foreach ($categories as $category)
        <a class="btn btn-secondary me-2 mb-2"
            href="{{ route('blog.category.show', $category->slug) }}">{{ $category->name }}</a>
    @endforeach
    
</div>

<form class="d-flex form-group mb-4 blog-search" action="{{ route('blog.index.search') }}" method="GET">
    @csrf
    <input class="form-control me-2 blog-search" type="search" name="q" placeholder="Rechercher... (saisir 3 caractères minimum)"  value="{{ request()->q ?? '' }}" aria-label="Search">
    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search "></i></button>
</form>


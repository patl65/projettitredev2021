<div class="my-2 col-sm-6">
    <form class="container d-flex form-group ms-2" action="{{ route('post.index.search') }}" method="GET">
            @csrf
            <input class="form-control me-2" type="search" name="q" placeholder="Rechercher..."  value="{{ request()->q ?? '' }}" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa fa-search "></i></button>
        </form>
       </div>

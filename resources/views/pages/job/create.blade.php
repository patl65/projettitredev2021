@extends('layout.layoutAdmin')
@section('content')

@include('inc.flash')

    <div class="d-flex">
        <h3>Créer une offre d'emploi :</h3>
        <a href="{{ route('job.index') }}"><button class="ms-2">Annuler</button></a>
    </div>

    <form action="{{ route('job.store') }}" method="POST">
        @csrf
        <div class="form-group  mt-2">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="contract">Contrat</label>
            <input type="text" class="form-control" id="contract" name="contract" value="{{ old('contract') }}">
            @error('contract')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group mt-2">
            <label for="job">Emploi</label>
            <p class="">
                <textarea type="textbox" name="job" id="editor" rows="10" class="form-control textarea-control"
                    > {{ old('job') }}</textarea>
            </p>
            @error('job')
            <span style="color:red">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-check form-switch mt-2">
            <input type="checkbox" class="form-check-input" name="visible" value="true"
                {{ old('visible') ? 'checked' : '' }}>
                <label class="form-check-label col-sm-2" for="flexSwitchCheckDefault">Publier offre</label>
                @error('visible')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-check form-switch mt-2">
            <input type="checkbox" class="form-check-input" name="closed" value="true"
                {{ old('visible') ? 'checked' : '' }}>
                <label class="form-check-label col-sm-2" for="flexSwitchCheckDefault">Offre fermée</label>
                @error('visible')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="ms-2 mt-3">Enregistrer</button>
        </div>

    </form>



@endsection

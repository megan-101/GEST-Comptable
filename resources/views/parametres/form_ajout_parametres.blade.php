@extends('app')

@section('content')

<h1 class="mt-4">Ajout d'un paramètre</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{route('parametre.All')}}">Retour</a>

<div class="card mt-2">
    <div class="card-body">
        <form method="POST" action="{{route('parametre.create')}}">
            @csrf
            
            <div class="mb-3">
                <label for="code" class="form-label font-weight-bold">Code</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" value="{{ old('code') }}" required>
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="libelle" class="form-label font-weight-bold">Libellé</label>
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" id="libelle" value="{{ old('libelle') }}" required>
                @error('libelle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>

@endsection

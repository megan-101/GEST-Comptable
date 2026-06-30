@extends('app')

@section('content')

<h1 class="mt-4">Modification du post comptable</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('postcomptable.All') }}">Retour</a>

<div class="card mt-2">
    <div class="card-body">
        <form method="POST" action="{{ route('postcomptable.update', $postComptable->id) }}">
            @csrf

            <div class="mb-3">
                <label for="capacite" class="form-label font-weight-bold">Capacité</label>
                <input type="number" step="any" class="form-control @error('capacite') is-invalid @enderror" name="capacite" id="capacite" value="{{ old('capacite', $postComptable->capacite) }}" required>
                @error('capacite')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="libelle" class="form-label font-weight-bold">Libellé</label>
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" id="libelle" value="{{ old('libelle', $postComptable->libelle) }}" required>
                @error('libelle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Mettre à jour</button>
        </form>
    </div>
</div>

@endsection

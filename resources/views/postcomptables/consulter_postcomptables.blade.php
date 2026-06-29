@extends('app')

@section('content')

<h1 class="mt-4">Détails du post comptable</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('postcomptable.All') }}">Retour</a>

<div class="card mt-2">
    <div class="card-header bg-primary text-white">
        <h5>Post comptable #{{ $postComptable->id }}</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <h6 class="text-muted">Capacité :</h6>
            <p class="lead font-weight-bold">{{ $postComptable->capacite }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Libellé :</h6>
            <p class="lead font-weight-bold">{{ $postComptable->libelle }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Créé le :</h6>
            <p>{{ $postComptable->created_at ? $postComptable->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Mis à jour le :</h6>
            <p>{{ $postComptable->updated_at ? $postComptable->updated_at->format('d/m/Y H:i') : 'N/A' }}</p>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('postcomptable.formModifier', $postComptable->id) }}" class="btn btn-warning">Modifier</a>
    </div>
</div>

@endsection

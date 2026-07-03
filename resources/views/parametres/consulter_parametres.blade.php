@extends('app')

@section('content')

<h1 class="mt-4">Détails du paramètre</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{route('parametre.All')}}">Retour</a>

<div class="card mt-2">
    <div class="card-header bg-primary text-white">
        <h5>Paramètre #{{ $parametre->id }}</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <h6 class="text-muted">Code :</h6>
            <p class="lead font-weight-bold">{{ $parametre->code }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Libellé :</h6>
            <p class="lead font-weight-bold">{{ $parametre->libelle }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Créé le :</h6>
            <p>{{ $parametre->created_at ? $parametre->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Mis à jour le :</h6>
            <p>{{ $parametre->updated_at ? $parametre->updated_at->format('d/m/Y H:i') : 'N/A' }}</p>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{route('parametre.formModifier', $parametre->id)}}" class="btn btn-warning">Modifier</a>
    </div>
</div>

@endsection

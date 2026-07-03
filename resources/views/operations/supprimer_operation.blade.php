@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1>Suppression de l'Opération Comptable</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('operation.All') }}">Annuler et retourner</a>

<div class="card border-danger" style="max-width: 600px;">
    <div class="card-header bg-danger text-white">
        <h5>Confirmer la suppression ?</h5>
    </div>
    <div class="card-body">
        <p>Êtes-vous sûr de vouloir supprimer définitivement l'opération comptable suivante ?</p>
        <ul>
            <li><strong>Référence :</strong> {{ $operation->reference }}</li>
            <li><strong>Libellé :</strong> {{ $operation->libelle }}</li>
            <li><strong>Montant Débit :</strong> {{ number_format($operation->montant_debit, 2, ',', ' ') }} F</li>
            <li><strong>Montant Crédit :</strong> {{ number_format($operation->montant_credit, 2, ',', ' ') }} F</li>
        </ul>

        <form method="POST" action="{{ route('operation.delete') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $operation->id }}">
            <button type="submit" class="btn btn-danger btn-block">Oui, supprimer définitivement</button>
        </form>
    </div>
</div>

@endsection

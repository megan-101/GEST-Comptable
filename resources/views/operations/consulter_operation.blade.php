@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1>Détail de l'Opération Comptable</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('operation.All') }}">Retour à la liste</a>
<a class="btn btn-warning mb-3" href="{{ route('operation.formUpdate', $operation->id) }}">Modifier</a>

<div class="card" style="max-width: 700px;">
    <div class="card-header bg-dark text-white">
        <h5>Référence : {{ $operation->reference }}</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 30%;">Libellé</th>
                <td>{{ $operation->libelle }}</td>
            </tr>
            <tr>
                <th>Date d'opération</th>
                <td>{{ \Carbon\Carbon::parse($operation->date_operation)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Montant Débit</th>
                <td class="text-danger"><strong>{{ number_format($operation->montant_debit, 2, ',', ' ') }} F</strong></td>
            </tr>
            <tr>
                <th>Montant Crédit</th>
                <td class="text-success"><strong>{{ number_format($operation->montant_credit, 2, ',', ' ') }} F</strong></td>
            </tr>
            <tr>
                <th>Poste Comptable</th>
                <td>{{ $operation->postComptable ? $operation->postComptable->libelle : 'Non assigné' }}</td>
            </tr>
            <tr>
                <th>Lieu</th>
                <td>{{ $operation->lieu ? $operation->lieu->libelle : 'Non spécifié' }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $operation->description ?? 'Aucune description' }}</td>
            </tr>
            <tr>
                <th>Créé le</th>
                <td>{{ $operation->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Dernière modification</th>
                <td>{{ $operation->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection

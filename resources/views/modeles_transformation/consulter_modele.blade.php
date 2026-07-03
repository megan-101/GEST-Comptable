@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1 class="mt-4">Détails du Modèle de Transformation</h1>
<hr />

<div class="mb-3">
    <a class="btn btn-secondary" href="{{ route('modele-transformation.All') }}">Retour à la liste</a>
    <a class="btn btn-warning" href="{{ route('modele-transformation.formModifier', $modele->id) }}">Modifier</a>
</div>

<div class="card" style="max-width: 600px;">
    <div class="card-header font-weight-bold">
        Modèle #{{ $modele->id }}
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 40%">Schéma</th>
                <td>{{ $modele->schema }}</td>
            </tr>
            <tr>
                <th>Valider Pièce</th>
                <td>
                    @if($modele->flag_piece)
                        <span class="badge badge-success">Oui</span>
                    @else
                        <span class="badge badge-secondary">Non</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Masque Pièce</th>
                <td>{{ $modele->mask_piece ?? 'Aucun masque défini' }}</td>
            </tr>
            <tr>
                <th>Valider Compte</th>
                <td>
                    @if($modele->flag_compte)
                        <span class="badge badge-success">Oui</span>
                    @else
                        <span class="badge badge-secondary">Non</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Masque Compte</th>
                <td>{{ $modele->mask_compte ?? 'Aucun masque défini' }}</td>
            </tr>
            <tr>
                <th>Date de création</th>
                <td>{{ $modele->created_at ? $modele->created_at->format('d/m/Y H:i') : '-' }}</td>
            </tr>
            <tr>
                <th>Dernière modification</th>
                <td>{{ $modele->updated_at ? $modele->updated_at->format('d/m/Y H:i') : '-' }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection

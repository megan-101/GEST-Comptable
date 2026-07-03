@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1 class="mt-4">Supprimer un Modèle de Transformation</h1>
<hr />

<div class="card border-danger" style="max-width: 600px;">
    <div class="card-header bg-danger text-white font-weight-bold">
        Confirmation de suppression
    </div>
    <div class="card-body">
        <p>Êtes-vous sûr de vouloir supprimer le modèle de transformation suivant ?</p>
        
        <table class="table table-bordered">
            <tr>
                <th style="width: 40%">Schéma</th>
                <td>{{ $modele->schema }}</td>
            </tr>
            <tr>
                <th>Valider Pièce</th>
                <td>{{ $modele->flag_piece ? 'Oui' : 'Non' }}</td>
            </tr>
            <tr>
                <th>Valider Compte</th>
                <td>{{ $modele->flag_compte ? 'Oui' : 'Non' }}</td>
            </tr>
        </table>

        <form method="POST" action="{{ route('modele-transformation.destroy', $modele->id) }}">
            @csrf
            
            <a class="btn btn-secondary" href="{{ route('modele-transformation.All') }}">Annuler</a>
            <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
        </form>
    </div>
</div>

@endsection

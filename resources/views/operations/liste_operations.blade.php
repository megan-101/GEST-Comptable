@extends('app')

@section('content')

<nav>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</nav>

<h1>Liste des Opérations Comptables</h1>
<hr />

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<a class="btn btn-primary mb-3" href="{{ route('operation.formAjout') }}">
    Ajouter une Opération
</a>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Réf</th>
            <th scope="col">Libellé</th>
            <th scope="col">Date</th>
            <th scope="col">Débit</th>
            <th scope="col">Crédit</th>
            <th scope="col">Post Comptable</th>
            <th scope="col">Lieu</th>
            <th scope="col" colspan="3" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($listeOperations as $op)
        <tr>
            <td><strong>{{ $op->reference }}</strong></td>
            <td>{{ $op->libelle }}</td>
            <td>{{ \Carbon\Carbon::parse($op->date_operation)->format('d/m/Y') }}</td>
            <td class="text-right text-danger">{{ number_format($op->montant_debit, 2, ',', ' ') }} F</td>
            <td class="text-right text-success">{{ number_format($op->montant_credit, 2, ',', ' ') }} F</td>
            <td>{{ $op->postComptable ? $op->postComptable->libelle : '-' }}</td>
            <td>{{ $op->lieu ? $op->lieu->libelle : '-' }}</td>
            <td class="text-center"><a href="{{ route('operation.read', $op->id) }}" class="btn btn-outline-info btn-sm">Consulter</a></td>
            <td class="text-center"><a href="{{ route('operation.formUpdate', $op->id) }}" class="btn btn-outline-warning btn-sm">Modifier</a></td>
            <td class="text-center"><a href="{{ route('operation.confirmDelete', $op->id) }}" class="btn btn-outline-danger btn-sm">Supprimer</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="10" class="text-center text-muted">Aucune opération comptable enregistrée.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection

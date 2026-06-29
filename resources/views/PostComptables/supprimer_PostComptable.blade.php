@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1>Supprimer un PostComptable</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('PostComptable.All') }}">Retour à la liste</a>

<div class="card border-danger" style="max-width: 600px;">
    <div class="card-header bg-warning text-white">Confirmation de suppression</div>
    <div class="card-body">
        <p>Êtes-vous sûr de vouloir supprimer le PostComptable suivant ?</p>

        <table class="table table-bordered">
            <tr><th>Id</th><td>{{ $PostComptable->id }}</td></tr>
            <tr><th>Capacite</th><td>{{ $PostComptable->Capacite }}</td></tr>
            <tr><th>Libellé</th><td>{{ $PostComptable->libelle }}</td></tr>
        </table>

        <form method="POST" action="{{ route('PostComptable.delete', $PostComptable->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $PostComptable->id }}">
            <button type="submit" class="btn btn-warning">Confirmer la suppression</button>
            <a href="{{ route('PostComptable.All') }}" class="btn btn-secondary ml-2">Annuler</a>
        </form>
    </div>
</div>

@endsection

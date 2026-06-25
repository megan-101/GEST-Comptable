@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1>Supprimer un Lieu</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('lieu.All') }}">Retour à la liste</a>

<div class="card border-danger" style="max-width: 600px;">
    <div class="card-header bg-danger text-white">Confirmation de suppression</div>
    <div class="card-body">
        <p>Êtes-vous sûr de vouloir supprimer le lieu suivant ?</p>

        <table class="table table-bordered">
            <tr><th>Id</th><td>{{ $lieu->id }}</td></tr>
            <tr><th>Code</th><td>{{ $lieu->code }}</td></tr>
            <tr><th>Libellé</th><td>{{ $lieu->libelle }}</td></tr>
            <tr><th>Adresse</th><td>{{ $lieu->adresse }}</td></tr>
        </table>

        <form method="POST" action="{{ route('lieu.delete') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $lieu->id }}">
            <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
            <a href="{{ route('lieu.All') }}" class="btn btn-secondary ml-2">Annuler</a>
        </form>
    </div>
</div>

@endsection

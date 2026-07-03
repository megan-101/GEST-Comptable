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

<h1>Liste des Lieux</h1>
<hr />

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a class="btn btn-primary mb-3" href="{{ route('lieu.formAjout') }}">
    Ajouter un Lieu
</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Code</th>
            <th scope="col">Libellé</th>
            <th scope="col">Adresse</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listeLieux as $lieu)
        <tr>
            <th scope="row">{{ $lieu->id }}</th>
            <td>{{ $lieu->code }}</td>
            <td>{{ $lieu->libelle }}</td>
            <td>{{ $lieu->adresse }}</td>
            <td><a href="{{ route('lieu.read', $lieu->id) }}" class="btn btn-outline-info btn-sm">Consulter</a></td>
            <td><a href="{{ route('lieu.formUpdate', $lieu->id) }}" class="btn btn-outline-warning btn-sm">Modifier</a></td>
            <td><a href="{{ route('lieu.confirmDelete', $lieu->id) }}" class="btn btn-outline-danger btn-sm">Supprimer</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

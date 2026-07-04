@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1 class="mt-4">Liste des Transformations</h1>
<hr />

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a class="btn btn-primary mb-3" href="{{ route('transformations.create') }}">
    Ajouter une Transformation
</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">IDE Schema</th>
            <th scope="col">Flag Pièce</th>
            <th scope="col">Masque Pièce</th>
            <th scope="col">Flag Compte</th>
            <th scope="col">Masque Compte</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transformations as $transformation)
        <tr>
            <th scope="row">{{ $transformation->id }}</th>
            <td>{{ $transformation->ide_schema ?? '-' }}</td>
            <td>
                @if($transformation->flag_piece)
                    <span class="badge badge-success">Oui</span>
                @else
                    <span class="badge badge-secondary">Non</span>
                @endif
            </td>
            <td>{{ $transformation->mask_piece ?? '-' }}</td>
            <td>
                @if($transformation->flag_compte)
                    <span class="badge badge-success">Oui</span>
                @else
                    <span class="badge badge-secondary">Non</span>
                @endif
            </td>
            <td>{{ $transformation->mask_compte ?? '-' }}</td>
            <td><a href="{{ route('transformations.show', $transformation->id) }}" class="btn btn-outline-info btn-sm">Consulter</a></td>
            <td><a href="{{ route('transformations.edit', $transformation->id) }}" class="btn btn-outline-warning btn-sm">Modifier</a></td>
            <td>
                <form method="POST" action="{{ route('transformations.destroy', $transformation->id) }}" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center">Aucune transformation trouvée.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection

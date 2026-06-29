@extends('app')

@section('content')

<h1 class="mt-4">Liste des postes comptables</h1>
<hr />

<a class="btn btn-primary mb-3" href="{{ route('postcomptable.formAjout') }}">
    Ajouter un post comptable
</a>

<table class="table table-striped table-bordered mt-2">
    <thead class="table-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Capacité</th>
            <th scope="col">Libellé</th>
            <th scope="col" colspan="3" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($listePostComptables as $postComptable)
            <tr>
                <th scope="row">{{ $postComptable->id }}</th>
                <td>{{ $postComptable->capacite }}</td>
                <td>{{ $postComptable->libelle }}</td>
                <td class="text-center">
                    <a href="{{ route('postcomptable.read', $postComptable->id) }}" class="btn btn-outline-primary btn-sm">consulter</a>
                </td>
                <td class="text-center">
                    <a href="{{ route('postcomptable.formModifier', $postComptable->id) }}" class="btn btn-outline-warning btn-sm">modifier</a>
                </td>
                <td class="text-center">
                    <a href="{{ route('postcomptable.delete', $postComptable->id) }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce post comptable ?')">supprimer</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">Aucun post comptable enregistré.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection

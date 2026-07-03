@extends('app')

@section('content')

<h1 class="mt-4 text-danger">Supprimer le paramètre</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{route('parametre.All')}}">Annuler</a>

<div class="card border-danger mt-2">
    <div class="card-header bg-danger text-white">
        <h5>Confirmation de suppression</h5>
    </div>
    <div class="card-body">
        <p>Êtes-vous sûr de vouloir supprimer le paramètre suivant ? Cette action est irréversible.</p>
        
        <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item"><strong>ID :</strong> {{ $parametre->id }}</li>
            <li class="list-group-item"><strong>Code :</strong> {{ $parametre->code }}</li>
            <li class="list-group-item"><strong>Libellé :</strong> {{ $parametre->libelle }}</li>
        </ul>

        <a href="{{ route('parametre.destroy', $parametre->id) }}" class="btn btn-danger">Confirmer la suppression</a>
    </div>
</div>

@endsection

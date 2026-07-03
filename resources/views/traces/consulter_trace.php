@extends('app')

@section('content')

<h1 class="mt-4">Détails de la traces</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('traces.All') }}">Retour</a>

<div class="card mt-2">
    <div class="card-header bg-primary text-white">
        <h5>Post comptable #{{ $Traces->User_id }}</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <h6 class="text-muted">Action :</h6>
            <p class="lead font-weight-bold">{{ $Traces->Action }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Message :</h6>
            <p class="lead font-weight-bold">{{ $Traces->Message }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">User_id :</h6>
            <p class="lead font-weight-bold">{{ $Traces->User_id }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Créé le :</h6>
            <p>{{ $Traces->created_at ? $Traces->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Mis à jour le :</h6>
            <p>{{ $Traces->updated_at ? $Traces->updated_at->format('d/m/Y H:i') : 'N/A' }}</p>
        </div>
    </div>
</div>

@endsection

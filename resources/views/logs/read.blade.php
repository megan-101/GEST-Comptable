@extends('app')

@section('content')

<h1 class="mt-4">Détails de la Logs</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('logs.All') }}">Retour</a>

<div class="card mt-2">
    <div class="card-header bg-primary text-white">
        <h5>Post comptable #{{ $log->user_id }}</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <h6 class="text-muted">Action :</h6>
            <p class="lead font-weight-bold">{{ $log->action }}</p>
        </div>
        <div class="mb-3">
            <h6 class="text-muted">Message :</h6>
            <p class="lead font-weight-bold">{{ $log->message }}</p>
        </div>
    </div>
</div>

@endsection

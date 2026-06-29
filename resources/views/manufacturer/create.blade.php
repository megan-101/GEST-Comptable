@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="card border border-primary shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Ajouter un MAnufacturer</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ol class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
                <form action="{{ route('manufacturer.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" name="code" class="form-control" id="code" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prenom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="numtel" class="form-label">Numéro de téléphone</label>
                        <input type="text" name="numtel" class="form-control" id="numtel" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4">Ajouter</button>
                        <a href="{{ route('manufacturer.index') }}" class="btn btn-outline-danger">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
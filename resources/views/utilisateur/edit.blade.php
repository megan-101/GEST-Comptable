@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="card border border-primary shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Modifier un utilisateur</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('utilisateur.update', $utilisateur) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="matricule" class="form-label">Matricule</label>
                            <input type="text" value="{{ $utilisateur->matricule }}" name="matricule" class="form-control" id="matricule" required>
                        </div>
                        <div class="col-md-6">
                            <label for="login" class="form-label">Login</label>
                            <input type="text" value="{{ $utilisateur->login }}" name="login" class="form-control" id="login" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" value="{{ $utilisateur->nom }}" name="nom" class="form-control" id="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="mdp" class="form-label">Mot de passe</label>
                        <input type="password" value="{{ $utilisateur->mdp }}" name="mdp" class="form-control" id="mdp" readonly>
                    </div>
<<<<<<< HEAD
=======
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ $utilisateur->email }}" name="email" class="form-control" id="email" required>
                    </div>
>>>>>>> origin/dev
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4">Modifier</button>
                        <a href="{{ route('utilisateur.index') }}" class="btn btn-outline-danger">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
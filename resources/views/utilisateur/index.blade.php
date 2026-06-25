@extends('app')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 text-">Liste des Utilisateurs</h1>
            <a href="{{ route('utilisateur.create') }}" class="btn btn-primary shadow-sm">
                Ajouter un utilisateur
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center" style="width: 80px;">#</th>
                            <th scope="col">Matricule</th>
                            <th scope="col">Login</th>
                            <th scope="col">Nom</th>
                            <th scope="col" class="text-center" style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($utilisateurs as $utilisateur)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td>{{ $utilisateur->matricule }}</td>
                                <td>{{ $utilisateur->login }}</td>
                                <td>{{ $utilisateur->nom }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('utilisateur.edit', $utilisateur) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            Modifier
                                        </a>
                                        <form action="{{ route('utilisateur.destroy', $utilisateur) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i>Aucun utilisateur n'a été trouvé dans la base de données.</i>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
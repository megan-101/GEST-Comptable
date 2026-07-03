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
            <h1 class="h2 text-dark">Liste des Comptes</h1>
            <a href="{{ route('compte.create') }}" class="btn btn-success">
                + Nouveau Compte
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center" style="width: 80px;">ID</th>
                            <th scope="col">Valeur</th>
                            <th scope="col">Flag Modif</th>
                            <th scope="col" class="text-center" style="width: 230px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comptes as $compte)
                            <tr>
                                <th scope="row" class="text-center">{{ $compte->id }}</th>
                                <td>{{ $compte->valeur }}</td>
                                <td><span class="badge bg-secondary">{{ $compte->flag_modif }}</span></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('compte.show', $compte) }}"
                                            class="btn btn-sm btn-outline-info">
                                            Consulter
                                        </a>
                                        <a href="{{ route('compte.edit', $compte) }}"
                                            class="btn btn-sm btn-outline-primary ms-1">
                                            Modifier
                                        </a>
                                        <form action="{{ route('compte.destroy', $compte) }}" method="POST"
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?');"
                                            class="d-inline ms-1">
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
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i>Aucun compte n'a été trouvé dans la base de données.</i>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

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
            <h1 class="h2 text-dark">Liste des Écritures Comptables</h1>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center" style="width: 80px;">ID</th>
                            <th scope="col">Numéro</th>
                            <th scope="col">Date</th>
                            <th scope="col">ID Opération</th>
                            <th scope="col">Devise</th>
                            <th scope="col" class="text-center" style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ecritures as $ecriture)
                            <tr>
                                <th scope="row" class="text-center">{{ $ecriture->id }}</th>
                                <td>{{ $ecriture->numero }}</td>
                                <td>{{ $ecriture->date }}</td>
                                <td>{{ $ecriture->operation_id }}</td>
                                <td><span class="badge bg-secondary">{{ $ecriture->devise }}</span></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('ecriture.show', $ecriture) }}"
                                            class="btn btn-sm btn-outline-info">
                                            Consulter
                                        </a>
                                        <a href="{{ route('ecriture.edit', $ecriture) }}"
                                            class="btn btn-sm btn-outline-primary ms-1">
                                            Modifier
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i>Aucune écriture comptable n'a été trouvée dans la base de données.</i>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

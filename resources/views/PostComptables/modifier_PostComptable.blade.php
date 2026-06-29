@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1>Modifier un PostComptable</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('PostComptable.All') }}">Retour à la liste</a>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form method="POST" action="{{ route('PostComptable.update', $PostComptable->id) }}">
            @csrf
        

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="Capacite">Capacite</label>
                <input type="text" class="form-control" name="Capacite" id="Capacite" value="{{ old('Capacite', $PostComptable->Capacite) }}" required>
            </div>

            <div class="form-group">
                <label for="libelle">Libellé</label>
                <input type="text" class="form-control" name="libelle" id="libelle" value="{{ old('libelle', $PostComptable->libelle) }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Modifier</button>
        </form>
    </div>
</div>

@endsection

@extends('app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h1>Modifier un Lieu</h1>
<hr />

<a class="btn btn-secondary mb-3" href="{{ route('lieu.All') }}">Retour à la liste</a>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form method="POST" action="{{ route('lieu.update', $lieu->id) }}">
            @csrf
            @method('PUT')

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
                <label for="code">Code</label>
                <input type="text" class="form-control" name="code" id="code" value="{{ old('code', $lieu->code) }}" required>
            </div>

            <div class="form-group">
                <label for="libelle">Libellé</label>
                <input type="text" class="form-control" name="libelle" id="libelle" value="{{ old('libelle', $lieu->libelle) }}" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse" value="{{ old('adresse', $lieu->adresse) }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Modifier</button>
        </form>
    </div>
</div>

@endsection

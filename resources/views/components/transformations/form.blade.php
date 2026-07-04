<div class="card">
    <div class="card-header">
        {{ isset($transformation) ? 'Éditer la Transformation' : 'Nouvelle Transformation' }}
    </div>
    <div class="card-body">
        <form action="{{ isset($transformation) ? route('transformations.update', $transformation->id) : route('transformations.store') }}" method="POST">
            @csrf
            @if(isset($transformation))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="ide_schema" class="form-label">IDE Schema (ID)</label>
                <input type="number" name="ide_schema" id="ide_schema" class="form-control" value="{{ old('ide_schema', $transformation->ide_schema ?? '') }}">
            </div>

            <div class="mb-3 form-check">
                <input type="hidden" name="flag_piece" value="0">
                <input type="checkbox" name="flag_piece" id="flag_piece" class="form-check-input" value="1" {{ old('flag_piece', $transformation->flag_piece ?? false) ? 'checked' : '' }}>
                <label for="flag_piece" class="form-check-label">Flag Pièce</label>
            </div>

            <div class="mb-3">
                <label for="mask_piece" class="form-label">Mask Pièce</label>
                <input type="text" name="mask_piece" id="mask_piece" class="form-control" value="{{ old('mask_piece', $transformation->mask_piece ?? '') }}">
            </div>

            <div class="mb-3 form-check">
                <input type="hidden" name="flag_compte" value="0">
                <input type="checkbox" name="flag_compte" id="flag_compte" class="form-check-input" value="1" {{ old('flag_compte', $transformation->flag_compte ?? false) ? 'checked' : '' }}>
                <label for="flag_compte" class="form-check-label">Flag Compte</label>
            </div>

            <div class="mb-3">
                <label for="mask_compte" class="form-label">Mask Compte</label>
                <input type="text" name="mask_compte" id="mask_compte" class="form-control" value="{{ old('mask_compte', $transformation->mask_compte ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">
                {{ isset($transformation) ? 'Mettre à jour' : 'Enregistrer' }}
            </button>
        </form>
    </div>
</div>

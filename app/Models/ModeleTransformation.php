<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeleTransformation extends Model
{
    /** @use HasFactory<\Database\Factories\ModeleTransformationFactory> */
    use HasFactory;

    protected $table = 'modeles_transformation';

    protected $fillable = [
        'schema',
        'flag_piece',
        'mask_piece',
        'flag_compte',
        'mask_compte'
    ];

    protected $casts = [
        'flag_piece'  => 'boolean',
        'flag_compte' => 'boolean',
    ];

    /**
     * Relation avec les opérations comptables.
     */
    public function operations()
    {
        return $this->hasMany(OperationComptable::class, 'modele_id');
    }
}


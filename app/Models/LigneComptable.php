<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneComptable extends Model
{
    use HasFactory;

    protected $table = 'ligne_comptables';

    protected $fillable = [
        'ecriture_id',
        'compte',
        'type_op',
        'montant',
        'ref'
    ];

    /**
     * Get the ecriture comptable that owns this line.
     */
    public function ecriture()
    {
        return $this->belongsTo(EcritureComptable::class, 'ecriture_id');
    }
}

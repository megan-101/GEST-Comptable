<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationComptable extends Model
{
    use HasFactory;

    protected $table = 'operations_comptables';

    protected $fillable = [
        'reference',
        'libelle',
        'date_operation',
        'montant_debit',
        'montant_credit',
        'description',
        'post_comptable_id',
        'lieu_id',
    ];

    protected $casts = [
        'date_operation' => 'date',
        'montant_debit'  => 'decimal:2',
        'montant_credit' => 'decimal:2',
    ];

    public function postComptable()
    {
        return $this->belongsTo(PostComptable::class, 'post_comptable_id');
    }

    public function lieu()
    {
        return $this->belongsTo(Lieu::class, 'lieu_id');
    }
}

<?php

namespace App\Implementations;

use App\Interfaces\LigneComptableInterface;
use App\Models\LigneComptable;

class LigneComptableImpl implements LigneComptableInterface
{
    /**
     * Get all accounting lines.
     */
    public function all()
    {
        return LigneComptable::all();
    }

    /**
     * Find a specific accounting line by its ID.
     */
    public function find($id)
    {
        return LigneComptable::findOrFail($id);
    }
}

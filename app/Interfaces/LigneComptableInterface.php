<?php

namespace App\Interfaces;

interface LigneComptableInterface
{
    /**
     * Get all accounting lines.
     */
    public function all();

    /**
     * Find a specific accounting line by its ID.
     */
    public function find($id);
}

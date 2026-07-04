<?php

namespace App\Interfaces;

use App\Models\Transformation;

interface TransformationInterface
{
    /**
     * Retrieve all transformations.
     */
    public function getAll();

    /**
     * Retrieve a specific transformation by ID.
     */
    public function getById($id);

    /**
     * Create a new transformation.
     */
    public function create(array $data);

    /**
     * Update an existing transformation.
     */
    public function update($id, array $data);

    /**
     * Delete a transformation.
     */
    public function delete($id);
}

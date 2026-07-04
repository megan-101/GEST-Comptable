<?php

namespace App\Implementations;

use App\Interfaces\TransformationInterface;
use App\Models\Transformation;

class TransformationImplementation implements TransformationInterface
{
    /**
     * Retrieve all transformations.
     */
    public function getAll()
    {
        return Transformation::all();
    }

    /**
     * Retrieve a specific transformation by ID.
     */
    public function getById($id)
    {
        return Transformation::findOrFail($id);
    }

    /**
     * Create a new transformation.
     */
    public function create(array $data)
    {
        return Transformation::create($data);
    }

    /**
     * Update an existing transformation.
     */
    public function update($id, array $data)
    {
        $transformation = Transformation::findOrFail($id);
        $transformation->update($data);
        return $transformation;
    }

    /**
     * Delete a transformation.
     */
    public function delete($id)
    {
        $transformation = Transformation::findOrFail($id);
        return $transformation->delete();
    }
}

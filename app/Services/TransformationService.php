<?php

namespace App\Services;

use App\Interfaces\TransformationInterface;
use Illuminate\Support\Facades\Log;

class TransformationService
{
    protected $transformationRepository;

    /**
     * TransformationService constructor.
     *
     * @param TransformationInterface $transformationRepository
     */
    public function __construct(TransformationInterface $transformationRepository)
    {
        $this->transformationRepository = $transformationRepository;
    }

    /**
     * Get all transformations.
     */
    public function getAllTransformations()
    {
        return $this->transformationRepository->getAll();
    }

    /**
     * Get transformation by ID.
     */
    public function getTransformationById($id)
    {
        return $this->transformationRepository->getById($id);
    }

    /**
     * Create a transformation.
     */
    public function createTransformation(array $data)
    {
        Log::info('Exécution de la création dans le service', $data);
        return $this->transformationRepository->create($data);
    }

    /**
     * Update a transformation.
     */
    public function updateTransformation($id, array $data)
    {
        Log::info("Exécution de la mise à jour dans le service pour ID: {$id}", $data);
        return $this->transformationRepository->update($id, $data);
    }

    /**
     * Delete a transformation.
     */
    public function deleteTransformation($id)
    {
        Log::info("Exécution de la suppression dans le service pour ID: {$id}");
        return $this->transformationRepository->delete($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\interfaces\LieuInterface;
use Illuminate\Http\Request;

class LieuController extends Controller
{
    protected LieuInterface $lieuInterface;

    public function __construct(LieuInterface $lieuInterface)
    {
        $this->lieuInterface = $lieuInterface;
    }

    // Liste de tous les lieux
    public function all()
    {
        return $this->lieuInterface->all();
    }

    // Formulaire d'ajout
    public function formAjout()
    {
        return $this->lieuInterface->formAjout();
    }

    // Création d'un lieu
    public function create(Request $request)
    {
        return $this->lieuInterface->create($request);
    }

    // Consulter un lieu
    public function read($id)
    {
        return $this->lieuInterface->read($id);
    }

    // Formulaire de modification
    public function formUpdate($id)
    {
        return $this->lieuInterface->formUpdate($id);
    }

    // Mise à jour d'un lieu
    public function update(Request $request, $id)
    {
        return $this->lieuInterface->update($request, $id);
    }

    // Confirmation de suppression
    public function confirmDelete($id)
    {
        return $this->lieuInterface->confirmDelete($id);
    }

    // Suppression d'un lieu
    public function delete(Request $request)
    {
        return $this->lieuInterface->delete($request);
    }
}

<?php

namespace App\Implementations;

use App\Interfaces\ParametreInterface;
use App\Models\Parametre;
use Illuminate\Http\Request;
use App\Events\ParametreEvent;
use App\Events\ParametreActivityEvent;

class ParametreImpl implements ParametreInterface
{
    public function all()
    {
        event(new ParametreActivityEvent(
            'index',
            'Liste de tous les paramètres consultée'
        ));
        return Parametre::all();
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'libelle' => 'required',
        ]);

        $createdParametre = Parametre::create($request->all());

        // Ancien événement pour la création de fichier log si existant
        event(new ParametreEvent($createdParametre));

        // Nouvel événement d'activité pour stocker en base de données
        event(new ParametreActivityEvent(
            'create',
            "Paramètre créé avec succès : code {$createdParametre->code}",
            ['id' => $createdParametre->id, 'data' => $createdParametre->toArray()]
        ));

        return $createdParametre;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'libelle' => 'required',
        ]);

        $parametre = $this->find($id);
        $original = $parametre->toArray();
        $parametre->update($request->all());

        event(new ParametreActivityEvent(
            'update',
            "Paramètre modifié : ID {$id}",
            [
                'id' => $id,
                'before' => $original,
                'after' => $parametre->toArray()
            ]
        ));

        return $parametre;
    }

    public function find($id)
    {
        $parametre = Parametre::findOrFail($id);

        event(new ParametreActivityEvent(
            'read',
            "Paramètre consulté : ID {$id}",
            ['id' => $id, 'data' => $parametre->toArray()]
        ));

        return $parametre;
    }

    public function delete($id)
    {
        $parametre = $this->find($id);
        $deletedData = $parametre->toArray();
        $result = $parametre->delete();

        event(new ParametreActivityEvent(
            'delete',
            "Paramètre supprimé : ID {$id}",
            ['id' => $id, 'deleted_data' => $deletedData]
        ));

        return $result;
    }
}
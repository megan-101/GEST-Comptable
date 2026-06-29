<?php

namespace App\Implementations;

use App\Interfaces\ParametreInterface;
use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\ParametreEvent;


class ParametreImpl implements ParametreInterface
{
    public function all()
    {
        return Parametre::all();
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'libelle' => 'required',
        ]);

         //recupere le parametre inserer dans la base
        $createdParametre = Parametre::create($request->all());

        //cree un nouvel evenement
        $newParametreEvent = new ParametreEvent($createdParametre);

        //emission dispatch
        event($newParametreEvent);

        return $createdParametre;

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'libelle' => 'required',
        ]);

        $parametre = $this->find($id);
        $parametre->update($request->all());
        return $parametre;
    }

    public function find($id)
    {
        return Parametre::findOrFail($id);
    }

    public function delete($id)
    {
        $parametre = $this->find($id);
        return $parametre->delete();

       
    }

}
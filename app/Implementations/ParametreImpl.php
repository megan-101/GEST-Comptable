<?php

namespace App\Implementations;

use App\Interfaces\ParametreInterface;
use App\Models\Parametre;
use Illuminate\Http\Request;

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

        return Parametre::create($request->all());
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
<?php

namespace App\Implementations;

use App\Events\ManufacturerEvent;
use App\Interfaces\ManufacturerInterface;
use App\Models\Manufacturer;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;




class ManufacturerImpl implements ManufacturerInterface{
    public function getAll(){
        return Manufacturer::all();
    }

    public function create(): View{
        return view('manufacturer.create');
    }

    public function store(Request $request): Manufacturer{
        $request->validate([
            "code" => "required|unique:manufacturers|max:255",
            "nom" => "required|max:255",
            "prenom" => "required|max:255",
            "numtel" => "required|max:255"
        ]);

        //recupre le manufacturer inserer dans la base
        $createdManufacturer = Manufacturer::create($request->all());
        
        //cree un nouvel evenement
        $newManufacturerEvent = new ManufacturerEvent($createdManufacturer);

        //emission, dispatch de l'evenement
        event($newManufacturerEvent);

        return $createdManufacturer;
    }

    public function edit(Manufacturer $manufacturer): View{
        return view('manufacturer.edit', compact('manufacturer'));
    }

    public function update(Request $request, Manufacturer $manufacturer): bool{
        $request->validate([
            "code" => "required|unique:manufacturers,matricule," . $manufacturer->id . "|max:255",
            "nom" => "required|unique:manufacturers,login," . $manufacturer->id . "|max:255",
            "prenom" => "required|max:255",
            "numtel" => "required|max:255"
        ]);

        return $manufacturer->update($request->all());
        //return redirect()->route('manufacturer.index')->with('success', 'Manufacturer modifié avec succès');
    }

    public function destroy(Manufacturer $manufacturer): bool|null{
        return $manufacturer->delete();
        //return redirect()->route('manufacturer.index')->with('success', 'Manufacturer supprimé avec succès');
    }
}


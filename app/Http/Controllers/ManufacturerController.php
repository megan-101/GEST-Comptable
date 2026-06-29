<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ManufacturerInterface;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    protected ManufacturerInterface $manufacturerInterface;

    public function __construct(ManufacturerInterface $manufacturerInterface) {
        $this->manufacturerInterface = $manufacturerInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->manufacturerInterface->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->manufacturerInterface->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $manufacturer = $this->manufacturerInterface->store($request);
        try {
            if ($manufacturer === null) {
                return redirect()->route('manufacturer.index')->with('error', 'Erreur lors de la création de l\'manufacturer');
            }else{
                return redirect()->route('manufacturer.index')->with('success', 'Manufacturer créé avec succès');
            }
        } catch (Exception $e) {
            return redirect()->route('manufacturer.index')->with('error', 'Erreur lors de la création de l\'manufacturer: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manufacturer $manufacturer)
    {
        return $this->manufacturerInterface->edit($manufacturer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $result = $this->manufacturerInterface->update($request, $manufacturer);

        if($result){
            return redirect()->route('manufacturer.index')->with('success', 'Manufacturer modifié avec succès');
        }else{
            return redirect()->route('manufacturer.index')->with('error', 'Erreur lors de la modification de l\'manufacturer');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    {
        return $this->manufacturerInterface->destroy($manufacturer);
    }
}




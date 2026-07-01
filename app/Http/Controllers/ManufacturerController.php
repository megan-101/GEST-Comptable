<?php

namespace App\Http\Controllers;

use App\Interfaces\LogInterface;
use Illuminate\Http\Request;
use App\Interfaces\ManufacturerInterface;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    protected ManufacturerInterface $manufacturerInterface;
    protected LogInterface $logInterface;

    public function __construct(ManufacturerInterface $manufacturerInterface,
                                LogInterface $logInterface) {
        $this->manufacturerInterface = $manufacturerInterface;
        $this->logInterface = $logInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $manufacturers = $this->manufacturerInterface->getAll();

            if($manufacturers === null){
                $this->logInterface->save([
                    'modele' => 'MANUFACTURER',
                    'action' => 'Tentative de Lister Tous les Manufecturers',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue',
                    'ip_address' => request()->ip(),
                ]);
            }
            else{
                $this->logInterface->save([
                    'modele' => 'MANUFACTURER',
                    'action' => 'Lister Tous les Manufecturers',
                    'statut' => 'SUCCES',
                    'message' => 'Tous les manufacturers ont ete affcihé avec succes',
                    'ip_address' => request()->ip(),
                ]);

                return view('manufacturer.index', compact('manufacturers') );
            }
        }catch(Exception $e){
            $this->logInterface->save([
                'modele' => 'MANUFACTURER',
                'action' => 'Tentative de Lister Tous les Manufecturers',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        try{
            $this->logInterface->save([
                    'modele' => 'MANUFACTURER',
                    'action' => 'Redirection vers le formulaire d\'ajout',
                    'statut' => 'SUCCES',
                    'message' => 'Affichage du formulaire avec ducces',
                    'ip_address' => request()->ip(),
                ]);

            return $this->manufacturerInterface->create();  
        }catch(Exception $e){
            $this->logInterface->save([
                'modele' => 'MANUFACTURER',
                'action' => 'Tentative Redirection vers le formulaire d\'ajout',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $manufacturer = $this->manufacturerInterface->store($request);
            if ($manufacturer === null) {
                $this->logInterface->save([
                    'modele' => 'MANUFACTURER',
                    'action' => 'Tentative d\'Ajout Manufactureer',
                    'statut' => 'ECHEC',
                    'message' => 'Une erreur esr survenue lors de l\'ajout d\'un manufactureur',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('manufacturer.index')->with('error', 'Erreur lors de la création de l\'manufacturer');
            }else{
                $this->logInterface->save([
                    'modele' => 'MANUFACTURER',
                    'action' => 'Ajout Manufactureer',
                    'statut' => 'SUCCES',
                    'message' => 'Manufacturer ajoute avec succes, id:'.$manufacturer->id,
                    'ip_address' => request()->ip(),
                ]);
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




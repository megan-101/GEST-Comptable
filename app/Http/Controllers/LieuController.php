<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Lieu;
=======
use App\interfaces\LieuInterface;
use App\Interfaces\LogInterface;
>>>>>>> origin/dev
use Illuminate\Http\Request;

class LieuController extends Controller
{
<<<<<<< HEAD
    // Liste de tous les lieux
    public function all()
    {
        $listeLieux = Lieu::all();
        return view('lieux.liste_lieux', compact('listeLieux'));
    }

    // Formulaire d'ajout
    public function formAjout()
    {
        return view('lieux.form_ajout_lieu');
    }

    // Création d'un lieu
    public function create(Request $request)
    {
        $request->validate([
            'code'    => 'required|unique:lieux,code',
            'libelle' => 'required',
            'adresse' => 'required',
        ]);

        Lieu::create($request->only(['code', 'libelle', 'adresse']));

        return redirect()->route('lieu.All')->with('success', 'Lieu ajouté avec succès.');
    }

    // Consulter un lieu
    public function read($id)
    {
        $lieu = Lieu::findOrFail($id);
        return view('lieux.consulter_lieu', compact('lieu'));
    }

    // Formulaire de modification
    public function formUpdate($id)
    {
        $lieu = Lieu::findOrFail($id);
        return view('lieux.modifier_lieu', compact('lieu'));
    }

    // Mise à jour d'un lieu
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'    => 'required|unique:lieux,code,' . $id,
            'libelle' => 'required',
            'adresse' => 'required',
        ]);

        $lieu = Lieu::findOrFail($id);
        $lieu->update($request->only(['code', 'libelle', 'adresse']));

        return redirect()->route('lieu.All')->with('success', 'Lieu modifié avec succès.');
    }

    // Confirmation de suppression
    public function confirmDelete($id)
    {
        $lieu = Lieu::findOrFail($id);
        return view('lieux.supprimer_lieu', compact('lieu'));
    }

    // Suppression d'un lieu
    public function delete(Request $request)
    {
        $lieu = Lieu::findOrFail($request->id);
        $lieu->delete();

        return redirect()->route('lieu.All')->with('success', 'Lieu supprimé avec succès.');
    }
}
=======
    protected LieuInterface $lieuInterface;
    protected LogInterface $logInterface;

    public function __construct(LieuInterface $lieuInterface, LogInterface $logInterface)
    {
        $this->lieuInterface = $lieuInterface;
        $this->logInterface = $logInterface;
    }

    // ─────────────────────────────────────────────────────────────
    // Liste de tous les lieux
    // ─────────────────────────────────────────────────────────────
    public function all()
    {
        try {
            $lieux = $this->lieuInterface->all();
            if ($lieux === null) {
                $this->logInterface->save([
                    'modele' => 'LIEU',
                    'action' => 'Tentative de Lister Tous les Lieux',
                    'statut' => 'ECHEC',
                    'message' => 'Une erreur est survenue lors de la récupération des lieux',
                    'ip_address' => request()->ip(),
                ]);
            } else {
                $this->logInterface->save([
                    'modele' => 'LIEU',
                    'action' => 'Lister Tous les Lieux',
                    'statut' => 'SUCCES',
                    'message' => 'Tous les lieux ont été affichés avec succès',
                    'ip_address' => request()->ip(),
                ]);
            }
            return $lieux;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Tentative de Lister Tous les Lieux',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Impossible de charger la liste des lieux.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Formulaire d'ajout
    // ─────────────────────────────────────────────────────────────
    public function formAjout()
    {
        try {
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Redirection vers le formulaire d\'ajout',
                'statut' => 'SUCCES',
                'message' => 'Affichage du formulaire d\'ajout avec succès',
                'ip_address' => request()->ip(),
            ]);
            return $this->lieuInterface->formAjout();
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Tentative de redirection vers le formulaire d\'ajout',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Impossible de charger le formulaire d\'ajout.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Création d'un lieu
    // ─────────────────────────────────────────────────────────────
    public function create(Request $request)
    {
        try {
            $response = $this->lieuInterface->create($request);
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Ajout Lieu',
                'statut' => 'SUCCES',
                'message' => 'Lieu ajouté avec succès',
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Tentative d\'Ajout Lieu',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la création du lieu.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Consulter un lieu
    // ─────────────────────────────────────────────────────────────
    public function read($id)
    {
        try {
            $response = $this->lieuInterface->read($id);
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Consulter un Lieu',
                'statut' => 'SUCCES',
                'message' => 'Lieu consulté avec succès, id: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Tentative de consulter un Lieu',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Lieu introuvable.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Formulaire de modification
    // ─────────────────────────────────────────────────────────────
    public function formUpdate($id)
    {
        try {
            $response = $this->lieuInterface->formUpdate($id);
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Redirection vers le formulaire de modification',
                'statut' => 'SUCCES',
                'message' => 'Affichage du formulaire de modification avec succès, id: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Tentative de redirection vers le formulaire de modification',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Lieu introuvable.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Mise à jour d'un lieu
    // ─────────────────────────────────────────────────────────────
    public function update(Request $request, $id)
    {
        try {
            $response = $this->lieuInterface->update($request, $id);
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Modification de Lieu',
                'statut' => 'SUCCES',
                'message' => 'Lieu modifié avec succès, id: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Tentative de modification de Lieu',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour du lieu.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Confirmation de suppression
    // ─────────────────────────────────────────────────────────────
    public function confirmDelete($id)
    {
        try {
            $response = $this->lieuInterface->confirmDelete($id);
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Redirection vers le formulaire de suppression',
                'statut' => 'SUCCES',
                'message' => 'Affichage du formulaire de confirmation de suppression pour le lieu id: ' . $id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Tentative de redirection vers le formulaire de suppression',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Lieu introuvable.');
        }
    }

    // ─────────────────────────────────────────────────────────────
    // Suppression d'un lieu
    // ─────────────────────────────────────────────────────────────
    public function delete(Request $request)
    {
        try {
            $response = $this->lieuInterface->delete($request);
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Suppression de Lieu',
                'statut' => 'SUCCES',
                'message' => 'Lieu supprimé avec succès, id: ' . $request->id,
                'ip_address' => request()->ip(),
            ]);
            return $response;
        } catch (\Exception $e) {
            $this->logInterface->save([
                'modele' => 'LIEU',
                'action' => 'Tentative de suppression de Lieu',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
            return redirect()->back()->with('error', 'Erreur lors de la suppression du lieu.');
        }
    }
}

>>>>>>> origin/dev

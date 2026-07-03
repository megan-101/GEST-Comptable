<?php

namespace App\Http\Controllers;

use App\Interfaces\LogInterface;
use App\Models\PostComptable;
use App\Interfaces\PostComptableInterface;
use Illuminate\Http\Request;
use Exception;


class PostComptableController extends Controller

{
 
    protected  PostComptableInterface $PostComptableInterface;

    protected LogInterface $logInterface;

    public function __construct(PostComptableInterface $PostComptableInterface,
                                LogInterface $LogInterface){
                    $this->PostComptableInterface = $PostComptableInterface;
                    $this->LogInterface = $LogInterface;
    }
       
    public function all()
    { try{
            $postComptable = $this->PostComptableInterface->All();

            if($postComptable === null){
                $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Tentative de Lister Tous les Postes Comptables',
                    'statut' => 'ECHEC',
                    'message' => 'Une Erreur est survenue',
                    'ip_address' => request()->ip(),
                ]);
            }
            else{
                $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Lister Tous les Postes Comptables',
                    'statut' => 'SUCCES',
                    'message' => 'Tous les Postes Comptables ont ete affcihé avec succes',
                    'ip_address' => request()->ip(),
                ]);

        return view('postcomptables.liste_postcomptables', compact('listePostComptables'));
            }
        }catch(Exception $e){
            $this->LogInterface->save([
                'modele' => 'Postes Comptables',
                'action' => 'Tentative de Lister Tous les Postes Comptables',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }

    }

    public function formAjout()
    {
         try{

            $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Redirection vers le formulaire d\'ajout',
                    'statut' => 'SUCCES',
                    'message' => 'Affichage du formulaire avec ducces',
                    'ip_address' => request()->ip(),
                ]);

            return view('postcomptables.form_ajout_postcomptables');

        }catch(Exception $e){
            $this->LogInterface->save([
                'modele' => 'Poste Comptable',
                'action' => 'Tentative Redirection vers le formulaire d\'ajout',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }
    }

    public function create(Request $request)
    {
        try {
            $postComptable = $this->PostComptableInterface->create($request);
            if ($postComptable === null) {
                $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Tentative d\'Ajout Poste Comptable',
                    'statut' => 'ECHEC',
                    'message' => 'Une erreur esr survenue lors de l\'ajout d\'un poste comptable',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('postcomptable.All')->with('error', 'Erreur lors de la création du poste comptable');
            }else{
                $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Ajout Poste Comptable',
                    'statut' => 'SUCCES',
                    'message' => 'Poste Comptabel ajoute avec succes, id:'.$postComptable->id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('postcomptable.All')->with('success', 'Poste Comptable créé avec succès');
            }
        } catch (Exception $e) {
            return redirect()->route('postcomptable.All')->with('error', 'Erreur lors de la création du Poste Comptable: ' . $e->getMessage());
        }
    }

    public function read($id)
    {
         try{

            $postComptable = $this->postComptableInterface->find($id);

            $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Redirection vers le formulaire de conultation',
                    'statut' => 'SUCCES',
                    'message' => 'Affichage du formulaire avec ducces',
                    'ip_address' => request()->ip(),
                ]);

        return view('postcomptables.consulter_postcomptables', compact('postComptable'));

        }catch(Exception $e){
            $this->LogInterface->save([
                'modele' => 'Poste Comptable',
                'action' => 'Tentative Redirection vers le formulaire de consultation',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }

    }

    public function formModifier($id)
    {
         try{

            $postComptable = $this->postComptableInterface->find($id);

            $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Redirection vers le formulaire de modification',
                    'statut' => 'SUCCES',
                    'message' => 'Affichage du formulaire avec ducces',
                    'ip_address' => request()->ip(),
                ]);

        return view('postcomptables.modifier_postcomptables', compact('postComptable'));

        }catch(Exception $e){
            $this->LogInterface->save([
                'modele' => 'Poste Comptable',
                'action' => 'Tentative Redirection vers le formulaire de modification',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }
    }

    public function update(Request $request, $id)
    { 
        try{
       $postComptable = $this->PostComptableInterface->update($request, $id);
            if ($postComptable === null) {
                $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Tentative de modification Poste Comptable',
                    'statut' => 'ECHEC',
                    'message' => 'Une erreur est survenue lors de la modification d\'un poste comptable',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('postcomptable.All')->with('error', 'Erreur lors de la modification du poste comptable');
            }else{
                $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Modification Poste Comptable',
                    'statut' => 'SUCCES',
                    'message' => 'Poste Comptabel modifier avec succes, id:'.$postComptable->id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('postcomptable.All')->with('success', 'Poste Comptable modifier avec succès');
            }
        } catch (Exception $e) {
            return redirect()->route('postcomptable.All')->with('error', 'Erreur lors de la modification du Poste Comptable: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try{

            $postComptable = $this->postComptableInterface->find($id);

            $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Redirection vers le formulaire de suppression',
                    'statut' => 'SUCCES',
                    'message' => 'Affichage du formulaire avec ducces',
                    'ip_address' => request()->ip(),
                ]);

        return view('postcomptables.supprimer_postcomptables', compact('postComptable'));

        }catch(Exception $e){
            $this->LogInterface->save([
                'modele' => 'Poste Comptable',
                'action' => 'Tentative Redirection vers le formulaire de suppression',
                'statut' => 'ECHEC',
                'message' => $e->getMessage(),
                'ip_address' => request()->ip(),
            ]);
        }
    }

    public function destroy($id)
    {
         try{

            $postComptable = $this->postComptableInterface->delete($id);

            if ($postComptable === null) {
                $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Tentative de suppression Poste Comptable',
                    'statut' => 'ECHEC',
                    'message' => 'Une erreur est survenue lors de la suppression d\'un poste comptable',
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('postcomptable.All')->with('error', 'Erreur lors de la suppression du poste comptable');
            }else{
                $this->LogInterface->save([
                    'modele' => 'Poste Comptable',
                    'action' => 'Modification Poste Comptable',
                    'statut' => 'SUCCES',
                    'message' => 'Poste Comptabel supprimé avec succes, id:'.$postComptable->id,
                    'ip_address' => request()->ip(),
                ]);
                return redirect()->route('postcomptable.All')->with('success', 'Poste Comptable supprimé avec succès');
            }
        } catch (Exception $e) {
            return redirect()->route('postcomptable.All')->with('error', 'Erreur lors de la suppression du Poste Comptable: ' . $e->getMessage());
        }

    }
}

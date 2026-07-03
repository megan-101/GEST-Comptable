<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Models\PostComptable;
use Illuminate\Services\PostComptableService;


class PostComptableController extends Controller
{
    //
     public function all(){
            $listePostComptables = PostComptable::all();
            return view('PostComptables.liste_PostComptables', compact('listePostComptables'));

        } 

        public function formAjout(){
            return view('PostComptables.form_ajout_PostComptables');

        } 
        
        public function create(Request $create){
           $create->validate(
           [
                'id' =>'required',
                'capacite' =>'required',
                'libelle' =>'required',
            ]
        );

        PostComptables::create($create->all());
        return redirect()->route('PostComptable.All');

        }
        public function read( $id){
          $PostComptable =  PostComptable::find($id);


        return view('PostComptables.consulter_PostComptables', compact('PostComptable'));

        }
        public function update(Request $create){
          $PostComptable =  PostComptable::find($id);


        return view('modifier_PostComptables', compact('PostComptable'));

        }
        public function delete(Request $create){
          $PostComptable =  PostComptable::find($id);


        return view('supprimer_PostComptable', compact('PostComptable'));

        }
=======
use App\Interfaces\PostComptableInterface;
use Illuminate\Http\Request;

class PostComptableController extends Controller
{
    protected $postComptableService;

    public function __construct(PostComptableInterface $postComptableService)
    {
        $this->postComptableService = $postComptableService;
    }

    public function all()
    {
        $listePostComptables = $this->postComptableService->all();

        return view('postcomptables.liste_postcomptables', compact('listePostComptables'));
    }

    public function formAjout()
    {
        return view('postcomptables.form_ajout_postcomptables');
    }

    public function create(Request $request)
    {
        $this->postComptableService->create($request);

        return redirect()->route('postcomptable.All');
    }

    public function read($id)
    {
        $postComptable = $this->postComptableService->find($id);

        return view('postcomptables.consulter_postcomptables', compact('postComptable'));
    }

    public function formModifier($id)
    {
        $postComptable = $this->postComptableService->find($id);

        return view('postcomptables.modifier_postcomptables', compact('postComptable'));
    }

    public function update(Request $request, $id)
    {
        $this->postComptableService->update($request, $id);

        return redirect()->route('postcomptable.All');
    }

    public function delete($id)
    {
        $postComptable = $this->postComptableService->find($id);

        return view('postcomptables.supprimer_postcomptables', compact('postComptable'));
    }

    public function destroy($id)
    {
        $this->postComptableService->delete($id);

        return redirect()->route('postcomptable.All');
    }
>>>>>>> origin/dev
}

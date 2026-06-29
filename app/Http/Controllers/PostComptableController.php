<?php

namespace App\Http\Controllers;

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
}

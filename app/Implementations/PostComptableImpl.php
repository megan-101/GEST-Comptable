<?php

namespace App\Implementations;

use App\Events\PostComptableEvent;
use App\Interfaces\PostComptableInterface;
use App\Models\PostComptable;
use Illuminate\Http\Request;

class PostComptableImpl implements PostComptableInterface
{
    public function all()
    {
        return PostComptable::all();
    }

    public function create(Request $request)
    {
        $request->validate([
            'capacite' => 'required|numeric',
            'libelle' => 'required',
        ]);

        $createdPostComptable = PostComptable::create($request->all());

        event(new PostComptableEvent($createdPostComptable));

        return $createdPostComptable;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'capacite' => 'required|numeric',
            'libelle' => 'required',
        ]);

        $postComptable = $this->find($id);
        $postComptable->update($request->all());

        return $postComptable;
    }

    public function find($id)
    {
        return PostComptable::findOrFail($id);
    }

    public function delete($id)
    {
        $postComptable = $this->find($id);

        return $postComptable->delete();
    }
}

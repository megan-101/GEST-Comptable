<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PostComptableInterface
{
    public function all();

    public function create(Request $request);

    public function update(Request $request, $id);

    public function find($id);

    public function delete($id);
}

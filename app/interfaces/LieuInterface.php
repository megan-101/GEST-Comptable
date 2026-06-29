<?php

namespace App\interfaces;

use Illuminate\Http\Request;

interface LieuInterface
{
    public function all();
    public function formAjout();
    public function create(Request $request);
    public function read($id);
    public function formUpdate($id);
    public function update(Request $request, $id);
    public function confirmDelete($id);
    public function delete(Request $request);
}

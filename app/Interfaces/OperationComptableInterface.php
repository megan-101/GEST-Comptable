<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OperationComptableInterface
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

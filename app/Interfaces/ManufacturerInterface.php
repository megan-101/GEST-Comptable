<?php

namespace App\Interfaces;

use App\Models\Manufacturer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


interface ManufacturerInterface{

    // les interfaces ne contiennent que les def des fonctions donc le nom son type et ses arguments et n'a acune logique d'implementation

    public function index(): View;

    public function create(): View;

    public function store(Request $request): Manufacturer;

    public function edit(Manufacturer $Manufacturer): View;

    public function update(Request $request, Manufacturer $Manufacturer): bool;

    public function destroy(Manufacturer $Manufacturer): bool|null;
    
}
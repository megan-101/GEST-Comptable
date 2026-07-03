<?php

namespace App\Interfaces;

use App\Models\EcritureComptable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

interface EcritureComptableInterface
{
    public function index(): View;

    public function show(EcritureComptable $ecritureComptable): View;

    public function edit(EcritureComptable $ecritureComptable): View;

    public function update(Request $request, EcritureComptable $ecritureComptable): bool;
}

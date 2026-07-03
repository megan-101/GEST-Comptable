<?php

namespace App\Interfaces;

use App\Models\Compte;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

interface CompteInterface
{
    public function index(): View;

    public function create(): View;

    public function store(Request $request): bool;

    public function show(Compte $compte): View;

    public function edit(Compte $compte): View;

    public function update(Request $request, Compte $compte): bool;

    public function destroy(Compte $compte): bool;
}

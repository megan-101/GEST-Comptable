<?php

namespace App\Http\Controllers;

use App\Models\Transformation;
use App\Http\Requests\StoreTransformationRequest;
use App\Http\Requests\UpdateTransformationRequest;
use Illuminate\Support\Facades\Log;

class TransformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transformations = Transformation::all();
        return view('transformations.index', compact('transformations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transformations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransformationRequest $request)
    {
        Log::info('Nouvelle demande de création de transformation', $request->validated());
        Transformation::create($request->validated());

        return redirect()->route('transformations.index')
                         ->with('success', 'Transformation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transformation $transformation)
    {
        return view('transformations.show', compact('transformation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transformation $transformation)
    {
        return view('transformations.edit', compact('transformation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransformationRequest $request, Transformation $transformation)
    {
        Log::info("Demande de mise à jour de la transformation ID: {$transformation->id}", $request->validated());
        $transformation->update($request->validated());

        return redirect()->route('transformations.index')
                         ->with('success', 'Transformation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transformation $transformation)
    {
        Log::info("Demande de suppression de la transformation ID: {$transformation->id}");
        $transformation->delete();

        return redirect()->route('transformations.index')
                         ->with('success', 'Transformation supprimée avec succès.');
    }
}

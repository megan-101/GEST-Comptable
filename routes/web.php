<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return redirect()->route('operation.All');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ─────────────────────────────────────────────────────────────
    // Routes Opérations Comptables
    // ─────────────────────────────────────────────────────────────
    Route::prefix('operations')->name('operation.')->group(function () {
        Route::get('/', [\App\Http\Controllers\OperationComptableController::class, 'all'])->name('All');
        Route::get('/form-ajout', [\App\Http\Controllers\OperationComptableController::class, 'formAjout'])->name('formAjout');
        Route::post('/create', [\App\Http\Controllers\OperationComptableController::class, 'create'])->name('create');
        Route::get('/{id}', [\App\Http\Controllers\OperationComptableController::class, 'read'])->name('read');
        Route::get('/{id}/form-update', [\App\Http\Controllers\OperationComptableController::class, 'formUpdate'])->name('formUpdate');
        Route::post('/{id}/update', [\App\Http\Controllers\OperationComptableController::class, 'update'])->name('update');
        Route::get('/{id}/confirm-delete', [\App\Http\Controllers\OperationComptableController::class, 'confirmDelete'])->name('confirmDelete');
        Route::post('/delete', [\App\Http\Controllers\OperationComptableController::class, 'delete'])->name('delete');
    });
});

require __DIR__.'/auth.php';

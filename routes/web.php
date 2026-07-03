<?php

<<<<<<< HEAD
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\BatimentsController;
use App\Http\Controllers\PostComptableController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\LigneComptableController;
use App\Http\Controllers\EcritureComptableController;
=======
use App\Http\Controllers\ProfileController;
>>>>>>> dlv
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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

Route::get('ligne-comptable/all', [LigneComptableController::class, 'index'])->name('lignecomptable.index');
Route::get('ligne-comptable/read/{id}', [LigneComptableController::class, 'show'])->name('lignecomptable.show');
// ---- Routes Ecriture Comptable ----
Route::get('/ecriture', [EcritureComptableController::class, 'index'])->name('ecriture.index');
Route::get('/ecriture/{ecritureComptable}', [EcritureComptableController::class, 'show'])->name('ecriture.show');
Route::get('/ecriture/{ecritureComptable}/edit', [EcritureComptableController::class, 'edit'])->name('ecriture.edit');
Route::put('/ecriture/{ecritureComptable}', [EcritureComptableController::class, 'update'])->name('ecriture.update');



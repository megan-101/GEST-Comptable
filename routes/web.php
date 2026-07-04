<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\PostComptableController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\ModeleTransformationController;
use App\Http\Controllers\TransformationController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\LigneComptableController;
use App\Http\Controllers\EcritureComptableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OperationComptableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/app', function () {
    return view('app');
})->name('app');

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
        Route::get('/', [OperationComptableController::class, 'all'])->name('All');
        Route::get('/form-ajout', [OperationComptableController::class, 'formAjout'])->name('formAjout');
        Route::post('/create', [OperationComptableController::class, 'create'])->name('create');
        Route::get('/{id}', [OperationComptableController::class, 'read'])->name('read');
        Route::get('/{id}/form-update', [OperationComptableController::class, 'formUpdate'])->name('formUpdate');
        Route::post('/{id}/update', [OperationComptableController::class, 'update'])->name('update');
        Route::get('/{id}/confirm-delete', [OperationComptableController::class, 'confirmDelete'])->name('confirmDelete');
        Route::post('/delete', [OperationComptableController::class, 'delete'])->name('delete');
    });
});

// ─────────────────────────────────────────────────────────────
// Routes Ligne Comptable
// ─────────────────────────────────────────────────────────────
Route::get('ligne-comptable/all', [LigneComptableController::class, 'index'])->name('lignecomptable.index');
Route::get('ligne-comptable/read/{id}', [LigneComptableController::class, 'show'])->name('lignecomptable.show');

// ─────────────────────────────────────────────────────────────
// Routes Ecriture Comptable
// ─────────────────────────────────────────────────────────────
Route::get('/ecriture', [EcritureComptableController::class, 'index'])->name('ecriture.index');
Route::get('/ecriture/{ecritureComptable}', [EcritureComptableController::class, 'show'])->name('ecriture.show');
Route::get('/ecriture/{ecritureComptable}/edit', [EcritureComptableController::class, 'edit'])->name('ecriture.edit');
Route::put('/ecriture/{ecritureComptable}', [EcritureComptableController::class, 'update'])->name('ecriture.update');

// ─────────────────────────────────────────────────────────────
// Routes Lieu
// ─────────────────────────────────────────────────────────────
Route::get('lieu/all', [LieuController::class, 'all'])->name('lieu.All');
Route::get('lieu/formAjout', [LieuController::class, 'formAjout'])->name('lieu.formAjout');
Route::post('lieu/create', [LieuController::class, 'create'])->name('lieu.create');
Route::get('lieu/read/{id}', [LieuController::class, 'read'])->name('lieu.read');
Route::get('lieu/modifier/{id}', [LieuController::class, 'formUpdate'])->name('lieu.formUpdate');
Route::put('lieu/update/{id}', [LieuController::class, 'update'])->name('lieu.update');
Route::get('lieu/supprimer/{id}', [LieuController::class, 'confirmDelete'])->name('lieu.confirmDelete');
Route::post('lieu/delete', [LieuController::class, 'delete'])->name('lieu.delete');

// ─────────────────────────────────────────────────────────────
// Routes Utilisateur
// ─────────────────────────────────────────────────────────────
Route::get('/utilisateur', [UtilisateurController::class, 'index'])->name('utilisateur.index');
Route::get('/utilisateur/create', [UtilisateurController::class, 'create'])->name('utilisateur.create');
Route::post('/utilisateur', [UtilisateurController::class, 'store'])->name('utilisateur.store');
Route::get('/utilisateur/{utilisateur}/edit', [UtilisateurController::class, 'edit'])->name('utilisateur.edit');
Route::put('/utilisateur/{utilisateur}', [UtilisateurController::class, 'update'])->name('utilisateur.update');
Route::delete('/utilisateur/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateur.destroy');
Route::patch('/utilisateur/{utilisateur}/toggle-status', [UtilisateurController::class, 'toggleStatus'])->name('utilisateur.toggle_status');

// ─────────────────────────────────────────────────────────────
// Routes Manufacturer
// ─────────────────────────────────────────────────────────────
Route::get('/manufacturer/all', [ManufacturerController::class, 'index'])->name('manufacturer.index');
Route::get('/manufacturer/create', [ManufacturerController::class, 'create'])->name('manufacturer.create');
Route::post('/manufacturer', [ManufacturerController::class, 'store'])->name('manufacturer.store');
Route::get('/manufacturer/{manufacturer}/edit', [ManufacturerController::class, 'edit'])->name('manufacturer.edit');
Route::put('/manufacturer/{manufacturer}', [ManufacturerController::class, 'update'])->name('manufacturer.update');
Route::delete('/manufacturer/{manufacturer}', [ManufacturerController::class, 'destroy'])->name('manufacturer.destroy');

// ─────────────────────────────────────────────────────────────
// Routes Paramètre
// ─────────────────────────────────────────────────────────────
Route::get('parametre/all', [ParametreController::class, 'all'])->name('parametre.All');
Route::get('parametre/formAjout', [ParametreController::class, 'formAjout'])->name('parametre.formAjout');
Route::post('parametre/Create', [ParametreController::class, 'create'])->name('parametre.create');
Route::get('parametre/read/{id}', [ParametreController::class, 'read'])->name('parametre.read');
Route::get('parametre/formModifier/{id}', [ParametreController::class, 'formModifier'])->name('parametre.formModifier');
Route::post('parametre/update/{id}', [ParametreController::class, 'update'])->name('parametre.update');
Route::get('parametre/delete/{id}', [ParametreController::class, 'delete'])->name('parametre.delete');
Route::get('parametre/destroy/{id}', [ParametreController::class, 'destroy'])->name('parametre.destroy');

// ─────────────────────────────────────────────────────────────
// Routes Post Comptable
// ─────────────────────────────────────────────────────────────
Route::get('postcomptable/all', [PostComptableController::class, 'all'])->name('postcomptable.All');
Route::get('postcomptable/formAjout', [PostComptableController::class, 'formAjout'])->name('postcomptable.formAjout');
Route::post('postcomptable/Create', [PostComptableController::class, 'create'])->name('postcomptable.create');
Route::get('postcomptable/read/{id}', [PostComptableController::class, 'read'])->name('postcomptable.read');
Route::get('postcomptable/formModifier/{id}', [PostComptableController::class, 'formModifier'])->name('postcomptable.formModifier');
Route::post('postcomptable/update/{id}', [PostComptableController::class, 'update'])->name('postcomptable.update');
Route::get('postcomptable/delete/{id}', [PostComptableController::class, 'delete'])->name('postcomptable.delete');
Route::get('postcomptable/destroy/{id}', [PostComptableController::class, 'destroy'])->name('postcomptable.destroy');

// ─────────────────────────────────────────────────────────────
// Routes Modèles de Transformation
// ─────────────────────────────────────────────────────────────
Route::get('modele-transformation/all', [ModeleTransformationController::class, 'all'])->name('modele-transformation.All');
Route::get('modele-transformation/formAjout', [ModeleTransformationController::class, 'formAjout'])->name('modele-transformation.formAjout');
Route::post('modele-transformation/create', [ModeleTransformationController::class, 'create'])->name('modele-transformation.create');
Route::get('modele-transformation/read/{id}', [ModeleTransformationController::class, 'read'])->name('modele-transformation.read');
Route::get('modele-transformation/modifier/{id}', [ModeleTransformationController::class, 'formModifier'])->name('modele-transformation.formModifier');
Route::post('modele-transformation/update/{id}', [ModeleTransformationController::class, 'update'])->name('modele-transformation.update');
Route::get('modele-transformation/delete/{id}', [ModeleTransformationController::class, 'delete'])->name('modele-transformation.delete');
Route::get('modele-transformation/destroy/{id}', [ModeleTransformationController::class, 'destroy'])->name('modele-transformation.destroy');

// ─────────────────────────────────────────────────────────────
// Routes Transformations (CRUD Resource)
// ─────────────────────────────────────────────────────────────
Route::resource('transformations', TransformationController::class);

require __DIR__.'/auth.php';

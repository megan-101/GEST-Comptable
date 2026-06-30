<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\BatimentsController;
use App\Http\Controllers\PostComptableController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\ManufacturerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

// Route::get('utilisateur/all', [Utilisateurcontroller::class, 'all'])->name('utilisateur.All');
// Route::get('utilisateur/formAjout', [Utilisateurcontroller::class, 'formAjout'])->name('utilisateur.formAjout');
// Route::post('utilisateur/Create', [Utilisateurcontroller::class, 'create'])->name('utilisateur.create');
// Route::post('utilisateur/update', [Utilisateurcontroller::class, 'update'])->name('utilisateur.update');
// Route::get('utilisateur/read/{id}', [Utilisateurcontroller::class, 'read'])->name('utilisateur.read');
// Route::post('utilisateur/delete', [Utilisateurcontroller::class, 'delete'])->name('utilisateur.delete');


// Route::get('batiment/all', [Batimentscontroller::class, 'all'])->name('batiment.All');
// Route::get('batiment/formAjout', [Batimentscontroller::class, 'formAjout'])->name('batiment.formAjout');
// Route::post('batiment/Create', [Batimentscontroller::class, 'create'])->name('batiment.create');
// Route::post('batiment/update', [Batimentscontroller::class, 'update'])->name('batiment.update');
// Route::get('batiment/read/{id}', [Batimentscontroller::class, 'read'])->name('batiment.read');
// Route::post('batiment/delete', [Batimentscontroller::class, 'delete'])->name('batiment.delete');


// ---- Routes Lieu ----
Route::get('lieu/all', [LieuController::class, 'all'])->name('lieu.All');
Route::get('lieu/formAjout', [LieuController::class, 'formAjout'])->name('lieu.formAjout');
Route::post('lieu/create', [LieuController::class, 'create'])->name('lieu.create');
Route::get('lieu/read/{id}', [LieuController::class, 'read'])->name('lieu.read');
Route::get('lieu/modifier/{id}', [LieuController::class, 'formUpdate'])->name('lieu.formUpdate');
Route::put('lieu/update/{id}', [LieuController::class, 'update'])->name('lieu.update');
Route::get('lieu/supprimer/{id}', [LieuController::class, 'confirmDelete'])->name('lieu.confirmDelete');
Route::post('lieu/delete', [LieuController::class, 'delete'])->name('lieu.delete');


Route::get('/utilisateur', [UtilisateurController::class, 'index'])->name('utilisateur.index');
Route::get('/utilisateur/create', [UtilisateurController::class, 'create'])->name('utilisateur.create');
Route::post('/utilisateur', [UtilisateurController::class, 'store'])->name('utilisateur.store');
Route::get('/utilisateur/{utilisateur}/edit', [UtilisateurController::class, 'edit'])->name('utilisateur.edit');
Route::put('/utilisateur/{utilisateur}', [UtilisateurController::class, 'update'])->name('utilisateur.update');
Route::delete('/utilisateur/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateur.destroy');

Route::get('/manufacturer/all', [ManufacturerController::class, 'index'])->name('manufacturer.index');
Route::get('/manufacturer/create', [ManufacturerController::class, 'create'])->name('manufacturer.create');
Route::post('/manufacturer', [ManufacturerController::class, 'store'])->name('manufacturer.store');
Route::get('/manufacturer/{manufacturer}/edit', [ManufacturerController::class, 'edit'])->name('manufacturer.edit');
Route::put('/manufacturer/{manufacturer}', [ManufacturerController::class, 'update'])->name('manufacturer.update');
Route::delete('/manufacturer/{manufacturer}', [ManufacturerController::class, 'destroy'])->name('manufacturer.destroy');

Route::get('parametre/all', [ParametreController::class, 'all'])->name('parametre.All');
Route::get('parametre/formAjout', [ParametreController::class, 'formAjout'])->name('parametre.formAjout');
Route::post('parametre/Create', [ParametreController::class, 'create'])->name('parametre.create');
Route::get('parametre/read/{id}', [ParametreController::class, 'read'])->name('parametre.read');
Route::get('parametre/formModifier/{id}', [ParametreController::class, 'formModifier'])->name('parametre.formModifier');
Route::post('parametre/update/{id}', [ParametreController::class, 'update'])->name('parametre.update');
Route::get('parametre/delete/{id}', [ParametreController::class, 'delete'])->name('parametre.delete');
Route::get('parametre/destroy/{id}', [ParametreController::class, 'destroy'])->name('parametre.destroy');




Route::get('postcomptable/all', [PostComptableController::class, 'all'])->name('postcomptable.All');
Route::get('postcomptable/formAjout', [PostComptableController::class, 'formAjout'])->name('postcomptable.formAjout');
Route::post('postcomptable/Create', [PostComptableController::class, 'create'])->name('postcomptable.create');
Route::get('postcomptable/read/{id}', [PostComptableController::class, 'read'])->name('postcomptable.read');
Route::get('postcomptable/formModifier/{id}', [PostComptableController::class, 'formModifier'])->name('postcomptable.formModifier');
Route::post('postcomptable/update/{id}', [PostComptableController::class, 'update'])->name('postcomptable.update');
Route::get('postcomptable/delete/{id}', [PostComptableController::class, 'delete'])->name('postcomptable.delete');
Route::get('postcomptable/destroy/{id}', [PostComptableController::class, 'destroy'])->name('postcomptable.destroy');


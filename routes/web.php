<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\BatimentsController;
use App\Http\Controllers\PostComptableController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\ModeleTransformationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('utilisateur/all', [Utilisateurcontroller::class, 'all'])->name('utilisateur.All');
Route::get('utilisateur/formAjout', [Utilisateurcontroller::class, 'formAjout'])->name('utilisateur.formAjout');
Route::post('utilisateur/Create', [Utilisateurcontroller::class, 'create'])->name('utilisateur.create');
Route::post('utilisateur/update', [Utilisateurcontroller::class, 'update'])->name('utilisateur.update');
Route::get('utilisateur/read/{id}', [Utilisateurcontroller::class, 'read'])->name('utilisateur.read');
Route::post('utilisateur/delete', [Utilisateurcontroller::class, 'delete'])->name('utilisateur.delete');

Route::get('batiment/all', [Batimentscontroller::class, 'all'])->name('batiment.All'); Route::get('batiment/formAjout', [Batimentscontroller::class, 'formAjout'])->name('batiment.formAjout'); Route::post('batiment/Create', [Batimentscontroller::class, 'create'])->name('batiment.create'); Route::post('batiment/update', [Batimentscontroller::class, 'update'])->name('batiment.update'); Route::get('batiment/read/{id}', [Batimentscontroller::class, 'read'])->name('batiment.read'); Route::post('batiment/delete', [Batimentscontroller::class, 'delete'])->name('batiment.delete');


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
Route::get('parametre/all', [ParametreController::class, 'all'])->name('parametre.All');
Route::get('parametre/formAjout', [ParametreController::class, 'formAjout'])->name('parametre.formAjout');
Route::post('parametre/Create', [ParametreController::class, 'create'])->name('parametre.create');
Route::get('parametre/read/{id}', [ParametreController::class, 'read'])->name('parametre.read');
Route::get('parametre/formModifier/{id}', [ParametreController::class, 'formModifier'])->name('parametre.formModifier');
Route::post('parametre/update/{id}', [ParametreController::class, 'update'])->name('parametre.update');
Route::get('parametre/delete/{id}', [ParametreController::class, 'delete'])->name('parametre.delete');
Route::get('parametre/destroy/{id}', [ParametreController::class, 'destroy'])->name('parametre.destroy');




Route::get('PostComptable/all', [PostComptablecontroller::class, 'all'])->name('PostComptable.All');
Route::get('PostComptable/formAjout', [PostComptablecontroller::class, 'formAjout'])->name('PostComptable.formAjout');
Route::post('PostComptable/Create', [PostComptablecontroller::class, 'create'])->name('PostComptable.create');
Route::post('PostComptable/update', [PostComptablecontroller::class, 'update'])->name('PostComptable.update');
Route::get('PostComptable/read/{id}', [PostComptablecontroller::class, 'read'])->name('PostComptable.read');
Route::post('PostComptable/delete', [PostComptablecontroller::class, 'delete'])->name('PostComptable.delete');

// ---- Routes Modèles de Transformation ----
Route::get('modele-transformation/all', [ModeleTransformationController::class, 'all'])->name('modele-transformation.All');
Route::get('modele-transformation/formAjout', [ModeleTransformationController::class, 'formAjout'])->name('modele-transformation.formAjout');
Route::post('modele-transformation/create', [ModeleTransformationController::class, 'create'])->name('modele-transformation.create');
Route::get('modele-transformation/read/{id}', [ModeleTransformationController::class, 'read'])->name('modele-transformation.read');
Route::get('modele-transformation/modifier/{id}', [ModeleTransformationController::class, 'formModifier'])->name('modele-transformation.formModifier');
Route::post('modele-transformation/update/{id}', [ModeleTransformationController::class, 'update'])->name('modele-transformation.update');
Route::get('modele-transformation/delete/{id}', [ModeleTransformationController::class, 'delete'])->name('modele-transformation.delete');
Route::get('modele-transformation/destroy/{id}', [ModeleTransformationController::class, 'destroy'])->name('modele-transformation.destroy');


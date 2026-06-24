<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\BatimentsController;
use App\Http\Controllers\ParametreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('utilisateur/all', [Utilisateurcontroller::class, 'all'])->name('utilisateur.All');
Route::get('utilisateur/formAjout', [Utilisateurcontroller::class, 'formAjout'])->name('utilisateur.formAjout');
Route::post('utilisateur/Create', [Utilisateurcontroller::class, 'create'])->name('utilisateur.create');
Route::post('utilisateur/update', [Utilisateurcontroller::class, 'update'])->name('utilisateur.update');
Route::get('utilisateur/read/{id}', [Utilisateurcontroller::class, 'read'])->name('utilisateur.read');
Route::post('utilisateur/delete', [Utilisateurcontroller::class, 'delete'])->name('utilisateur.delete');


Route::get('batiment/all', [Batimentscontroller::class, 'all'])->name('batiment.All');
Route::get('batiment/formAjout', [Batimentscontroller::class, 'formAjout'])->name('batiment.formAjout');
Route::post('batiment/Create', [Batimentscontroller::class, 'create'])->name('batiment.create');
Route::post('batiment/update', [Batimentscontroller::class, 'update'])->name('batiment.update');
Route::get('batiment/read/{id}', [Batimentscontroller::class, 'read'])->name('batiment.read');
Route::post('batiment/delete', [Batimentscontroller::class, 'delete'])->name('batiment.delete');


Route::get('parametre/all', [ParametreController::class, 'all'])->name('parametre.All');
Route::get('parametre/formAjout', [ParametreController::class, 'formAjout'])->name('parametre.formAjout');
Route::post('parametre/Create', [ParametreController::class, 'create'])->name('parametre.create');
Route::get('parametre/read/{id}', [ParametreController::class, 'read'])->name('parametre.read');
Route::get('parametre/formModifier/{id}', [ParametreController::class, 'formModifier'])->name('parametre.formModifier');
Route::post('parametre/update/{id}', [ParametreController::class, 'update'])->name('parametre.update');
Route::get('parametre/delete/{id}', [ParametreController::class, 'delete'])->name('parametre.delete');
Route::get('parametre/destroy/{id}', [ParametreController::class, 'destroy'])->name('parametre.destroy');





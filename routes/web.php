<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\BatimentsController;
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


Route::get('Ordinateur/all', [Ordinateurcontroller::class, 'all'])->name('ordinateur.All');
Route::get('Ordinateur/formAjout', [Ordinateurcontroller::class, 'formAjout'])->name('ordinateur.formAjout');
Route::post('Ordinateur/Create', [Ordinateurcontroller::class, 'create'])->name('ordinateur.create');
Route::post('Ordinateur/update', [Ordinateurcontroller::class, 'update'])->name('ordinateur.update');
Route::get('Ordinateur/read/{id}', [Ordinateurcontroller::class, 'read'])->name('ordinateur.read');
Route::post('Ordinateur/delete', [Ordinateurcontroller::class, 'delete'])->name('ordinateur.delete');

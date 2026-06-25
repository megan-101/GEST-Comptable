<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\BatimentsController;
use App\Http\Controllers\PostComptableController;
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


Route::get('PostComptable/all', [PostComptablecontroller::class, 'all'])->name('PostComptable.All');
Route::get('PostComptable/formAjout', [PostComptablecontroller::class, 'formAjout'])->name('PostComptable.formAjout');
Route::post('PostComptable/Create', [PostComptablecontroller::class, 'create'])->name('PostComptable.create');
Route::post('PostComptable/update', [PostComptablecontroller::class, 'update'])->name('PostComptable.update');
Route::get('PostComptable/read/{id}', [PostComptablecontroller::class, 'read'])->name('PostComptable.read');
Route::post('PostComptable/delete', [PostComptablecontroller::class, 'delete'])->name('PostComptable.delete');

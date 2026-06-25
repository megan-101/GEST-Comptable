<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;

Route::get('/', function () {
    return view('app');
});

Route::get('/utilisateur', [UtilisateurController::class, 'index'])->name('utilisateur.index');
Route::get('/utilisateur/create', [UtilisateurController::class, 'create'])->name('utilisateur.create');
Route::post('/utilisateur', [UtilisateurController::class, 'store'])->name('utilisateur.store');
Route::get('/utilisateur/{utilisateur}/edit', [UtilisateurController::class, 'edit'])->name('utilisateur.edit');
Route::put('/utilisateur/{utilisateur}', [UtilisateurController::class, 'update'])->name('utilisateur.update');
Route::delete('/utilisateur/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateur.destroy');
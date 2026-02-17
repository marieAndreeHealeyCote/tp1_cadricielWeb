<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

// Page d'accueil : liste des étudiants
Route::get('/', [EtudiantController::class, 'index']);

// Routes CRUD pour les étudiants
Route::resource('etudiants', EtudiantController::class);

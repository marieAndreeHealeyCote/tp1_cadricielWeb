<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('etudiants.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('etudiants', EtudiantController::class);
    Route::resource('posts', PostController::class);
    Route::resource('documents', DocumentController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['fr', 'en'])) {
        abort(400);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('lang.switch');

require __DIR__ . '/auth.php';

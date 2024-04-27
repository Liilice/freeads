<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'showIndex'] );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/postAnnonce', [AnnonceController::class, 'postAnnonce'] );
Route::post('/postAnnonce', [AnnonceController::class, 'create'] );

Route::get('/showAnnonce', [AnnonceController::class, 'annoncePage'] )->name('showAnnonce');

Route::get('/editAnnonce/{id}', [AnnonceController::class, 'editAnnonce'] )->name('article.edit');
Route::post('/editAnnonce/{id}', [AnnonceController::class, 'editAnnonceForm'] );

Route::get('/deleteAnnonce/{id}', [AnnonceController::class, 'deleteAnnonce'] )->name('article.delete');

Route::get('/searchAnnonce', [AnnonceController::class, 'searchAnnonce'] );
Route::post('/searchAnnonce', [AnnonceController::class, 'searchAnnonceResult'] );

Route::get('/filtrageAnnonce', [AnnonceController::class, 'filtrageAnnonce'] );
Route::post('/filtrageAnnonce', [AnnonceController::class, 'filtrageAnnonceResult'] );


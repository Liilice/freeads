<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'showIndex'] );
// function () {return view('welcome');}

// Route::get('/register', [UtilisateurController::class, 'create']);
// Route::post('/register', [UtilisateurController::class, 'store']);
// Route::get('/login', [UtilisateurController::class, 'login']);

// Auth::routes(['verify'=>true]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

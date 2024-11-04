<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Get all, return index view
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');


    // Get create form, return create form
    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

    // Get single car, return cars.show view
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');    

    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');    


    // Form method, run when create form is submitted
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');    
        
});


require __DIR__.'/auth.php';

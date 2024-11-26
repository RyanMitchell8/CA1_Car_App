<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GarageController;
use Illuminate\Support\Facades\Route;


// Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard page, accessible only to authenticated and verified users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group routes that require user authentication
Route::middleware('auth')->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Show profile edit form
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile information
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete profile

    // Car routes

    // Show a list of all cars (index view)
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

    // Show the form to create a new car
    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

    // Show details for a single car
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

    // Show the form to edit an existing car
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');    

    // Handle the form submission for updating an existing car
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');    

    // Handle the form submission to store a new car
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
    
    // Handle the request to delete a specific car
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');


    Route::resource('reviews', ReviewController::class);

    Route::post('cars/{car}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::resource('garages', GarageController::class)->middleware('auth');

    Route::get('/garages', [GarageController::class, 'index'])->name('garages.index');
    Route::get('/garages/create', [GarageController::class, 'create'])->name('garages.create');
    Route::get('/garages/{garage}', [GarageController::class, 'show'])->name('garages.show');
    Route::post('/garages', [GarageController::class, 'store'])->name('garages.store');
    Route::get('/garages/{garage}/edit', [GarageController::class, 'edit'])->name('garages.edit');
    Route::delete('/garages/{garage}', [GarageController::class, 'destroy'])->name('garages.destroy');
});
    
// Include authentication routes from auth.php
require __DIR__.'/auth.php';

<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/customers', CustomerController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('/cars', CarController::class)
    ->only(['index', 'store', 'edit', 'update', 'create', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('/rent', RentController::class)
    ->only(['index', 'store', 'edit', 'update', 'create', 'destroy'])
    ->middleware(['auth', 'verified']);

    Route::get('/rent/list', [RentController::class, 'rentList'])
    ->name('rent.list')
    ->middleware(['auth', 'verified']);

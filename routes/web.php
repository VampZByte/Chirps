<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\PaymentController;
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

Route::get('/dashboard', [CustomerController::class, 'showAdmin'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/customers', CustomerController::class)
    ->only(['index', 'store', 'edit', 'create', 'update', 'destroy'])
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

Route::resource('/payments', PaymentController::class)
    ->only(['index', 'store', 'edit', 'update', 'create', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');

Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');

Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');

Route::post('/cars/{id}/return/{status}', [CarController::class, 'returnAction'])->name('cars.returnAction');

Route::delete('/rent/{rent}', [RentController::class, 'destroy'])->name('rent.destroy');

Route::get('/rent/contract/{id}', [RentController::class, 'showContract'])->name('rent.contract');

Route::get('/dashboard', [CustomerController::class, 'showDashboard'])->name('dashboard');

Route::put('/rent/{id}/archive', [RentController::class, 'archive'])->name('rent.archive');
Route::get('/rent/archived', [RentController::class, 'archivedList'])->name('rent.archived');

Route::put('/cars/{id}/archive', [CarController::class, 'archive'])->name('cars.archive');
Route::get('/cars/archived', [CarController::class, 'archivedList'])->name('cars.archived');

Route::put('/customers/{id}/archive', [CustomerController::class, 'archive'])->name('customers.archive');
Route::get('/customers/archived', [CustomerController::class, 'archivedList'])->name('customers.archived');

Route::put('/payments/{id}/archive', [PaymentController::class, 'archive'])->name('payments.archive');
Route::get('/payments/archived', [PaymentController::class, 'archivedList'])->name('payments.archived');





<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'create']);
    Route::post('/register', [RegisterUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy']);

Route::view('/dashboard', 'dashboard')->middleware('auth');

Route::controller(ClientController::class)->middleware('auth')->group(function () {
    Route::get('/clients', 'index');
    Route::get('/clients/create', 'create');
    Route::post('/clients', 'store');
    Route::get('/clients/{client}', 'show');
    Route::get('/clients/{client}/edit', 'edit');
    Route::put('/clients/{client}', 'update');
});

Route::controller(JobController::class)->middleware('auth')->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/archive', 'archive');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}', 'show');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::put('/jobs/{job}', 'update');
});

Route::controller(InvoiceController::class)->middleware('auth')->group(function () {
    Route::get('/invoices', 'index');
    Route::get('/invoices/archive', 'archive');
    Route::get('/invoices/create', 'create');
    Route::post('/invoices', 'store');
    Route::get('/invoices/{invoice}', 'show');
    Route::get('/invoices/{invoice}/edit', 'edit');
    Route::put('/invoices/{invoice}', 'update');
});

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/profile', 'show');
    Route::put('/profile', 'update');
});

Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/users', 'index')->can('viewAny', User::class);
    Route::get('/users/create', 'create')->can('create', User::class);
    Route::post('/users', 'store')->can('create', User::class);
    Route::get('/users/{user}', 'show')->can('view', 'user');
    Route::get('/users/{user}/edit', 'edit')->can('update', 'user');
    Route::put('/users/{user}', 'update')->can('update', 'user');
});

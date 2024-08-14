<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Client;
use App\Models\Job;
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
    Route::get('/clients', 'index')->can('viewAny', Client::class);
    Route::get('/clients/create', 'create')->can('create', Client::class);
    Route::post('/clients', 'store')->can('create', Client::class);
    Route::get('/clients/{client}', 'show')->can('view', 'client');
    Route::get('/clients/{client}/edit', 'edit')->can('update', 'client');
    Route::put('/clients/{client}', 'update')->can('update', 'client');
});

Route::controller(JobController::class)->middleware('auth')->group(function () {
    Route::get('/jobs', 'index')->can('viewAny', Job::class);
    Route::get('/jobs/archive', 'archive')->can('viewAny', Job::class);
    Route::get('/jobs/create', 'create')->can('create', Job::class);
    Route::post('/jobs', 'store')->can('create', Job::class);
    Route::get('/jobs/{job}', 'show')->can('view', 'job');
    Route::get('/jobs/{job}/edit', 'edit')->can('update', 'job');
    Route::put('/jobs/{job}', 'update')->can('update', 'job');
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

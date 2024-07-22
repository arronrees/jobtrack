<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
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

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard');
});

Route::controller(ClientController::class)->middleware('auth')->group(function () {
    Route::get('/clients', 'index');
    Route::get('/clients/{client}', 'show');
});

Route::controller(JobController::class)->middleware('auth')->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/{job}', 'show');
});

Route::controller(InvoiceController::class)->middleware('auth')->group(function () {
    Route::get('/invoices', 'index');
    Route::get('/invoices/{invoice}', 'show');
});

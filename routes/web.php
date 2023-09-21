<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RoleController;

Route::get('/', function () {
    // return login page 
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.sudashboard');
    })->name('dashboard');
    Route::resource('admin', AdminController::class);
    Route::resource('role', RoleController::class);
});
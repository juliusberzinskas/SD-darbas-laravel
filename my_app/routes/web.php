<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ConferencesController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Client subsystem
Route::prefix('client')->name('client.')->group(function () {
    Route::get('/conferences', [ClientController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/{id}', [ClientController::class, 'show'])->name('conferences.show');

    Route::post('/conferences/{id}/register', [ClientController::class, 'register'])
        ->name('conferences.register');
});

// Employee subsystem
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/conferences', [EmployeeController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/{id}', [EmployeeController::class, 'show'])->name('conferences.show');
});

// Admin subsystem
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');

    Route::get('/conferences', [ConferencesController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/create', [ConferencesController::class, 'create'])->name('conferences.create');
    Route::post('/conferences', [ConferencesController::class, 'store'])->name('conferences.store');
    Route::get('/conferences/{id}', [ConferencesController::class, 'show'])->name('conferences.show');
    Route::get('/conferences/{id}/edit', [ConferencesController::class, 'edit'])->name('conferences.edit');
    Route::put('/conferences/{id}', [ConferencesController::class, 'update'])->name('conferences.update');
    Route::delete('/conferences/{id}', [ConferencesController::class, 'destroy'])->name('conferences.destroy');
});

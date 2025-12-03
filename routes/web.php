<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    // Admin Routes
    Route::middleware(['role:admin,staff'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->except(['index']);
    });

    // Services accessible to clients (read-only)
    Route::middleware(['role:admin,staff,client'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('services', [\App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.index');
    });
});

require __DIR__ . '/auth.php';

Route::get('/test-alert', function () {
    return redirect()->route('dashboard')->with('success', 'SweetAlert está funcionando correctamente!');
});

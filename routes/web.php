<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProfileController};

Route::get('/', function () {
    return view('welcomeOLD');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('media', \App\Http\Controllers\MediaController::class);
    Route::resource('media', \App\Http\Controllers\MediaController::class);
    // Route::resource('settings', \App\Http\Controllers\SettingController::class);
    Route::get('/settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('activity_log', \App\Http\Controllers\ActivityLogController::class)->only(['index']);
});

require __DIR__ . '/auth.php';

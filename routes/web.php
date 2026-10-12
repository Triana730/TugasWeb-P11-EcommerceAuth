<?php

use App\Http\Controllers\PostController;
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
});

// Hanya admin
Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'role:admin'])->name('admin.index');

// Admin dan editor
Route::get('/editor', function () {
    return view('editor');
})->middleware(['auth', 'role:admin,editor'])->name('editor.index');

require __DIR__.'/auth.php';
Route::resource('posts', PostController::class)
    ->except(['show'])
    ->middleware('auth');
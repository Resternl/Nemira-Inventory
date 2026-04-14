<?php

use App\Http\Controllers\inven;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [inven::class, 'index'])->name('inventory.index');
    Route::resource('inventory', inven::class);
});

Route::get('/', function () {
    return auth()->check() ? redirect('/inventory') : redirect('/login');
});

require __DIR__.'/auth.php';

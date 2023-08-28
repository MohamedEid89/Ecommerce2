<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/dashboard/categories', CategoriesController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Models\Product;

Route::group(
    [
        'middleware' => ['auth'],
        'as' => 'dashboard.',
        'prefix' => 'dashboard',
    ],


    function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('index');
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::get('/products/edit', [ProductController::class, 'edit'])
            ->name('products.edit');

        Route::put('/products/edit', [ProductController::class, 'update'])
            ->name('products.update');

        Route::get('/categories/trash', [CategoriesController::class, 'trash'])
            ->name('categories.trash');
        Route::put('/categories/{Category}/restore', [CategoriesController::class, 'restore'])
            ->name('categories.restore');
        Route::put('/categories/{Category}/force-delete', [CategoriesController::class, 'forceDelete'])
            ->name('categories.force-delete');

        Route::resource('/categories', CategoriesController::class);
        Route::resource('/products', ProductController::class);
    }
);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('products.index');

//Products
Route::get('products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('category/{category}',[ProductController::class, 'category'])->name('product.category');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

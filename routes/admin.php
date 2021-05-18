<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProductController;


Route::get('', [HomeController::class, 'index'])->name('admin.home');
//Categories
Route::resource('categories', CategoryController::class)->names('admin.categories'); //En resource la url tiene que ir en plurar 
//Tags
Route::resource('tags', TagController::class)->names('admin.tags');
//Products
Route::resource('products', ProductController::class)->names('admin.products');
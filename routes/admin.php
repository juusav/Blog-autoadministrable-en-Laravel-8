<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

// User control
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

//Categories
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories'); //En resource la url tiene que ir en plurar. Except me permite bloquear la ruta a esa funcion
//Tags
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');
//Products
Route::resource('products', ProductController::class)->except('show')->names('admin.products');
<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('categories', CategoryController::class)->names('admin.categories'); //En resource la url tiene que ir en plurar 
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Admin
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
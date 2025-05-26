<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Admin
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/store', [TicketController::class, 'store'])->name('ticket.store');

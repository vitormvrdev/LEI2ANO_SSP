<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PriorityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin', [TicketController::class, 'list'])->name('admin.list');

// Admin
Route::resource('admin/categories', CategoryController::class)->names('categories');
Route::resource('admin/priorities', PriorityController::class)->names('admin.priorities');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tickets', TicketController::class)->names('tickets');


Route::post('/store', [TicketController::class, 'store'])->name('ticket.store');

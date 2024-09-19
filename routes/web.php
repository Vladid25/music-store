<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckName;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);
Route::get('/lab1', [LabController::class, 'index']);
Route::get('/contact', [LabController::class, 'contact']);
Route::get('/about', [LabController::class, 'about'])->middleware(CheckAge::class);
Route::get('/hobbies', [LabController::class, 'hobbies'])->middleware(CheckName::class);

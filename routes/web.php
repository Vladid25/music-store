<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products/{id}', [HomeController::class, 'details'])->name('products.details');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('/add', [CartController::class, 'add'])->name('cart.add');
        Route::post('/update/{productId}', [CartController::class, 'update'])->name('cart.update');
        Route::post('/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
    });
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

       Route::prefix('chat')->group(function () {
        Route::get('/{toUserId}', [ChatController::class, 'showChat'])->name('chat.show');
        Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('chat.send');
        Route::get('/fetch-messages/{userId}', [ChatController::class, 'fetchMessages'])->name('chat.fetch');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
        Route::resource('products', AdminController::class)->names('admin.products');
        Route::resource('categories', CategoryController::class)->names('admin.categories');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';

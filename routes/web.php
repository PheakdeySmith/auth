<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// GET /products
Route::get('products', [ProductController::class, 'index'])->name('products.index');

// GET /products/create
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');

// POST /products
Route::post('products', [ProductController::class, 'store'])->name('products.store');

// GET /products/{product}
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');

// GET /products/{product}/edit
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// POST /products/{product}
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');

// DELETE /products/{product}
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/home_page', [FrontendController::class,'home'])->name('frontend.index');
Route::get('/new_arrival', [FrontendController::class,'new_arrival'])->name('frontend.new_arrival');
Route::get('/filter-products', [ProductController::class, 'filterProducts'])->name('frontend.filter_products');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('frontend.cart');
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::patch('/cart/update/{cartItem}', [CartController::class, 'updateCartItem'])->name('cart.update');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


<?php

use Illuminate\Support\Facades\Route;

// ── Halaman Publik ─────────────────────────────────────────────────────────────
Route::get('/', fn() => view('welcome'));
Route::get('/products', fn() => view('products'));
Route::get('/products/{id}', fn($id) => view('product-detail', ['id' => $id]))->where('id', '[0-9]+');

// ── Auth ───────────────────────────────────────────────────────────────────────
Route::get('/login', fn() => view('login'));
Route::get('/register', fn() => view('register'));

// ── Customer ───────────────────────────────────────────────────────────────────
Route::get('/cart', fn() => view('cart'));
Route::get('/orders', fn() => view('orders'));
Route::get('/orders/{id}', fn($id) => view('order-detail', ['id' => $id]))->where('id', '[0-9]+');

// ── Admin ──────────────────────────────────────────────────────────────────────
Route::prefix('admin')->group(function () {
    Route::get('/', fn() => view('admin.dashboard'));
    Route::get('/orders', fn() => view('admin.orders'));
    Route::get('/orders/{id}', fn($id) => view('admin.order-detail', ['id' => $id]))->where('id', '[0-9]+');
    Route::get('/products', fn() => view('admin.products'));
    Route::get('/categories', fn() => view('admin.categories'));
    Route::get('/vouchers', fn() => view('admin.vouchers'));
});

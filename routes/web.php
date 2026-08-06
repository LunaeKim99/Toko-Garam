<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/produk', [PageController::class, 'products'])->name('products');
Route::get('/produk/{slug}', [PageController::class, 'productDetail'])->name('product-detail');
Route::get('/artikel', [PageController::class, 'articles'])->name('articles');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/produk', [PageController::class, 'product'])->name('product');
Route::get('/galeri', [PageController::class, 'gallery'])->name('gallery');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
    Route::get('/profil/edit', [CompanyProfileController::class, 'edit'])->name('company-profile.edit');
    Route::put('/profil', [CompanyProfileController::class, 'update'])->name('company-profile.update');
    Route::get('/produk/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/produk', [ProductController::class, 'update'])->name('product.update');
    Route::resource('/galeri', GalleryController::class)->except('show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

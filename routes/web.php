<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Farmer\DashboardController;
use App\Http\Controllers\Farmer\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

// Farmer Dashboard
// Route::middleware(['auth'])->prefix('farmer')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('farmer.dashboard');
// });
Route::get('/farmer/dashboard', action: [DashboardController::class, 'index'])->name('farmer.dashboard');
Route::get('/farmer/products', action: [ProductController::class, 'index'])->name('farmer.products.index');
Route::get('/farmer/products/{product}', action: [ProductController::class, 'show'])->name('farmer.products.show');


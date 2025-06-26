<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Farmer\DashboardController;
use App\Http\Controllers\Farmer\InputController;
use App\Http\Controllers\Farmer\ProductController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

// Farmer Dashboard
Route::middleware(['auth'])->prefix('farmer')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('farmer.dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('farmer.profile.index');
    Route::put('/profile/update', [DashboardController::class, 'profileUpdate'])->name('farmer.profile.update');

    // products
    Route::get('/products', action: [ProductController::class, 'index'])->name('farmer.products.index');
    Route::get('/products/{product}', action: [ProductController::class, 'show'])->name('farmer.products.show');
    Route::get('/create-products', action: [ProductController::class, 'create'])->name('farmer.products.create');
    Route::post('/store-products', action: [ProductController::class, 'store'])->name('farmer.products.store');
    Route::get('/edit-products/{product}', action: [ProductController::class, 'edit'])->name('farmer.products.edit');
    Route::put('/update-products/{product}', action: [ProductController::class, 'update'])->name('farmer.products.update');
    Route::delete('/delete-products/{product}', action: [ProductController::class, 'destroy'])->name('farmer.products.destroy');
    Route::post('/refill-products/{product}', action: [ProductController::class, 'refill'])->name('farmer.products.refill');

    // inputs
    Route::get('/inputs', action: [InputController::class, 'index'])->name('farmer.inputs.index');
    Route::get('/inputs/{input}', action: [InputController::class, 'show'])->name('farmer.inputs.show');

    //orders
    Route::post('/place-order', action: [InputController::class, 'placeOrder'])->name('farmer.inputs.place_order');
    Route::get('/get-orders', action: [InputController::class, 'getOrders'])->name('farmer.inputs.get_orders');
    Route::get('/get-orders-history/{supplier}/{input}', action: [InputController::class, 'getOrdersHistory'])->name('farmer.inputs.get_orders_history');

});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopManagementController;

Route::get('/', [ShopController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/shop', [ShopManagementController::class, 'index'])->name('shop.index');
    Route::get('/shop/create', [ShopManagementController::class, 'create'])->name('shop.create');
    Route::post('/shop/store', [ShopManagementController::class, 'store'])->name('shop.store');
});

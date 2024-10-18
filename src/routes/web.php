<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopManagementController;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/detail/{shop}', [ShopController::class, 'detail'])->name('shop.detail');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
Route::post('/', [ShopController::class, 'favorite'])->name('shop.fav');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/shop', [ShopManagementController::class, 'index'])->name('admin.shop.index');
    Route::get('/shop/create', [ShopManagementController::class, 'create'])->name('admin.shop.create');
    Route::post('/shop/store', [ShopManagementController::class, 'store'])->name('admin.shop.store');
});

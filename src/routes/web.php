<?php

use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopManagementController;
use App\Http\Controllers\UserController;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/detail/{shop}', [ShopController::class, 'detail'])->name('shop.detail');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');

Route::middleware('auth')->group(function () {
    Route::get('/mypage', [UserController::class, 'index'])->name('user.mypage');
    Route::post('/favorite', [UserController::class, 'favorite'])->name('shop.fav');
    Route::post('/detail/{shop}', [UserController::class, 'reserve'])->name('shop.reserve');
});

// 管理者用ルーティング
Route::get('/admin-login', [AdminLoginController::class, 'create'])->name('admin.login');
Route::post('/admin-login', [AdminLoginController::class, 'store'])->name('admin.login.store');
Route::delete('/admin-login', [AdminLoginController::class, 'destroy'])->name('admin.login.destroy');

Route::middleware('auth:admin')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/shop', [ShopManagementController::class, 'index'])->name('admin.shop.index');
        Route::get('/shop/create', [ShopManagementController::class, 'create'])->name('admin.shop.create');
        Route::post('/shop/store', [ShopManagementController::class, 'store'])->name('admin.shop.store');
        Route::get('/', function () {
            return view('admin.top');
        })->name('admin.top');
    });
});

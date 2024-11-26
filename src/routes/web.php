<?php

use App\Http\Controllers\AdminLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopManagementController;
use App\Http\Controllers\StaffManagementController;
use App\Http\Controllers\UserController;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/detail/{shop}', [ShopController::class, 'detail'])->name('shop.detail');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mypage', [UserController::class, 'index'])->name('user.mypage');
    Route::patch('/mypage', [UserController::class, 'updateReserve'])->name('shop.reserve.update');
    Route::delete('/mypage', [UserController::class, 'cancelReserve'])->name('shop.reserve.cancel');
    Route::post('/favorite', [UserController::class, 'favorite'])->name('shop.fav');
    Route::post('/detail/{shop}', [UserController::class, 'reserve'])->name('shop.reserve');
});

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/shop', [ShopManagementController::class, 'index'])->name('admin.shop.index');
        Route::get('/shop/search', [ShopManagementController::class, 'search'])->name('admin.shop.search');
        Route::get('/shop/create', [ShopManagementController::class, 'create'])->name('admin.shop.create');
        Route::post('/shop/store', [ShopManagementController::class, 'store'])->name('admin.shop.store');
        Route::get('/shop/edit/{shop}', [ShopManagementController::class, 'edit'])->name('admin.shop.edit');
        Route::patch('/shop/update', [ShopManagementController::class, 'update'])->name('admin.shop.update');
        Route::delete('/shop/delete', [ShopManagementController::class, 'destroy'])->name('admin.shop.destroy');
        Route::get('/shop/reservations/{shop}', [ShopManagementController::class, 'reservations'])->name('admin.shop.reservations');
    });
});

Route::middleware(['auth', 'can:super-admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/staff', [StaffManagementController::class, 'index'])->name('admin.staff.index');
        Route::get('/staff/registration', [StaffManagementController::class, 'create'])->name('admin.staff.registration');
        Route::post('/staff/registration', [StaffManagementController::class, 'store'])->name('admin.staff.registred');
        Route::get('/users', [MailController::class, 'viewAllUsers'])->name('admin.get.users');
        Route::get('/users/email/form', [MailController::class, 'emailForm'])->name('admin.email.form');
        Route::post('/users/email/confirm', [MailController::class, 'confirmNewsEmail'])->name('admin.email.confirm');
        Route::post('/users/email/send', [MailController::class, 'sendNewsEmail'])->name('admin.email.send');
    });
});

//メール認証
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

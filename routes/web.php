<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Admin Route Group Prefix
Route::prefix('admin')->group(function () {
    //* Show Admin Login Form
    Route::get('login', [AdminController::class, 'create'])->name('admin.login');
    //* Admin Login Action
    Route::post('login', [AdminController::class, 'store'])->name('admin.login.request');

    //* Admin Password Reset Routes
    Route::get('password/reset', [AdminController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [AdminController::class, 'reset'])->name('admin.password.update');

    //* Admin Middleware Group Routes
    Route::middleware('admin')->group(function () {
        //* Admin Dashboard Route
        Route::resource('dashboard', AdminController::class)->only('index');
        //* Admin Logout Action
        Route::get('logout', [AdminController::class, 'destroy'])->name('admin.logout');
    });
});

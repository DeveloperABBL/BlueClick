<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Register
|--------------------------------------------------------------------------
*/
Route::get('/register', function () {return view('auth.register');})->name('register');

Route::post('/register-user', [RegisterController::class, 'store'])->name('registerUser');

/*
|--------------------------------------------------------------------------
| Authenticated
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // เลือกบริษัทหลัง Login
    Route::get('/select-company', [HomeController::class, 'selectcompany'])->name('select.company');

    // หน้าแรก
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // ผู้ใช้งานระบบ (อนุมัติแล้ว)
    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');

    // รายการรออนุมัติ
    Route::get('/users/pending', [UserController::class, 'pending'])
        ->name('users.pending');

    // อนุมัติผู้ใช้
    Route::post('/users/{user}/approve', [UserController::class, 'approve'])
        ->name('users.approve');

    // ปฏิเสธผู้ใช้
    Route::post('/users/{user}/reject', [UserController::class, 'reject'])
        ->name('users.reject');
});



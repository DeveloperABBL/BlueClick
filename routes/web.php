<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AdminApprovalController;
use App\Http\Controllers\SetPasswordController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserRegisterController;
/*
|--------------------------------------------------------------------------
| Public Routes (ยังไม่ล็อกอิน)
|--------------------------------------------------------------------------
*/
Route::get('/หน้าแรก', [IndexController::class, 'showIndex'])->name('index');
Route::get('/รายการลงทะเบียน', [UserRegisterController::class, 'index'])->name('user_register.index');
Route::get('/รายการลงทะเบียน/{id}', [UserRegisterController::class, 'show'])->name('user_register.show');
// Login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.post');

// Register
Route::get('/สมัครสมาชิก', [RegisterController::class, 'showForm'])->name('register');
Route::post('/สมัครสมาชิก', [RegisterController::class, 'register'])->name('signup');

// Email verification
Route::get('/verify-email/{token}', [VerificationController::class, 'verify'])
    ->name('verify.email');

// Set password (หลัง Admin อนุมัติ)
// ใช้ ?token=xxxxx
Route::get('/ตั้งรหัสผ่านใหม่', [SetPasswordController::class, 'showSetPasswordForm'])
    ->name('password.setup.form');

Route::post('/ตั้งรหัสผ่านใหม่', [SetPasswordController::class, 'setPassword'])
    ->name('password.setup.save');

// Forgot password (ยังไม่ใช้)
Route::get('/ลืมรหัสผ่าน', fn() => view('auth.forgotPassword'))->name('forgotPassword');


/*
|--------------------------------------------------------------------------
| Routes หลังล็อกอินแล้ว
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', fn() => view('app.profile.index'))->name('profile.index');
    Route::get('/profile/edit', fn() => view('app.profile.edit'))->name('profile.edit');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/approve-users', [AdminApprovalController::class, 'index'])
        ->name('admin.users.waiting');

    Route::post('/admin/approve-user/{id}', [AdminApprovalController::class, 'approve'])
        ->name('admin.users.approve');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\AdminApprovalController;
use App\Http\Controllers\Auth\LoginController;

// Login Routes - ใช้ชื่อ route เดียวกันทั้ง GET และ POST
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login'); // เปลี่ยนตรงนี้

// หรือถ้าต้องการแยกชื่อ route
// Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes
Route::get('/สมัครสมาชิก', function () {
    return view('public.register');
})->name('register');

Route::post('/สมัครสมาชิก', [RegisterController::class, 'store'])->name('register.store');
Route::get('/สมัครสมาชิก/สำเร็จ', [RegisterController::class, 'success'])->name('register.success');

Route::get('/ลืมรหัสผ่าน', function () {
    return view('auth.forgotPassword');
})->name('forgotPassword');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/empty', function () {
        return view('app.empty');
    })->name('empty');

    Route::get('/Profile', function () {
        return view('app.profile.index');
    })->name('profile.index');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/approvals', [AdminApprovalController::class, 'index'])->name('approvals.index');
    Route::get('/approvals/{id}', [AdminApprovalController::class, 'show'])->name('approvals.show');
    Route::post('/approvals/{id}/approve', [AdminApprovalController::class, 'approve'])->name('approvals.approve');
    Route::post('/approvals/{id}/reject', [AdminApprovalController::class, 'reject'])->name('approvals.reject');
});

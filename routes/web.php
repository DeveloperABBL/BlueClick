<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

Route::post('/', [AuthController::class, 'login'])->name('login.post');
Route::get('/', function () { return view('auth.login'); })->name('login');
Route::get('/สมัครสมาชิก', function () { return view('auth.register'); })->name('register');
Route::post('/สมัครสมาชิก', [AuthController::class, 'register'])->name('signup');
Route::get('/ลืมรหัสผ่าน', function () { return view('auth.forgotPassword'); })->name('forgotPassword');
Route::get('/ตั้งรหัสผ่านใหม่', function () { return view('auth.setPassword'); })->name('setPassword');



// สำหรับผู้ที่ล็อกอินแล้ว
Route::middleware('auth')->group(function () {

    Route::get('/empty', [ArticleController::class, 'index'])->name('empty');
    Route::get('/Profile', function () { return view('app.profile.index'); })->name('profile.index');
    Route::get('/Profile/edit', function () { return view('app.profile.edit'); })->name('profile.edit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // หน้าเขียนบทความ
    Route::get('/บทความ/สร้าง', [ArticleController::class, 'create'])->name('article.create');
    // บันทึกบทความ
    Route::post('/บทความ', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/บทความ', [ArticleController::class, 'index'])->name('article.index');
    // แดงบทความ
    Route::get('/บทความ/{id}', [ArticleController::class, 'show'])->name('article.show');
    // ลบบทความ
    Route::post('/บทความ/delete', [ArticleController::class, 'destroy'])->name('article.destroy');
    // หน้าแก้ไข
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    // อัปเดตบทความ
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('article.update');




    // สำหรับ admin เท่านั้น
    Route::get('/รายชื่อผู้ใช้งานระบบ/แก้ไขข้อมูล', function () { return view('app.users.edit'); })
        ->middleware('admin')
        ->name('users.edit');
});

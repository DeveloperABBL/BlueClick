<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.login');
})->name('login');

Route::get('/สมัครสมาชิก', function () {
    return view('public.register');
})->name('register');

Route::get('/ลืมรหัสผ่าน', function () {
    return view('auth.forgotPassword');
})->name('forgotPassword');

Route::get('/ตั้งรหัสผ่านใหม่', function () {
    return view('auth.setPassword');
})->name('setPassword');

Route::get('/empty', function () {
    return view('app.empty');
})->name('empty');

Route::get('/Profile', function () {
    return view('app.profile.index');
})->name('profile.index');

Route::get('/Profile/edit', function () {
    return view('app.profile.edit');
})->name('profile.edit');

Route::get('/รายชื่อผู้ใช้งานระบบ/แก้ไขข้อมูล', function () {
    return view('app.users.edit');
})->name('users.edit');

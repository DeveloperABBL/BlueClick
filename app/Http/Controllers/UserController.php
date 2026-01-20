<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // ผู้ใช้งานระบบ (บริษัทอนุมัติแล้ว)
    public function index()
    {
        $users = User::whereHas('company', function ($q) {
            $q->whereNotNull('approved_at');
        })->get();

        return view('users.index', compact('users'));
    }

}

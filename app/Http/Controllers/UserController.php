<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * ผู้ใช้งานระบบ (อนุมัติแล้ว)
     */
    public function index()
    {
        $users = User::whereNotNull('approve_datetime')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.index', compact('users'));
    }

    /**
     * รายการรออนุมัติ
     */
    public function pending()
    {
        $pendings = User::whereNull('approve_datetime')
            ->where('status', 'register')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.partials.pending', compact('pendings'));
    }
}

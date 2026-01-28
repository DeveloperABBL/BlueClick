<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;

class UserRegisterController extends Controller
{
    public function index()
    {
        $users = UserRegister::orderBy('id', 'desc')->paginate(10);
        return view('auth.users', compact('users'));
    }

    public function show($id)
    {
        $user = UserRegister::findOrFail($id);
        return view('auth.showusers', compact('user'));
    }
}

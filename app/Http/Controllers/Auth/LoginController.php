<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * แสดงหน้า Login
     */
    public function showLoginForm()
    {
        return view('public.login');
    }

    /**
     * ประมวลผล Login
     */
    public function login(Request $request)
    {
        // Validate
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'กรุณากรอก Email',
            'email.email' => 'รูปแบบ Email ไม่ถูกต้อง',
            'password.required' => 'กรุณากรอก Password',
            'password.min' => 'Password ต้องมีอย่างน้อย 6 ตัวอักษร',
        ]);

        // เช็คว่า User มีอยู่และ active หรือไม่
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user && isset($user->is_active) && !$user->is_active) {
            return back()->withErrors([
                'email' => 'บัญชีของคุณยังไม่ได้รับการอนุมัติ กรุณารอการอนุมัติจากผู้ดูแลระบบ'
            ])->withInput();
        }

        // พยายาม Login
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // ถ้าเป็น Admin
            if (Auth::user()->is_admin) {
                return redirect()->intended(route('admin.approvals.index'))
                    ->with('success', 'ยินดีต้อนรับ Admin ' . Auth::user()->full_name);
            }

            // ถ้าเป็น User ธรรมดา
            return redirect()->intended(route('empty'))
                ->with('success', 'ยินดีต้อนรับ ' . Auth::user()->full_name);
        }

        return back()->withErrors([
            'email' => 'Email หรือ Password ไม่ถูกต้อง',
        ])->withInput();
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'ออกจากระบบเรียบร้อยแล้ว');
    }
}

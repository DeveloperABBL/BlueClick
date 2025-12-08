<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRegister;
use Illuminate\Support\Facades\Hash;

class SetPasswordController extends Controller
{
    /**
     * แสดงหน้า form ตั้งรหัสผ่าน (GET)
     */
    public function showSetPasswordForm(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return redirect()->route('login')->with('error', 'Token ไม่ถูกต้อง');
        }

        $register = UserRegister::where('password_set_token', $token)->first();

        if (!$register) {
            return redirect()->route('login')->with('error', 'Token ไม่พบหรือหมดอายุแล้ว');
        }

        return view('auth.setPassword', compact('token'));
    }

    /**
     * บันทึกรหัสผ่านใหม่ (POST)
     */
    public function setPassword(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'password' => 'required|min:8|confirmed',
        ]);

        $register = UserRegister::where('password_set_token', $request->token)->first();

        if (!$register) {
            return redirect()->route('login')->with('error', 'Token ไม่ถูกต้องหรือหมดอายุ');
        }

        // ดึงข้อมูลจากตาราง user_registers มาสร้าง user จริง
        $user = User::create([
            'name' => $register->firstname . ' ' . $register->lastname,
            'email' => $register->email,
            'password' => Hash::make($request->password),
            'role' => 'employee', // หรือ default role ที่คุณใช้
            'user_register_id' => $register->id,
        ]);

        // อัปเดตสถานะในตารางสมัครสมาชิก
        $register->update([
            'is_approved' => true,
            'approved_at' => now(),
            'password_set_at' => now(),
            'password_set_token' => null, // ❗ token ใช้ครั้งเดียวแล้วลบทิ้ง
        ]);

        return redirect()->route('login')->with('success', 'ตั้งรหัสผ่านเรียบร้อย! กรุณาเข้าสู่ระบบ');
    }
}

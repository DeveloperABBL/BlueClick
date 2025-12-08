<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\UserRegister;

class RegisterController extends Controller
{
    // แสดงหน้า form สมัคร
    public function showForm()
    {
        return view('public.register');
    }

    // บันทึกข้อมูลสมัครสมาชิก + ส่งอีเมลยืนยัน
    public function register(Request $request)
    {
        // 1) Validate ข้อมูลเบื้องต้น
        $request->validate([
            'prefix' => 'required',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'tax_id' => 'required|max:20',
            'birthday' => 'required|date',
            'phone' => 'required|max:20',
            'email' => 'required|email|max:100|unique:user_registers,email',
            'address' => 'required',
            'district' => 'required',
            'type' => 'required',
            'bank' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
        ]);

        // 2) Generate verification token
        $token = Str::random(40);

        // 3) บันทึกข้อมูลลง table user_registers
        $register = UserRegister::create([
            'prefix' => $request->prefix,
            'other_prefix' => $request->other_prefix,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'tax_id' => $request->tax_id,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'district' => $request->district,
            'type' => $request->type,
            'bank' => $request->bank,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,

            'verification_token' => $token,
            'is_verified' => false,
        ]);

        // 4) ส่งอีเมลยืนยัน
        $verifyUrl = url('/verify-email/' . $token);

        Mail::raw(
            "สวัสดีค่ะ/ครับ กรุณากดลิงก์เพื่อยืนยันอีเมลของคุณ: " . $verifyUrl,
            function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('ยืนยันอีเมลการสมัครใช้งานระบบ');
            }
        );

        return back()->with('success', 'สมัครสมาชิกสำเร็จ! กรุณาตรวจสอบอีเมลเพื่อยืนยันบัญชีของคุณ');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;

class VerificationController extends Controller
{
    // ฟังก์ชันยืนยันอีเมลจากลิงก์
    public function verify(Request $request)
    {
        $token = $request->token;

        if (!$token) {
            return view('public.verify_failed', [
                'message' => 'ไม่พบ Token สำหรับยืนยันอีเมล'
            ]);
        }

        // ค้นหาผู้ใช้จาก token
        $user = UserRegister::where('verification_token', $token)->first();

        if (!$user) {
            return view('public.verify_failed', [
                'message' => 'Token ไม่ถูกต้อง หรือหมดอายุแล้ว'
            ]);
        }

        // ถ้ายืนยันไปแล้ว
        if ($user->is_verified) {
            return view('public.verify_success', [
                'message' => 'อีเมลนี้ได้รับการยืนยันไปแล้วก่อนหน้านี้'
            ]);
        }

        // อัปเดตสถานะเป็นยืนยันแล้ว
        $user->is_verified = true;
        $user->verification_token = null; // เคลียร์ token ป้องกันใช้ซ้ำ
        $user->save();

        return view('public.verify_success', [
            'message' => 'ยืนยันอีเมลสำเร็จ! กรุณารอผู้ดูแลระบบอนุมัติบัญชี'
        ]);
    }
}

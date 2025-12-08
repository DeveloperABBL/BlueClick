<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SetPasswordMail;

class AdminApprovalController extends Controller
{
    /**
     * Admin อนุมัติผู้ใช้
     */
    public function approve($id)
    {
        $register = UserRegister::findOrFail($id);

        if ($register->is_approved) {
            return response()->json([
                'message' => 'ผู้ใช้นี้ถูกอนุมัติแล้ว'
            ], 400);
        }

        // อัปเดตสถานะการอนุมัติ
        $register->is_approved = true;
        $register->approved_at = now();

        // สร้าง token สำหรับตั้งรหัสผ่าน
        $register->password_set_token = Str::random(60);

        $register->save();

        // ส่งอีเมลแจ้งให้ตั้งรหัสผ่าน
        Mail::to($register->email)->send(
            new SetPasswordMail($register)
        );

        return response()->json([
            'message' => 'อนุมัติสำเร็จ และส่งอีเมลให้ตั้งรหัสผ่านแล้ว'
        ]);
    }

    /**
     * If admin wants to reject a user (ไม่มี rejected_at)
     */
    public function reject($id)
    {
        $register = UserRegister::findOrFail($id);

        if ($register->is_approved) {
            return response()->json([
                'message' => 'ผู้ใช้นี้ถูกอนุมัติไปแล้ว ไม่สามารถปฏิเสธได้'
            ], 400);
        }

        // ถ้าคุณไม่มีฟิลด์ is_rejected จริง ๆ ให้ทำแค่ลบข้อมูลแทน
        $register->delete();

        return response()->json([
            'message' => 'ลบข้อมูลผู้ใช้ (ปฏิเสธ) เรียบร้อย'
        ]);
    }
}

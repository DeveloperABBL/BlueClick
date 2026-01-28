<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserApprovedMail;

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
    public function approve(User $user)
    {
        if ($user->status !== 'register') {
            return response()->json([
                'message' => 'สถานะไม่ถูกต้อง'
            ], 422);
        }

        $user->update([
            'status' => 'active',
            'approve_datetime' => now(),
            'approve_user_id' => auth()->id(),
        ]);

        // ส่งเมล
        Mail::to($user->email)->send(new UserApprovedMail($user));

        return response()->json([
            'message' => 'อนุมัติเรียบร้อย และส่งอีเมลแล้ว'
        ]);
    }

    public function reject(User $user)
    {
        $user->update([
            'status' => 'rejected',
        ]);

        return response()->json(['message' => 'ปฏิเสธเรียบร้อย']);
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'prefix' => 'required',
            'other_prefix' => 'required_if:prefix,อื่นๆ|string|max:10',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone_no' => 'required|string|max:15|unique:users,phone_no',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        DB::beginTransaction();

        try {

            User::create([
                // ====== ข้อมูลพื้นฐาน ======
                'prefix' => $request->prefix,
                'other_prefix' => $request->prefix === 'อื่นๆ'
                    ? $request->other_prefix
                    : null,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_no' => $request->phone_no,
                'email' => $request->email,

                // ====== ระบบ ======
                'password' => Hash::make($request->password),
                'role' => 'user',
                'status' => 'register',
                'approve_user_id' => null,
                'approve_datetime' => null,
                'email_verified_at' => null,
            ]);

            DB::commit();

            return redirect()
                ->route('login')
                ->with('success', 'สมัครสมาชิกสำเร็จ กรุณารอการอนุมัติจากผู้ดูแลระบบ');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withErrors([
                    'error' => 'เกิดข้อผิดพลาดในการสมัครสมาชิก'
                ])
                ->withInput();
        }
    }
}

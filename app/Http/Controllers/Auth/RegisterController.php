<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'prefix' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'birth_date' => 'required|date',
            'phone' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        DB::beginTransaction();

        try {

            // สร้างบริษัท (ยังไม่อนุมัติ)
            $company = Company::create([
                'phone' => $request->phone,
                'approved_at' => null,
            ]);

            // สร้างผู้ใช้งาน
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'prefix' => $request->prefix,
                'custom_prefix' => $request->custom_prefix,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'birth_date' => $request->birth_date, // yyyy-mm-dd จาก input date
                'company_id' => $company->id,
            ]);

            DB::commit();

            return redirect()
                ->route('login')
                ->with('success', 'สมัครสมาชิกสำเร็จ กรุณารอการอนุมัติจากระบบ');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors([
                'error' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()
            ])->withInput();
        }
    }
}

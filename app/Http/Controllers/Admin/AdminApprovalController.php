<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\UserApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminApprovalController extends Controller
{
    public function index()
    {
        $registrations = UserRegister::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.approvals.index', compact('registrations'));
    }

    public function show($id)
    {
        $registration = UserRegister::findOrFail($id);
        return view('admin.approvals.show', compact('registration'));
    }

    public function approve(Request $request, $id)
    {
        $registration = UserRegister::findOrFail($id);

        if ($registration->status !== 'pending') {
            return redirect()->back()->with('error', 'ไม่สามารถอนุมัติได้ เนื่องจากสถานะไม่ใช่ pending');
        }

        // สร้างรหัสผ่านชั่วคราว
        $temporaryPassword = Str::random(10);

        // สร้าง User ใหม่
        $userData = [
            'prefix' => $registration->prefix,
            'prefix_other' => $registration->prefix_other,
            'firstname' => $registration->firstname,
            'surname' => $registration->surname,
            'tax_no' => $registration->tax_no,
            'birthday' => $registration->birthday,
            'tal_no' => $registration->tal_no,
            'email' => $registration->email,
            'address1' => $registration->address1,
            'address2' => $registration->address2,
            'reg_type' => $registration->reg_type,
            'password' => Hash::make($temporaryPassword),
            'registration_id' => $registration->id
        ];

        // เพิ่มข้อมูลตาม reg_type
        if ($registration->reg_type === 'employee') {
            $userData['bank_name'] = $registration->bank_name;
            $userData['bank_account_name'] = $registration->bank_account_name;
            $userData['bank_account_number'] = $registration->bank_account_number;
        } elseif ($registration->reg_type === 'vendor') {
            $userData['entity_type'] = $registration->vendor_entity_type;
            $userData['certificate_file'] = $registration->vendor_certificate_file;
            $userData['pp20_file'] = $registration->vendor_pp20_file;
            $userData['business_name'] = $registration->vendor_business_name;
            $userData['country'] = $registration->vendor_country;
            $userData['credit_days'] = $registration->vendor_credit_days;
            $userData['branch_status'] = $registration->vendor_branch_status;
            $userData['branch_status_no'] = $registration->vendor_branch_status_no;
            $userData['branch_status_name'] = $registration->vendor_branch_status_name;
            $userData['business_name_en'] = $registration->vendor_business_name_en;
            $userData['address1_en'] = $registration->vendor_address1_en;
            $userData['address2_en'] = $registration->vendor_address2_en;
        } elseif ($registration->reg_type === 'buyer') {
            $userData['entity_type'] = $registration->buyer_entity_type;
            $userData['certificate_file'] = $registration->buyer_certificate_file;
            $userData['pp20_file'] = $registration->buyer_pp20_file;
            $userData['business_name'] = $registration->buyer_business_name;
            $userData['country'] = $registration->buyer_country;
            $userData['credit_days'] = $registration->buyer_credit_days;
            $userData['branch_status'] = $registration->buyer_branch_status;
            $userData['branch_status_no'] = $registration->buyer_branch_status_no;
            $userData['branch_status_name'] = $registration->buyer_branch_status_name;
            $userData['business_name_en'] = $registration->buyer_business_name_en;
            $userData['address1_en'] = $registration->buyer_address1_en;
            $userData['address2_en'] = $registration->buyer_address2_en;
        }

        $user = User::create($userData);

        // อัพเดทสถานะการลงทะเบียน
        $registration->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => Auth::id()
        ]);

        // ส่งอีเมล
        try {
            Mail::to($user->email)->send(new UserApproved($user, $temporaryPassword));
        } catch (\Exception $e) {
            Log::error('Failed to send approval email: ' . $e->getMessage());
            return redirect()->route('admin.approvals.index')
                ->with('warning', 'อนุมัติสำเร็จ แต่ไม่สามารถส่งอีเมลได้');
        }

        return redirect()->route('admin.approvals.index')
            ->with('success', 'อนุมัติการลงทะเบียนสำเร็จและส่งอีเมลไปยังผู้ใช้แล้ว');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'reject_reason' => 'required|string'
        ]);

        $registration = UserRegister::findOrFail($id);

        $registration->update([
            'status' => 'rejected',
            'reject_reason' => $request->reject_reason,
            'approved_by' => Auth::id()
        ]);

        return redirect()->route('admin.approvals.index')
            ->with('success', 'ปฏิเสธการลงทะเบียนเรียบร้อยแล้ว');
    }
}
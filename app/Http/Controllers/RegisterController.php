<?php

namespace App\Http\Controllers;

use App\Models\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validation Rules
        $rules = [
            'prefix' => 'required|string',
            'prefix_other' => 'required_if:prefix,อื่นๆ',
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'tax_no' => 'required|string|unique:users_register,tax_no|unique:users,tax_no',
            'tal_no' => 'required|string',
            'email' => 'required|email|unique:users_register,email|unique:users,email',
            'address1' => 'required|string',
            'address2' => 'required|string',
            'reg_type' => 'required|in:employee,vendor,buyer'
        ];

        // เพิ่ม validation ตาม reg_type
        if ($request->reg_type === 'employee') {
            $rules['bank_name'] = 'required|string';
            $rules['bank_account_name'] = 'required|string';
            $rules['bank_account_number'] = 'required|string';
        }

        if ($request->reg_type === 'vendor') {
            $rules['vendor_business_name'] = 'required|string';
            $rules['vendor_country'] = 'required|string';
            $rules['vendor_credit_days'] = 'required|string';
            $rules['vendor_branch_status'] = 'required|in:0,1';
            
            if ($request->vendor_branch_status == '1') {
                $rules['vendor_branch_status_no'] = 'required|string';
                $rules['vendor_branch_status_name'] = 'required|string';
            }

            // File uploads
            if ($request->hasFile('vendor_certificate_file')) {
                $rules['vendor_certificate_file'] = 'file|mimes:pdf,jpg,jpeg,png|max:5120';
            }
            if ($request->hasFile('vendor_pp20_file')) {
                $rules['vendor_pp20_file'] = 'file|mimes:pdf,jpg,jpeg,png|max:5120';
            }
        }

        if ($request->reg_type === 'buyer') {
            $rules['buyer_business_name'] = 'required|string';
            $rules['buyer_country'] = 'required|string';
            $rules['buyer_credit_days'] = 'required|string';
            $rules['buyer_branch_status'] = 'required|in:0,1';
            
            if ($request->buyer_branch_status == '1') {
                $rules['buyer_branch_status_no'] = 'required|string';
                $rules['buyer_branch_status_name'] = 'required|string';
            }

            // File uploads
            if ($request->hasFile('buyer_certificate_file')) {
                $rules['buyer_certificate_file'] = 'file|mimes:pdf,jpg,jpeg,png|max:5120';
            }
            if ($request->hasFile('buyer_pp20_file')) {
                $rules['buyer_pp20_file'] = 'file|mimes:pdf,jpg,jpeg,png|max:5120';
            }
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle file uploads
        $data = $request->except(['vendor_certificate_file', 'vendor_pp20_file', 'buyer_certificate_file', 'buyer_pp20_file']);

        if ($request->hasFile('vendor_certificate_file')) {
            $data['vendor_certificate_file'] = $request->file('vendor_certificate_file')->store('certificates', 'public');
        }
        if ($request->hasFile('vendor_pp20_file')) {
            $data['vendor_pp20_file'] = $request->file('vendor_pp20_file')->store('pp20', 'public');
        }
        if ($request->hasFile('buyer_certificate_file')) {
            $data['buyer_certificate_file'] = $request->file('buyer_certificate_file')->store('certificates', 'public');
        }
        if ($request->hasFile('buyer_pp20_file')) {
            $data['buyer_pp20_file'] = $request->file('buyer_pp20_file')->store('pp20', 'public');
        }

        // สร้างข้อมูลการลงทะเบียน
        UserRegister::create($data);

        return redirect()->route('register.success')->with('success', 'ลงทะเบียนสำเร็จ กรุณารอการอนุมัติจากผู้ดูแลระบบ');
    }

    public function success()
    {
        return view('public.register-success');
    }
}

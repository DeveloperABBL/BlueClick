<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // รายการรออนุมัติ
    public function pending()
    {
        $companies = Company::whereNull('approved_at')->get();
        return view('users.companies.pending', compact('companies'));
    }

    // อนุมัติบริษัท
    public function approve($id)
    {
        $company = Company::findOrFail($id);
        $company->update([
            'approved_at' => now(),
        ]);

        return redirect()->back()->with('success', 'อนุมัติบริษัทเรียบร้อย');
    }
}

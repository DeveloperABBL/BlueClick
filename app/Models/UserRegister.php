<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRegister extends Model
{
    protected $table = 'users_register';

    protected $fillable = [
        'prefix',
        'prefix_other',
        'firstname',
        'surname',
        'tax_no',
        'birthday',
        'tal_no',
        'email',
        'address1',
        'address2',
        'reg_type',
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'vendor_entity_type',
        'vendor_certificate_file',
        'vendor_pp20_file',
        'vendor_business_name',
        'vendor_country',
        'vendor_credit_days',
        'vendor_branch_status',
        'vendor_branch_status_no',
        'vendor_branch_status_name',
        'vendor_business_name_en',
        'vendor_address1_en',
        'vendor_address2_en',
        'buyer_entity_type',
        'buyer_certificate_file',
        'buyer_pp20_file',
        'buyer_business_name',
        'buyer_country',
        'buyer_credit_days',
        'buyer_branch_status',
        'buyer_branch_status_no',
        'buyer_branch_status_name',
        'buyer_business_name_en',
        'buyer_address1_en',
        'buyer_address2_en',
        'status',
        'reject_reason',
        'approved_at',
        'approved_by'
    ];

    protected $casts = [
        'birthday' => 'date',
        'approved_at' => 'datetime'
    ];

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'registration_id');
    }
}

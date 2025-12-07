<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegister extends Model
{
    use HasFactory;

    protected $table = 'user_registers';

    protected $fillable = [
        'prefix',
        'first_name',
        'last_name',
        'birth_date',
        'phone',
        'email',

        'address',
        'province',
        'district',
        'subdistrict',
        'zipcode',

        'tax_id',
        'register_type',

        'bank_name',
        'bank_account_name',
        'bank_account_number',

        'is_approved',
        'approved_at',
        'approved_by',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'birth_date'  => 'date',
    ];

    /**
     * ความสัมพันธ์กับ users
     * UserRegister → hasOne → User
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_register_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegister extends Model
{
    use HasFactory;

    protected $table = 'user_registers';

    protected $fillable = [
        'prefix', 'other_prefix', 'first_name', 'last_name', 'tax_id',
        'birthday', 'phone', 'email', 'address', 'district', 'type',
        'bank', 'account_name', 'account_number',
        'verification_token', 'is_verified',
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

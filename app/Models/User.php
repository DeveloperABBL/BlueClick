<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        'password',
        'reg_type',
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'entity_type',
        'certificate_file',
        'pp20_file',
        'business_name',
        'country',
        'credit_days',
        'branch_status',
        'branch_status_no',
        'branch_status_name',
        'business_name_en',
        'address1_en',
        'address2_en',
        'is_active',
        'is_admin',        // เพิ่มบรรทัดนี้
        'registration_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthday' => 'date',
            'is_active' => 'boolean',
            'is_admin' => 'boolean',    // เพิ่มบรรทัดนี้
        ];
    }

    /**
     * Relationship: User Register
     */
    public function registration()
    {
        return $this->belongsTo(UserRegister::class, 'registration_id');
    }

    /**
     * Get full name
     */
    public function getFullNameAttribute()
    {
        return $this->prefix . ' ' . $this->firstname . ' ' . $this->surname;
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->is_admin === true;
    }
}
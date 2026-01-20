<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'phone',
        'approved_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

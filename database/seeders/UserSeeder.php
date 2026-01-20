<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::create([
            'name' => 'ผู้ดูแลระบบ', // ⭐ สำคัญ
            'email' => 'admin@blueclick.com',
            'password' => bcrypt('123456'),
            'prefix' => 'นาย',
            'firstname' => 'ผู้ดูแล',
            'lastname' => 'ระบบ',
            'birth_date' => '1990-01-01',
            'company_id' => 1,
        ]);
    }
}

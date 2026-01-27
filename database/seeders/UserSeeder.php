<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'approve_user_id'      => null,
                'prefix'               => 'นาย',
                'other_prefix'         => null,
                'first_name'           => 'Admin',
                'last_name'            => 'BlueClick',
                'phone_no'             => '0800000001',
                'email'                => 'admin',
                'email_verified_at'    => Carbon::now(),
                'profile_image'        => null,
                'password'             => Hash::make('12345678'),
                'role'                 => 'admin',
                'status'               => 'active',
                'approve_datetime'     => Carbon::now(),
                'remember_token'       => null,
                'created_at'           => Carbon::now(),
                'updated_at'           => Carbon::now(),
                'deleted_at'           => null,
            ],
        ]);
    }
}

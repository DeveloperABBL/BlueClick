<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Company::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Company::create([
            'name'        => 'BlueClick จำกัด',
            'phone'       => '021234567',
            'approved_at' => Carbon::now(),
        ]);

        Company::create([
            'name'        => 'Pending Company จำกัด',
            'phone'       => '029999999',
            'approved_at' => null,
        ]);
    }
}

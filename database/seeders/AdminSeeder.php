<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Washington Awala',
            'email' => 'hillarynyamuche@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone_number' => '+2547917472452',
            'adminable_type' => 'App\Models\SchoolDepartment',
            'adminable_id' => '1',
            'created_at' => Carbon::now(),
            'password' => Hash::make('hillarynyamuche@gmail.com'),
        ]);
    }
}

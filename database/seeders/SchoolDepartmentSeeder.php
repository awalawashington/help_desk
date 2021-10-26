<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = collect(['Administration', 'Registrar Academic Affairs', 'Accomodation', 'Library', 'Sports',  'Students Union']);

        foreach ($departments as $department) {
            DB::table('school_departments')->insert([
                'name' => $department,
                'role' => 1
            ]);
        }
    }
}

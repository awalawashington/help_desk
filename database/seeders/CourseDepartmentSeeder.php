<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applied = collect(['Mathematics and Physics', ' 	Environmental and Health Sciences', 'Medical Sciences', 'Pure and Applied Sciences']);
        $engineering = collect(['Electrical Engineering', 'Building and Civil Engineering', 'Mechanical and Automotive Engineering', 'Medical Engineering']);
        $business = collect(['Accounting and Finance', 'Business Administration', 'Management Science', 'Business']);
        $ici = collect(['Computer Science and Information Technology', 'Information Technology']);
        $humanities = collect(['Social Sciences', 'Hospitality and Tourism']);

        foreach ($applied as $a) {
            DB::table('course_departments')->insert([
                'name' => $a,
                'faculty_id' => 1
            ]);
        }

        foreach ($engineering as $e) {
            DB::table('course_departments')->insert([
                'name' => $e,
                'faculty_id' => 2
            ]);
        }

        foreach ($business as $b) {
            DB::table('course_departments')->insert([
                'name' => $b,
                'faculty_id' => 3
            ]);
        }

        foreach ($ici as $i) {
            DB::table('course_departments')->insert([
                'name' => $i,
                'faculty_id' => 4
            ]);
        }

        foreach ($humanities as $h) {
            DB::table('course_departments')->insert([
                'name' => $h,
                'faculty_id' => 5
            ]);
        }
    }
}

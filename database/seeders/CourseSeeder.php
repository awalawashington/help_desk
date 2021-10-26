<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maths = collect(['BSc Statistics and Computer Science', 'BSc Mathematics and Computer Science', 'BSc Mathematics and Finance']);
        $medical = collect(['BSc Medical Laboratory Science', 'Diploma in Pharmaceutical Technology', 'BSc Medical Labaratory Sciences']);
        $electrical = collect(['BTech Civil Engineering', 'BSc Civil Engineering', 'Diploma in Building and Civil Engineering.']);
        

        foreach ($maths as $m) {
            DB::table('courses')->insert([
                'name' => $m,
                'course_department_id' => 1
            ]);
        }

        foreach ($medical as $e) {
            DB::table('courses')->insert([
                'name' => $e,
                'course_department_id' => 3
            ]);
        }

        foreach ($electrical as $e) {
            DB::table('courses')->insert([
                'name' => $e,
                'course_department_id' => 5
            ]);
        }
    }
}

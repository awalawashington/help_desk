<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = collect(['Applied and Health Sciences', 'Engineering and Technology', 'Business', 'Institute for Computing and Informatics', 'Humanities And Social Science']);

        foreach ($faculties as $faculty) {
            DB::table('faculties')->insert([
                'name' => $faculty
            ]);
        }
    }
}

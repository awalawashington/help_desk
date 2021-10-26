<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('faculty_id')->unsigned();
            $table->timestamps();
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_departments');
    }
}

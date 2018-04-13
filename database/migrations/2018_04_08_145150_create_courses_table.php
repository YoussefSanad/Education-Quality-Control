<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('collage_id');
            $table->foreign('collage_id')
                ->references('id')->on('collages')
                ->onDelete('cascade');
            $table->unsignedInteger('academic_year_id');
            $table->foreign('academic_year_id')
                ->references('id')->on('academic_years')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('code');
            $table->string('objectives');
            $table->string('description');
            $table->string('assessment_method');
            $table->string('doctor_name');
            $table->string('student_evaluation');
            $table->string('success_percentage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

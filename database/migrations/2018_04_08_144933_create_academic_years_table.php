<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_years', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('collage_id');
            $table->foreign('collage_id')
                ->references('id')->on('collages')
                ->onDelete('cascade');
            $table->string('name');
            $table->integer('number_of_students');
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
        Schema::dropIfExists('academic_years');
    }
}

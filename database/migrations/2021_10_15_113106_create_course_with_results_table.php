<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseWithResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_with_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('resultId');
            $table->string('courseNo')->nullable();
            $table->string('courseCode')->nullable();
            $table->string('courseCredit')->nullable();
            $table->string('courseGrade')->nullable();
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
        Schema::dropIfExists('course_with_results');
    }
}

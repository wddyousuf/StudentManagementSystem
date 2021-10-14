<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('roll')->nullable();
            $table->string('year')->nullable();
            $table->string('semester')->nullable();
            $table->string('crs1')->nullable();
            $table->string('grade1')->nullable();
            $table->string('crs2')->nullable();
            $table->string('grade2')->nullable();
            $table->string('crs3')->nullable();
            $table->string('grade3')->nullable();
            $table->string('crs4')->nullable();
            $table->string('grade4')->nullable();
            $table->string('crs5')->nullable();
            $table->string('grade5')->nullable();
            $table->string('crs6')->nullable();
            $table->string('grade6')->nullable();
            $table->string('crs7')->nullable();
            $table->string('grade7')->nullable();
            $table->string('crs8')->nullable();
            $table->string('grade8')->nullable();
            $table->string('crs9')->nullable();
            $table->string('grade9')->nullable();
            $table->string('crs10')->nullable();
            $table->string('grade10')->nullable();
            $table->string('crs11')->nullable();
            $table->string('grade11')->nullable();
            $table->string('crs12')->nullable();
            $table->string('grade12')->nullable();
            $table->string('cigi')->nullable();
            $table->string('total credit')->nullable();
            $table->float('sgpa',5,1)->nullable();
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
        Schema::dropIfExists('results');
    }
}

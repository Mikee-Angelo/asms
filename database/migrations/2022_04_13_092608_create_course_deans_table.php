<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_deans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('course_id')->unsigned(); 
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('course_deans');
    }
}

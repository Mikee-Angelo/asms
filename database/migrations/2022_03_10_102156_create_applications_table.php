<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->enum('year_level', [1, 2, 3, 4]);
            $table->enum('semester', [1, 2, 3]);
            $table->enum('application_type', [1, 2, 3, 4]);
            $table->boolean('mental_illness');
            $table->boolean('hearing_defects');
            $table->boolean('physical_disability');
            $table->boolean('chronic_illness');
            $table->boolean('interfering_illness');
            $table->boolean('allergies');
            $table->enum('status', ['pending', 'accepted', 'enrolled', 'rejected']);
            $table->dateTime('accepted_at')->nullable();
            $table->dateTime('enrolled_at')->nullable();
            $table->dateTime('rejected_at')->nullable();
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
        Schema::dropIfExists('applications');
    }
}

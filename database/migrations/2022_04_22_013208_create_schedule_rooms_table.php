<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('schedule_course_subject_id')->unsigned(); 
            $table->foreign('schedule_course_subject_id')->references('id')->on('schedule_course_subjects')->onDelete('cascade');
            $table->bigInteger('room_id')->unsigned(); 
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('schedule_rooms');
    }
}

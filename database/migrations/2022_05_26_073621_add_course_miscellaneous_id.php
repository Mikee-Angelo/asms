<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseMiscellaneousId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miscellaneouses', function (Blueprint $table) {
            //
            $table->bigInteger('course_miscellaneous_id')->unsigned()->after('id'); 
            $table->foreign('course_miscellaneous_id')->references('id')->on('course_miscellaneouses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('miscellaneouses', function (Blueprint $table) {
            //
        });
    }
}

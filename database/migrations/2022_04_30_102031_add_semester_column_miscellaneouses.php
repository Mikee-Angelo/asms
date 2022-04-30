<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSemesterColumnMiscellaneouses extends Migration
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
            $table->bigInteger('semester_id')->unsigned()->after('id');
            $table->foreign('semester_id')->references('id')->on('enrollments')->onDelete('cascade');
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

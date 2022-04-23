<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGradingColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_subjects', function (Blueprint $table) {
            //
            $table->string('prelim',255)->nullable()->after('subject_id');
            $table->string('midterm',255)->nullable()->after('prelim');
            $table->string('prefinal',255)->nullable()->after('midterm');
            $table->string('final',255)->nullable()->after('prefinal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_subjects', function (Blueprint $table) {
            //
            
        });
    }
}

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
            $table->integer('prelim')->nullable()->after('subject_id');
            $table->integer('midterm')->nullable()->after('prelim');
            $table->integer('prefinal')->nullable()->after('midterm');
            $table->integer('final')->nullable()->after('prefinal');
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

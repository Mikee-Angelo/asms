<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusColumn extends Migration
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
            $table->enum('status', ['NFE', 'INC', 'DRP', 'PASSED', 'FAILED'])->nullable()->after('final');
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

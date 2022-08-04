<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRequirementsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            //
            $table->boolean('psa')->default(false)->after('status');
            $table->boolean('sf9')->nullable()->after('psa');
            $table->boolean('good_moral')->nullable()->after('sf9');
            $table->boolean('colored_pictures')->nullable()->after('good_moral');
            $table->boolean('honorable_dismissal')->nullable()->after('colored_pictures');
            $table->boolean('transcript_records')->nullable()->after('honorable_dismissal');
            $table->boolean('clearance')->nullable()->after('transcript_records');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}

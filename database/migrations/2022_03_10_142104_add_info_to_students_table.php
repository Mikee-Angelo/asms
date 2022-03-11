<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoToStudentsTable extends Migration
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
            $table->dateTime('birthday')->after('middle_name');
            $table->string('mobile_no', 11)->after('birthday');
            $table->enum('gender', ['male', 'female'])->after('mobile_no');
            $table->string('register_email', 255)->after('gender');
            $table->string('facebook_link', 255)->after('register_email');
            $table->text('home_address')->after('facebook_link');
            $table->text('present_address')->after('home_address');
            $table->string('mother', 255)->after('present_address');
            $table->string('mother_occupation', 255)->after('mother');
            $table->string('father', 255)->after('mother_occupation');
            $table->string('father_occupation', 255)->after('father');
            $table->string('guardian', 255)->after('father_occupation');
            $table->string('guardian_contact_no', 255)->after('guardian');
            $table->string('guardian_relationship', 255)->after('guardian_contact_no');
            $table->string('primary_school', 255)->after('guardian_relationship');
            $table->string('primary_graduated', 255)->after('primary_school');
            $table->string('secondary_school', 255)->after('primary_graduated');
            $table->string('secondary_graduated', 255)->after('secondary_school');
            $table->string('senior_school_name', 255)->nullable()->after('secondary_graduated');
            $table->string('strand', 255)->nullable()->after('senior_school_name');
            $table->string('senior_graduated', 255)->nullable()->after('strand');
            $table->string('tertiary_school', 255)->nullable()->after('senior_graduated');
            $table->string('tertiary_graduated', 255)->nullable()->after('tertiary_school');
            $table->string('last_school_date', 255)->nullable()->after('tertiary_graduated');
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
          
        });
    }
}

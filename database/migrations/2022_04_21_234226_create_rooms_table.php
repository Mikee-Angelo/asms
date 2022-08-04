<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('building_id')->unsigned();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
            $table->string('name', 255); 
            $table->enum('type', ['lecture', 'laboratory'])->default('lecture');
            $table->smallInteger('floor');
            $table->integer('capacity');
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
        Schema::dropIfExists('rooms');
    }
}

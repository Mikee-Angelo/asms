<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('application_id')->unsigned();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->enum('type', ['Registration', 'Payment']);
            $table->text('description')->nullable();
            $table->bigInteger('amount');
            $table->string('source_id', 255)->nullable();
            $table->boolean('paid')->default(false);
            $table->enum('source', ['cash', 'gcash', 'paymaya', 'card']);
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
        Schema::dropIfExists('application_transactions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travel_packages_id');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->integer('additional_visa');
            $table->integer('transaction_total');
            $table->string('transaction_status'); //incart, pending,success,cancel,failed
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('travel_packages_id')->references('id')->on('travel_packages')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}

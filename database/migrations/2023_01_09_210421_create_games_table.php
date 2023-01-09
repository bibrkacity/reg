<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('Gamer');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedSmallInteger('random')->comment('Random number');
            $table->unsignedTinyInteger('result')->comment('Win/Lose');
            $table->decimal('amount',6,2)->comment('Amount Win');


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
        Schema::dropIfExists('games');
    }
};

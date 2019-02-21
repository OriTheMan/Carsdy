<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cset_id')->unsigned();
            $table->string('front', 100);
            $table->string('back', 100);
            $table->string('alt', 100)->nullable();
            $table->string('comment', 100)->nullable();
            $table->timestamps();

            $table->foreign('cset_id')->references('id')->on('card_sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}

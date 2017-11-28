<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('channel_id');
            $table->integer('user_id')->unsigned();
            $table->integer('doc_id')->unsigned();
            $table->integer('msg_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('doc_id')->references('doc_id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels');
    }
}

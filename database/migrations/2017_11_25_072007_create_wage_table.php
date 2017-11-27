<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wage', function (Blueprint $table) {
          $table->increments('wid');
          $table->integer('eid')->unsigned();

          $table->integer('wpay')->unsigned();
          $table->integer('wallowance')->unsigned();
          $table->integer('wovertime')->unsigned();
          $table->integer('wwithholding')->unsigned();


          $table->foreign('eid')->references('eid')->on('employee');
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
        Schema::dropIfExists('wage');
    }
}

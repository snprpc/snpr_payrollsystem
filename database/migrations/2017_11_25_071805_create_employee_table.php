<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
          $table->increments('eid');
          $table->string('ename', 50);
          $table->enum('esex', ['male', 'female']);
          $table->date('ebirth');
          $table->string('eplace', 50);
          $table->string('enation', 50);
          $table->string('estatus', 50);
          $table->string('epicture')->nullable();
          $table->string('ephone', 50)->unique();
          $table->string('eaccout', 50)->unique();

          //$table->integer('dep_id')->unsigned();

          // $table->foreign('dep_id')->references('dep_id')->on('department');
          // $table->index('dep_id');
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
        Schema::dropIfExists('employee');
    }
}

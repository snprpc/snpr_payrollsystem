<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_department', function (Blueprint $table) {

            $table->integer('dep_id')->unsigned();
            $table->integer('eid')->unsigned();
            $table->boolean('is_directory');

            $table->foreign('dep_id')->references('dep_id')->on('department');
            $table->foreign('eid')->references('eid')->on('employee');
            $table->primary(['dep_id', 'eid']);
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
        Schema::dropIfExists('employee_department');
    }
}

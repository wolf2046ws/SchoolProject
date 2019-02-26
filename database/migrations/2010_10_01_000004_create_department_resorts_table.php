<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentResortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_resorts', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->integer('resort_id')->unsigned();


            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('resort_id')->references('id')->on('resorts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_resorts');
    }
}

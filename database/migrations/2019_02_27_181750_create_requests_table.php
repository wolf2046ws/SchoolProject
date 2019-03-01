<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');


            $table->integer('component_id')->unsigned();
            $table->enum('component_type',['Hardware', 'Software','Files']);
            $table->enum('status', ['pending', 'delevired','Allowed','Not Allowed']);
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
        Schema::dropIfExists('requests');
    }
}

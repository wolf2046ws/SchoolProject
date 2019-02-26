<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->date('contract_start');
            $table->date('contract_end');
            $table->enum('gender', ['male', 'female']);

            $table->string('manager');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                    ->references('id')->on('companies');

            $table->integer('resort_id')->unsigned();
            $table->foreign('resort_id')
                    ->references('id')->on('resorts');

            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')
                    ->references('id')->on('departments');

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
        Schema::dropIfExists('users');
    }
}

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
            $table->string('username',50);
            $table->string('last_name',50);
            $table->string('second_last_name',50);
            $table->string('street',100);
            $table->integer('outside_number');
            $table->string('interior_number',45)->nullable();
            $table->string('neighborhood',100);
            $table->integer('postal_code');
            $table->string('city',100);
            $table->string('state',100);
            $table->bigInteger('phonenumber')->nullable();
            $table->bigInteger('cellphone');
            $table->double('base_salary');
            $table->char('status')->default(1);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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

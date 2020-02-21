<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('Id');
            $table->string('UserName',50)->unique();
            $table->string('Password',50);
            $table->integer('PhoneNumber')->nullable();
            $table->string('Email',50)->nullable();
            $table->string('DOB',50)->nullable();
            $table->string('FullName',50)->nullable();
            $table->dateTime('LastLoginDate')->nullable();
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

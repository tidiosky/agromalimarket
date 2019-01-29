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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('sexe')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('country')->nullable();
            $table->text('about')->nullable();
            $table->float('lat',10,7)->nullable();
            $table->float('lng',10,7)->nullable();
            $table->string('section');
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

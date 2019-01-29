<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->decimal('montant')->nullable();
            $table->text('address')->nullable();
            $table->text('address2')->nullable();
            $table->string('username')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_number');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->text('email')->nullable();
            $table->string('name')->nullable();
            $table->string('payment_id');
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
        Schema::dropIfExists('orders');
    }
}

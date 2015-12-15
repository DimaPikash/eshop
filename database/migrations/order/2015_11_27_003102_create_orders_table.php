<?php

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
            $table->string('customer_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('sum_order');
            $table->string('delivery_address');
            $table->text('comment')->nullable();
            $table->unsignedInteger('order_status_id')->default(1);
            $table->engine = 'InnoDB';
            $table->timestamps();
            
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}

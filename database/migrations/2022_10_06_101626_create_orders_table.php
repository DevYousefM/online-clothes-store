<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('qtn');
            $table->string('product_img');
            $table->string('product_title');
            $table->integer('user_id')->nullable();
            $table->string("user_type");
            $table->bigInteger('phone_number');
            $table->string("name");
            $table->string("email");
            $table->string('address');
            $table->string('payment_status');
            $table->string('order_status')->default("pending");
            $table->string('shipment_code')->nullable();
            $table->string('total_price');
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
};

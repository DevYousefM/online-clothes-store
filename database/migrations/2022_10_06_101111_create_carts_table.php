<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('product_id');
            $table->string('product_title');
            $table->string('product_description');
            $table->string('product_img');
            $table->integer('product_price');
            $table->smallInteger("product_percent");
            $table->integer('quantity')->nullable();
            $table->integer('total_price')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("password");
            $table->string('user_type')->default('company');
            $table->string('fiscal_id');
            $table->string('vat_code');
            $table->string('tax_code');
            $table->string('company_name');
            $table->string('postal_code');
            $table->string('ben_code');
            $table->string('pec_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};

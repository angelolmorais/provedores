<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('company');
            $table->string('cnpj')->nullable();
            $table->string('nit')->nullable();
            $table->string('name')->nullable();
            $table->string('business')->nullable();
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('state_province');
            $table->string('address');
            $table->string('activity');
            $table->unsignedBigInteger('country');
            $table->string('city');
            $table->string('password');
            $table->string('privacy_policy')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};

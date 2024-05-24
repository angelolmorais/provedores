<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bidding');
            $table->string('status');
            $table->unsignedBigInteger('docid')->nullable();
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('registers');
    }
}

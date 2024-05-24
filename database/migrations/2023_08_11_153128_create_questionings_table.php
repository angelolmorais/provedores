<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestioningsTable extends Migration
{
    public function up()
    {
        Schema::create('questionings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bidding');
            $table->text('question');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('questionings');
    }
}

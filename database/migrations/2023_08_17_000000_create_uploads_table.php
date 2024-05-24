<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bidding');
            $table->unsignedBigInteger('id_category')->nullable();
            $table->unsignedBigInteger('id_subcategory')->nullable();
            $table->unsignedBigInteger('id_information')->nullable();
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type')->nullable();
            $table->string('file_description')->nullable();
            $table->integer('file_size');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('uploads');
    }
}


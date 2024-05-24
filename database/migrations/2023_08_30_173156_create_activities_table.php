<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('id_countries')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('id_countries')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }
};

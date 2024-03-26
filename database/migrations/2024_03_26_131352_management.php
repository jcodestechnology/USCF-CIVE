<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Management extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('position');
            $table->string('picture');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('management');
    }
}

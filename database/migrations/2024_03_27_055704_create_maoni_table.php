<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaoniTable extends Migration
{
    public function up()
    {
        Schema::create('maoni', function (Blueprint $table) {
            $table->id();
            $table->text('maelezo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maoni');
    }
}

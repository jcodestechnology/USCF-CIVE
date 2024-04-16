<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmanakisTable extends Migration
{
    public function up()
    {
        Schema::create('almanakis', function (Blueprint $table) {
            $table->id();
            $table->date('tarehe');
            $table->string('tukio');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('almanakis');
    }
}

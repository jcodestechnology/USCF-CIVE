<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSadakasTable extends Migration
{
    public function up()
    {
        Schema::create('sadakas', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('sadaka_jumapili');
            $table->string('kumtunza_mchungaji')->nullable();
            $table->string('mnada')->nullable();
            $table->string('shukrani_ya_pekee')->nullable();
            $table->string('changizo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sadakas');
    }
}

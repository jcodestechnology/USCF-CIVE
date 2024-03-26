<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNenoLaWeekTable extends Migration
{
    public function up()
    {
        Schema::create('neno_la_week', function (Blueprint $table) {
            $table->id();
            $table->string('kichwa');
            $table->string('kifungu');
            $table->text('maelezo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('neno_la_week');
    }
}

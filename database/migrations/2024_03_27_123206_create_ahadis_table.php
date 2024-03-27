<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhadisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahadis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('aina_ya_sadaka');
            $table->unsignedBigInteger('ahadi_yangu');
            $table->unsignedSmallInteger('year'); // Add a field for year
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ahadis');
    }
}

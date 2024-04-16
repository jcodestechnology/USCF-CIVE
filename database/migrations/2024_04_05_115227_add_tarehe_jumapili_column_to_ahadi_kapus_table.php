<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTareheJumapiliColumnToAhadiKapusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ahadi_kapus', function (Blueprint $table) {
            $table->date('tarehe_ya_jumapili')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ahadi_kapus', function (Blueprint $table) {
            $table->dropColumn('tarehe_ya_jumapili');
        });
    }
    
}

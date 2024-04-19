<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRisitiToSadakasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('sadakas', function (Blueprint $table) {
        $table->string('risiti')->nullable(); // Adjust the data type and options as needed
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sadakas', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpirationDateToMatangazosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   // In the generated migration file

public function up()
{
    Schema::table('matangazos', function (Blueprint $table) {
        $table->dateTime('expiration_date')->nullable(false)->after('content');
    });
}

public function down()
{
    Schema::table('matangazos', function (Blueprint $table) {
        $table->dropColumn('expiration_date');
    });
}
}
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSadakasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sadakas', function (Blueprint $table) {
            $table->decimal('sadaka_madhabahu', 10, 2)->nullable();
            $table->decimal('katikati_week', 10, 2)->nullable();
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
            $table->dropColumn('sadaka_madhabahu');
            $table->dropColumn('katikati_week');
        });
    }
}

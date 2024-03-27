<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKiasiAlichotoaToAhadisTable extends Migration
{
    public function up()
    {
        Schema::table('ahadis', function (Blueprint $table) {
            $table->unsignedBigInteger('kiasi_alichotoa')->after('ahadi_yangu')->nullable();
        });
    }

    public function down()
    {
        Schema::table('ahadis', function (Blueprint $table) {
            $table->dropColumn('kiasi_alichotoa');
        });
    }
}



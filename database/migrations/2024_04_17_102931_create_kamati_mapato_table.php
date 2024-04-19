<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamatiMapatoTable extends Migration
{
    public function up()
    {
        Schema::create('kamati_mapato', function (Blueprint $table) {
            $table->id();
            $table->date('tarehe');
            $table->string('aina_ya_mapato');
            $table->decimal('kiasi_cha_mapato', 10, 2);
            $table->string('risiti');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kamati_mapato');
    }
}

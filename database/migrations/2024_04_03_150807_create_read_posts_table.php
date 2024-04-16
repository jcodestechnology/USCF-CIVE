<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadPostsTable extends Migration
{
    public function up()
    {
        Schema::create('read_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->timestamps(); // Optional, if you want to track when the record was created
        });
    }

    public function down()
    {
        Schema::dropIfExists('read_posts');
    }
}

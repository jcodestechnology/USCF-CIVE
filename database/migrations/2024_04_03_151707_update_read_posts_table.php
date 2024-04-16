<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReadPostsTable extends Migration
{
    public function up()
    {
        Schema::table('read_posts', function (Blueprint $table) {
            // Drop the existing post_id column
            $table->dropForeign(['post_id']);
            $table->dropColumn('post_id');

            // Add the new matangazo_id column
            $table->foreignId('matangazo_id')
                  ->constrained('matangazos')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('read_posts', function (Blueprint $table) {
            // Drop the new matangazo_id column
            $table->dropForeign(['matangazo_id']);
            $table->dropColumn('matangazo_id');

            // Recreate the post_id column
            $table->foreignId('post_id')
                  ->constrained()
                  ->onDelete('cascade');
        });
    }


}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove the 'name' column
            $table->dropColumn('name');

            // Add new columns
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('phone');
           
            $table->string('user_role');
            $table->foreignId('program')->constrained('programs');
            $table->boolean('block');
        
            $table->text('profile')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Re-add the 'name' column
            $table->string('name');

            // Drop added columns
            $table->dropColumn('firstname');
            $table->dropColumn('middlename');
            $table->dropColumn('lastname');
            $table->dropColumn('phone');
           
            $table->dropColumn('user_role');
            $table->dropForeign(['program']);
            $table->dropColumn('program');
            $table->dropColumn('block');
          
            $table->dropColumn('profile');
        });
    }
}

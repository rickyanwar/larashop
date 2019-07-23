<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenyesuaianTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function(Blueprint $table) {
            $table->string('username')->unique();
            $table->string('roles');
            $table->text('addres');
            $table->string('phone');
            $table->string('avatar');
            $table->enum("Status",['ACTIVE','INACTIVE']);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('username')->unique();
            $table->string('roles');
            $table->text('addres');
            $table->string('phone');
            $table->string('avatar');
            $table->enum("Status",['ACTIVE','INACTIVE']);

        });

    }
}

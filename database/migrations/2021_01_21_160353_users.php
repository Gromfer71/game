<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true, false);
            $table->string('login');
            $table->string('password');
            $table->integer('food');
            $table->integer('wood');
            $table->integer('iron');
            $table->integer('mithril');
            $table->integer('last_active')->nullable();
            $table->integer('last_check')->nullable();
            $table->integer('max_building_upgrades');
            $table->integer('train_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

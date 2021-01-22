<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Buildings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->integer('b_id', true);
            $table->integer('lv');
            $table->string('category');
            $table->integer('food_up');
            $table->integer('wood_up');
            $table->integer('iron_up');
            $table->integer('mithril_up');
            $table->string('properties');
            $table->integer('power');
            $table->integer('time_up');
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

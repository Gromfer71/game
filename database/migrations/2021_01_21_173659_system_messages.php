<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SystemMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_messages', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('category');
            $table->integer('to');
            $table->string('title');
            $table->text('message');
            $table->string('items');
            $table->tinyInteger('is_read')->default('0');
            $table->tinyInteger('is_items_got')->default('0');
            $table->timestamp('created_at')->default(now());

            $table->foreign('to')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
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

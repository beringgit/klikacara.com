<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEventDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_date', function (Blueprint $table) {
            $table->increments('id');

            $table->date('register_open')->nullable();
            $table->date('register_close')->nullable();

            $table->time('event_start');
            $table->time('event_close');
            $table->date('date');
            $table->integer('event_id')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_date');
    }
}

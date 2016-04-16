<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEventLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_location', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('date_id')->unsigned();
            $table->string('location',200);
            $table->integer('event_date_id')->unsigned();

            $table->foreign('event_date_id')
                ->references('id')
                ->on('event_date')
                ->onDelete('cascade')
                ->onUpdate('cascade');


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
        Schema::drop('event_location');
    }
}

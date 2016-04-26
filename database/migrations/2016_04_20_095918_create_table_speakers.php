<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSpeakers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',60);
            $table->string('position',60);
            $table->string('topic_title',60)->nullable();
            $table->string('company',60);
            $table->timestamps();
        });

        Schema::create('event_speaker', function(Blueprint $table){
            $table->increments('id');
            $table->integer('event_id')->unsigned()->index();
            $table->integer('speaker_id')->unsigned()->index();

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('speaker_id')
                ->references('id')
                ->on('speakers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_speaker');
        Schema::drop('speakers');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 80);
            $table->string('theme', 100)->nullable();
            $table->string('organization', 100);
            $table->text('body');
            $table->string('website', 100)->nullable();
            $table->decimal('fee', 8, 2);
            $table->integer('quota')->unsigned();
            $table->string('poster')->nullable();

            $table->integer('eventable_id')->unsigned();
            $table->string('eventable_type');

            $table->integer('location_id')
                ->references('id')
                ->on('event_location')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('date_id')->unsigned();
            $table->foreign('date_id')
                ->references('id')
                ->on('event_date')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('event_category')
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
        Schema::drop('events');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prdouct_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('satuan',30);
            $table->decimal('price_per_item',8,2);
            $table->text('description');
            $table->integer('provider_id')->unsigned();

            $table->foreign('provider_id')
                ->references('id')
                ->on('providers')
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
        Schema::drop('prdouct_providers');
    }
}

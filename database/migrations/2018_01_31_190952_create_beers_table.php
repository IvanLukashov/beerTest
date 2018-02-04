<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('brewery_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
            $table->foreign('brewery_id')->references('id')->on('breweries')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('beer_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterSeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_season', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('character_id')->unsigned();
            $table->integer('season_id')->unsigned();

            $table->timestamps();


            //relaciones
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_season');
    }
}

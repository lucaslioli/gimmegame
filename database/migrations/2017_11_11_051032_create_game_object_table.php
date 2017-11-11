<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Game;

class CreateGameObjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_object', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id')->unsigned();
            $table->integer('object_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('object_id')->references('id')->on('objects');
            $table->timestamps();
        });

        Game::find(1)->objects()->attach(3);
        Game::find(2)->objects()->attach(3);
        Game::find(3)->objects()->attach(3);
        Game::find(4)->objects()->attach(3);
        Game::find(5)->objects()->attach(1);
        Game::find(6)->objects()->attach(1);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_object');
    }
}

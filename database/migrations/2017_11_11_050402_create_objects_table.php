<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Object;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $objects = [
            ['name' => 'Baralho'],
            ['name' => 'Bola'],
            ['name' => 'Caneta e Papel'],
            ['name' => 'Dados'],
            ['name' => 'Barbante'],
            ['name' => 'Corda'],
            ['name' => 'Venda'],
            ['name' => 'Copo']
        ];

        foreach ($objects as $object) {
            Object::create($object);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}

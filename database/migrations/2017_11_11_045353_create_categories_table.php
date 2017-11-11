<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Category;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $categories = [
            ['name' => 'Tabuleiro'],
            ['name' => 'RPG'],
            ['name' => 'Ao ar livre'],
            ['name' => 'Esportivo'],
            ['name' => 'Interpretação'],
            ['name' => 'Adivinhação'],
            ['name' => 'Azar'],
            ['name' => 'Quiz'],
            ['name' => 'Raciocínio'],
            ['name' => 'Cartas']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

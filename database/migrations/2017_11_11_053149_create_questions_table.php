<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Question;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('order')->unsigned();
            $table->timestamps();
        });

        $questions = [
            ['description' => 'Olá, eu sou o Gimmo, seu assistente de entretenimento! Estou aqui para lhe ajudar a encontrar um jogo que você possa gostar.', 'order' => 0],
            ['description' => 'Quantas pessoas irão jogar o jogo?', 'order' => 1],
            ['description' => 'Qual o número de pessoas participantes?', 'order' => 1],
            ['description' => 'Qual o número de jogadores?', 'order' => 1],
            ['description' => 'Qual a faixa de etária do seu grupo?', 'order' => 2],
            ['description' => 'Qual a faixa de etária dos jogadores?', 'order' => 2],
            ['description' => 'Qual a faixa de idade dos participantes?', 'order' => 2],
            ['description' => 'Quais categorias de jogos vocês procuram?', 'order' => 3],
            ['description' => 'Em quais categorias vocês estão interessados?', 'order' => 3],
            ['description' => 'Que categorias mais interessam?', 'order' => 3],
            ['description' => 'Selecione as categorias desejadas:', 'order' => 3],
            ['description' => 'Quais destes materiais estão disponíveis?', 'order' => 4],
            ['description' => 'Quais materiais você tem a disposição?', 'order' => 4],
            ['description' => 'Selecione os objetos que você dispõe:', 'order' => 4],
            ['description' => 'Caso queira, é possível pesquisar por algum termo em específico:', 'order' => 5],
            ['description' => 'Deseja incluir algum outro detalhe na pesquisa?', 'order' => 5],
            ['description' => 'Se desejar, insira um termo adicional:', 'order' => 5],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}

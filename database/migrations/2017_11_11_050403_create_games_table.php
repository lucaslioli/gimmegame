<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Game;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->longText('rules');
            $table->integer('minimum_age')->unsigned();
            $table->integer('minimum_number_players')->unsigned();
            $table->timestamps();
        });

        $games = [
            ['name' => 'Batalha Naval', 'description' => 'O objetivo é derrubar os barcos do adversário. O vencedor é aquele que conseguir “afundar” os barcos do adversário em primeiro lugar.', 'rules' => 'Deve construir numa folha uma grelha que vai ser o seu campo de jogo e uma grelha que representa o campo de jogo do adversário. O outro jogador deverá fazer exatamente o mesmo. As grelhas são quadradas e identificadas horizontalmente por números e verticalmente por letras. Na grelha de cada jogador devem ser colocados os barcos e os “tiros” do adversário. Na grelha que representa o campo do oponente, devem ser registados os “palpites/tiros” do jogador e os barcos que eventualmente foram atingidos.
            Início do Jogo:
            Cada jogador deverá colocar os seus barcos nos quadrados da grelha e estes devem estar alinhados na horizontal ou vertical. Os barcos utilizados são:
            
            Porta-aviões (cinco quadrados adjacentes em forma de sete)
            Submarinos (um quadrado)
            Barcos de 2, 3 e 4 canos (com 2, 3 e 4 quadrados respetivamente)
            O número total de barcos é igual para cada jogador e os mesmos não se devem sobrepor. O jogo começa quando um jogador diz uma determinada coordenada da grelha e o adversário responde se este acertou num barco ou se o “tiro” foi parar à água. Se acertar num barco, o quadrado deverá ser assinalado com a cor vermelha; se acertar na água, o quadrado deverá ser pintado de azul.', 'minimum_age' => 5, 'minimum_number_players' => 2],
            
            ['name' => 'Jogo da Forca', 'description' => 'O objetivo do jogo é descobrir a palavra pensada e escolhida pelo adversário.', 'rules' => 'O jogador encarregue de escolher a palavra deverá anunciar a categoria onde ela se insere e desenhar traços que correspondem a cada letra da palavra. O outro jogador deverá tentar adivinhar as letras que se encontram na palavra selecionada. Se acertar, a letra deve ser colocada no espaço correspondente; caso a palavra não tenha a letra indicada, deve ser desenhada uma parte do corpo de um enforcado. O vencedor do jogo é aquele que conseguir descobrir mais palavras.', 'minimum_age' => 3, 'minimum_number_players' => 2],
            
            ['name' => 'Jogo do Stop', 'description' => 'O jogo do stop é um game onde a rapidez e a memória são os seus melhores aliados e permite muitas horas de diversão entre amigos e/ou familiares.', 'rules' => 'Cada jogador deve escrever numa folha as várias categorias que pretendem testar, como por exemplo, nomes, países, cidades, frutos, animais objetos, entre outros. Depois, um jogador deve dizer o abecedário em silêncio, ao passo que o outro o manda parar, ao dizer “stop”. A letra sorteada é aquela pela qual todas as categorias anteriormente definidas devem começar. Em seguida, todos os players devem preencher todas as colunas o mais rápido possível e o primeiro a terminar deve dizer novamente “stop” para ganhar vantagem sobre quem não tenha completado todos os campos.', 'minimum_age' => 10, 'minimum_number_players' => 2],
            
            ['name' => 'Quem sou eu?', 'description' => 'Este é um jogo de tabuleiro que também pode ser jogado apenas com um lápis e uma folha de papel.', 'rules' => 'Cada jogador deve escrever num papel o nome de uma figura conhecida de todos os elementos do grupo sem que os restantes jogadores vejam. Depois, devem trocar de papéis entre si e mostrá-los aos restantes jogadores sem terem visto o seu. Por conseguinte, à vez, devem ser feitas perguntas de resposta afirmativa (sim) ou negativa (não), como por exemplo, “É uma mulher?”. O vencedor é o jogador que adivinhar a pessoa que está escrita no papel.', 'minimum_age' => 3, 'minimum_number_players' => 2],
            
            ['name' => 'Bisca', 'description' => 'A Bisca (ou menos conhecido como bíscola) é um jogo de cartas que utiliza-se do baralho espanhol (de 40 cartas), cujo principal objetivo é acumular mais pontos que o adversário, baseando-se nas cartas que são pescadas e descartadas.', 'rules' => 'Após embaralhar e cortar, é retirada uma carta do baralho, cujo naipe determinará o “trunfo” (ou bisca). Trunfo é o naipe que vai predominar sobre os outros naipes, quando as cartas dascartadas forem recolhidas.
            
            Durante o jogo, a carta “trunfo” fica embaixo do baralho, mas de maneira visível. Essa carta pode ser trocada pelo “7″, do mesmo naipe, se for de maior valor (em algumas regiões, diz-se que o “7″ pode ser trocado pelo “2″ de mesmo naipe).
            
            O jogador que cortou o baralho começa descartando uma carta, das 3 que recebe no início do jogo. Em seguida o adversário descarta uma de suas cartas, que vai determinar se ele pega ou entrega as cartas da mesa, baseando-se nos seguintes critérios:
            
            se as cartas são do mesmo naipe, a carta de maior valor(ou maior numero para cartas sem valor de contagem) vence, e o quem a jogou leva as cartas da mesa.
            se as cartas são de naipes diferentes e não há um “trunfo” entre elas, quem jogou a primeira carta leva as cartas da mesa.
            se as cartas são de naipes diferentes e há um “trunfo” entre elas, quem jogou o trunfo leva as cartas da mesa.
            se as todas as cartas são trunfos, a decisão é como o primeiro critério.
            Após serem recolhidas as cartas (cada jogador tem 2 cartas na mão, nesse momento), os jogadores pegam uma nova carta no baralho (primeiro o jogador que levou as cartas da mesa) e isso se repete até que se terminem as cartas do baralho.
            
            O valor de cada carta é definido assim:
            
            Áses: 11 pontos cada
            Todos os “5″: 10 pontos cada (ver nota)
            Todos os “12″ ou reis: 4 pontos cada
            Todos os “11″ ou cavalos: 3 pontos cada
            Todos os “10″ ou valetes: 2 pontos cada
            Demais cartas: não têm valor de contagem
            Nota: Em algumas regiões, os “3″ tem valor 10 ao invés dos “5″, sem explicação aparente.
            
            Ao final do jogo, contam-se os pontos somando-se as cartas obtidas. Como a pontuação máxima é 120 pontos, um jogador que acumular 60 ou mais pontos antes do jogo terminar já é o vencedor.
            
            A bisca pode ser jogada em duplas, onde cada jogador fica de frente para o seu par. No jogo de duplas, é comum que cada jogador mostre suas cartas ao parceiro na ultima rodada.', 'minimum_age' => 10, 'minimum_number_players' => 2],
            
            ['name' => 'Pife (Pif Paf)', 'description' => 'O objetivo é fazer trincas e/ou sequências para bater.', 'rules' => 'Definições
            Trinca - três cartas do mesmo valor e de naipes diferentes, sendo que os jogadores poderão agregar uma ou duas cartas do mesmo valor, desde que seja dobrada (do mesmo naipe). Exemplo: 5 de Copas, 5 de Paus, 5 de Ouros e outro 5 de Ouros.
            Sequência - três ou mais cartas seguidas, do mesmo naipe). O Ás, nas sequências, pode servir acima do Rei ou abaixo do Dois.
            Rodada - uma sequência de jogadas que ocorre até que algum jogador bata.
            Bater - combinar e baixar as nove cartas ou as 10 cartas (as nove que recebeu mais a da compra), formando trincas e/ou sequências.
            Ordem das cartas (da menor para maior): A, 2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K.
            Maço - é o bolo de cartas que sobra após a distribuição.
            Lixeira - é o bolo formado com as cartas descartadas, onde apenas a última carta é visível.
            Após a distribuição das cartas o primeiro jogador compra uma carta do maço, tenta formar jogos e se possível bater. Descarta uma carta dando início a lixeira. Quando o jogador descarta uma carta, a vez é passada ao jogador seguinte, seguindo o sentido horário. O jogador seguinte poderá comprar do maço ou comprar a última carta descartada na lixeira. A partida termina quando alguém bate. Um jogador pode bater com 9 ou 10 cartas. Quando bate com 9 ele descarta uma carta, e quando bate com 10 não descarta nada.
            Vencedor: É o vencedor o jogador que bater.', 'minimum_age' => 10, 'minimum_number_players' => 2]
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}

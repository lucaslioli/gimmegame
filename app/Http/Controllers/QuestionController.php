<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Game;
use App\Question;
use App\Category;
use App\Object;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getQuestions()
    {
        $count = DB::table('questions')
        ->selectRaw('count(distinct questions.order) as qtd')
        ->first();
        
        $randomQuestions = [];
        for ($i=0; $i < $count->qtd; $i++) { 
            array_push($randomQuestions, DB::table('questions')
            ->where('questions.order', $i)
            ->inRandomOrder()
            ->first());
        }
        
        $ageRange = ['Livre', 'Até 05', 'Até 10', 'Até 12', 'Até 14', 'Até 16', 'Mais de 18'];
        $numPlayers = ['2', '3', '4', '5', '6', '+6'];
        $categories = Category::all()->pluck('name')->toArray();
        $objects = Object::all()->pluck('name')->toArray();

        $questions = [
            ['description' => $randomQuestions[0]->description],
            ['description' => $randomQuestions[2]->description, 'possibilities' =>  $ageRange],
            ['description' => $randomQuestions[1]->description, 'possibilities' => $numPlayers],
            ['description' => $randomQuestions[3]->description, 'possibilities' => $categories],
            ['description' => $randomQuestions[4]->description, 'possibilities' => $objects],
        ];


        return response()->json($questions);
    }

    /**
     * Return the recommended games
     *
     * @return \Illuminate\Http\Response
     */
    public function getGames(Request $request)
    {
        // 'fields' => [
        //     ['minimum_age' => "5"],
        //     ['minimum_number_players' => "2"],
        //     ['categories' => ['Cartas', 'Sorte']],
        //     ['objects' => ['Caneta e Papel', 'Baralho']],
        // ]

        $answers = $request->input();
        // dd($answers);

        if($answers['minimum_age'] == "Livre")
            $answers['minimum_age'] = 0;
        else
            $answers['minimum_age'] = intval(substr($answers['minimum_age'], -2));

        $answers['minimum_number_players'] = intval(substr($answers['minimum_number_players'], -1));

        $answers['categories'] = explode(',', $answers['categories']);
        $answers['objects'] = explode(',', $answers['objects']);

        $cat = "AND (";
        foreach($answers['categories'] as $cate){
            $cat .= "c.name = '".$cate."' OR ";
        }
        $cat .= "c.name = '')";

        $obj = "AND (";
        foreach($answers['objects'] as $obje){
            $obj .= "o.name = '".$obje."' OR ";
        }
        $obj .= "o.name = '')";

        // DB::connection()->enableQueryLog();

        $games = DB::select(DB::raw("SELECT g.*
            FROM games g
                JOIN category_game cg on g.id = cg.game_id
                JOIN categories c on cg.category_id = c.id
                JOIN game_object og on g.id = og.game_id
                JOIN objects o on og.object_id = o.id
            WHERE g.minimum_age <= $answers[minimum_age]
                AND g.minimum_number_players <= $answers[minimum_number_players]
                $cat $obj"));

        // dd(DB::getQueryLog());
        
        return response()->json($games);
        
    }
}

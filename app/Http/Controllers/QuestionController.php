<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Question;
use App\Category;
use App\Object;

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
        
        $ageRange = ['Livre', 'Até 5', 'Até 10', 'Até 12', 'Até 14', 'Até 16', '18 ou mais'];
        $numPlayers = ['2', '3', '4', '5', '6', '6+'];
        $categories = Category::all()->pluck('name')->toArray();
        $objects = Object::all()->pluck('name')->toArray();

        $questions = [
            ['description' => $randomQuestions[0]->description],
            ['description' => $randomQuestions[2]->description, 'possibilities' =>  $ageRange],
            ['description' => $randomQuestions[1]->description, 'possibilities' => $numPlayers],
            ['description' => $randomQuestions[3]->description, 'possibilities' => $categories],
            ['description' => $randomQuestions[4]->description, 'possibilities' => $objects],
            ['description' => $randomQuestions[5]->description],
        ];


        return response()->json($questions);
    }
}

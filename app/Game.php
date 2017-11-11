<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Object;
use App\Category;

class Game extends Model
{
    /**
     * Atributos não mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function objects(){
        return $this->belongsToMany(Object::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}

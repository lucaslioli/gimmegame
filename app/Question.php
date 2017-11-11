<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Atributos não mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}

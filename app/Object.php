<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    /**
     * Atributos não mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}

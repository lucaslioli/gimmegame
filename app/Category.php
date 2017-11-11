<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Atributos não mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Nome da tabela associada com a model.
     *
     * @var string
     */
    protected $table = 'categories';
}

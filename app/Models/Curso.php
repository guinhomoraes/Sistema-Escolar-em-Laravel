<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "curso";
    protected $fillable = ['nome','descricao','status','dt_cadastro',
                           'observacao','preco'];
}

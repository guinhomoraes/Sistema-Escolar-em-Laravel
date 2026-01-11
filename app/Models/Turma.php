<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;

class Turma extends Model
{
    protected $table = "turma";
    protected $fillable = ['nome','descricao','dt_inicio','dt_termino','status',
    'observacao','id_professor','id_escola'];

    public function escola()
    {
        return $this->belongsTo(Escola::class,'id_escola','id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class,'id_professor','id');
    }
}


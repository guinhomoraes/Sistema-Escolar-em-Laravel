<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = "professor";
    protected $fillable = ['id_usuario','id_escola','registro','salario','status','data_cadastro',
                        'observacao','telefone'];

    public function usuario()
    {
        return $this->belongsTo(User::class,'id_usuario','id');
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class,'id_escola','id');
    }
}

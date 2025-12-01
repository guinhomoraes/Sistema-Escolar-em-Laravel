<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $table = "escola";
    protected $fillable = ['razao_social','nome_fantasia','codigo_escola','cnpj','endereco',
                          'complemento','bairro','cidade','estado','telefone','status','observacao',
                          'data_inauguracao'];
}

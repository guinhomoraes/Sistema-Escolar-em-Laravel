<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSearch extends Model
{
    protected $table = "users";
    protected $fillable = [
        'name',
        'email',
        'password',
        'rg','cpf','endereco','complemento','bairro','cidade','estado',
        'telefone','status','observacao'
    ];

}

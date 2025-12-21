<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Escola;
use App\Models\Cargo;

class Administrativo extends Model
{
    protected $table = "administrativo";
    protected $fillable = ['id_usuario','id_escola','id_cargo'];

    public function usuario()
    {
        return $this->belongsTo(User::class,'id_usuario','id');
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class,'id_escola','id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class,'id_cargo','id');
    }
}

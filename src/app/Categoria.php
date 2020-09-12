<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nome'
    ];

//    public function quartos()
//    {
//        return $this->hasMany('App\Quarto');
//    }
//
//    public function reservas()
//    {
//        return $this->hasManyThrough('App\Reserva', 'App\Quarto');
//    }
}

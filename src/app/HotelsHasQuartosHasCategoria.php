<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelsHasQuartosHasCategoria extends Model
{
    protected $fillable = [
        'quantidade', 'valor', 'hotel_id', 'quarto_id', 'categoria_id'
    ];

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    public function quarto()
    {
        return $this->belongsTo('App\Quarto');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}

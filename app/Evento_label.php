<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento_label extends Model
{
    protected $guarded = [];

    public function evento(){
        return $this->belongsTo(Evento::class, 'id_evento', 'id');
    }
}


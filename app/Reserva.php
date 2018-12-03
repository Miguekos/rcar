<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $guarded = array();

    public function promo_id(){
        return $this->belongsTo(Promo::class);
    }
}

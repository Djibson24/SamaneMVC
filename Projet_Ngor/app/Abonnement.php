<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use carbon\Carbon;

class Abonnement extends Model
{
    public $table = "abonnement";
   //pour convertir le format date
   /* public function setDateAttribute($value){
        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
    }*/
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactperson extends Model
{
    public function customers(){
        return $this->belongsTo('App\Customer');
    }

}

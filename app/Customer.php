<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function contactPersons() {
        return $this->hasMany('App\Contactperson');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spareparts extends Model
{
    public function machines(){
        return $this->belongsToMany(Machine::class);
    }
}

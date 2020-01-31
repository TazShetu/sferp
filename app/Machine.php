<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public function spareparts(){
        return $this->belongsToMany(Spareparts::class);
    }

}

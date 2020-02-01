<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    public function warehouse() {
        return $this->belongsTo('App\Warehouse');
    }
    public function rooms() {
        return $this->hasMany('App\Room');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    public function warehouse() {
        return $this->belongsTo('App\Warehouse');
    }
    public function floor() {
        return $this->belongsTo('App\Floor');
    }
}

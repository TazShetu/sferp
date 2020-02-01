<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    public function sroom() {
        return $this->belongsTo(Sroom::class);
    }

    public function racks() {
        return $this->hasMany(Rack::class);
    }
}

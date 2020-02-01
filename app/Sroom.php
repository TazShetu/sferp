<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sroom extends Model
{
    public function rows() {
        return $this->hasMany(Row::class);
    }

    public function racks() {
        return $this->hasMany(Rack::class);
    }
}

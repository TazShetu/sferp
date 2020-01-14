<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public function floors() {
        return $this->hasMany('App\Floor');
    }

    public function rooms() {
        return $this->hasMany('App\Room');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    public function sroom() {
        return $this->belongsTo(Sroom::class);
    }
    public function row() {
        return $this->belongsTo(Row::class);
    }
}

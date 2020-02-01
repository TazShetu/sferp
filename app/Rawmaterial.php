<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawmaterial extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}

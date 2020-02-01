<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function rawMaterials(){
        return $this->belongsToMany(Rawmaterial::class);
    }

}

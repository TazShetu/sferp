<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function designation(){
        return $this->belongsTo('App\Designation');
    }

    public function factories(){
        return $this->belongsToMany('App\Factory');
    }


}

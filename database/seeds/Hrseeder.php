<?php

use Illuminate\Database\Seeder;
use App\Designation;

class Hrseeder extends Seeder
{

    public function run()
    {
        $d = new Designation;
        $d->title = 'Worker';
        $d->save();
    }
}

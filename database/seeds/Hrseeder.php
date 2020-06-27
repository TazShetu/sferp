<?php

use Illuminate\Database\Seeder;
use App\Designation;
use App\Employee;

class Hrseeder extends Seeder
{

    public function run()
    {
        $d = new Designation;
        $d->title = 'Worker';
        $d->save();

        $e = new Employee;
        $e->designation_id = '1';
        $e->name = 'Sample Name';
        $e->mobile = '01711456325';
        $e->save();

    }
}

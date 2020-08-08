<?php

use Illuminate\Database\Seeder;
use App\Designation;
use App\Employee;
use App\Employeetype;

class Hrseeder extends Seeder
{

    public function run()
    {
        // can not change the order of employee types
        $ts = ['Staffs', 'Workers', 'Technicians', 'Electricians', 'Security Guard'];

        foreach ($ts as $type){
            $t = new Employeetype;
            $t->title = $type;
            $t->save();
        }


        $d = new Designation;
        $d->employeetype_id = 1;
        $d->title = 'Manager';
        $d->save();

//        $e = new Employee;
//        $e->designation_id = '1';
//        $e->name = 'Sample Name';
//        $e->mobile = '01711456325';
//        $e->save();

    }
}

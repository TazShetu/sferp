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
        $d->code = 'SM';
        $d->save();

        $e = new Employee;
        $e->employeetype_id = '1';
        $e->designation_id = '1';
        $e->doj = '2020-09-03';
        $e->name = 'Sample Name';
        $e->code = 'SFNISFNI2SM1';
        $e->save();
        $e->factories()->attach(1);

    }
}

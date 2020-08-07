<?php

use Illuminate\Database\Seeder;
use App\Machine;

class MachinesTableSeeder extends Seeder
{

    public function run()
    {
        $f = new Machine;
        $f->identification_code = '123xxx456qqq';
        $f->category = 'Rope Machine';
        $f->factory_id = '1';
        $f->manufacturer = 'Simense';
        $f->tag = 'Simense Rope;.;Machine';
        $f->manufacture_year = '1990';
        $f->manufacture_country = 'Germany';
        $f->type = 'A++ Energy Saving';
        $f->save();


        $f = new Machine;
        $f->category = 'Rope Machine 2';
        $f->factory_id = '2';
        $f->manufacturer = 'Simense';
        $f->tag = 'Simense Rope;.;Machine;.;2';
        $f->manufacture_country = 'Germany';
        $f->save();
        $f = new Machine;
        $f->category = 'Rope Machine 20';
        $f->factory_id = '2';
        $f->manufacturer = 'Simense';
        $f->tag = 'Simense Rope;.;Machine;.;20';
        $f->manufacture_country = 'Germany';
        $f->save();
    }
}

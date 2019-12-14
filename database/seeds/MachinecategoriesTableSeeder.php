<?php

use Illuminate\Database\Seeder;
use App\Machinecategory;

class MachinecategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $mcs = [
            0 => ['Fishing Net Machine'],
            1 => ['Rope Making Machine'],
            3 => ['Twisting Machine'],
            4 => ['Extruder'],
        ];
        foreach ($mcs as $mc){
            $m = new Machinecategory;
            $m->name = $mc[0];
            $m->save();
        }
    }
}

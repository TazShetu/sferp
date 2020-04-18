<?php

use Illuminate\Database\Seeder;
use App\Rawmaterial;

class RawmaterialsTableSeeder extends Seeder
{

    public function run()
    {
        $r = new Rawmaterial;
        $r->type = 'Type 1';
        $r->manufacturer = 'Bosch';
        $r->country_origin = 'Germany';
        $r->grade_number = 'g1';
        $r->auto_id = 'Type 1_Bosch_g1';
        $r->minimum_storage = '23';
        $r->unit = 'Kg';
        $r->save();
        $r = new Rawmaterial;
        $r->type = 'Type 2';
        $r->manufacturer = 'Bosch';
        $r->country_origin = 'Germany';
        $r->grade_number = 'g2';
        $r->auto_id = 'Type 2_Bosch_g2';
        $r->minimum_storage = '30';
        $r->unit = 'Litre';
        $r->save();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Spareparts;

class SparepartsTableSeeder extends Seeder
{

    public function run()
    {
        $s = new Spareparts;
        $s->manufacturer = 'Siemens';
        $s->model = 'Model 1';
        $s->type = 'Type 1';
        $s->description = 'Siemens_Model 1_Type 1';
        $s->part_number = 'NA';
        $s->identity_number = 'NA';
        $s->code_number = 'NA';
        $s->minimum_storage = '20';
        $s->unit = 'Kg';
        $s->save();
        $s = new Spareparts;
        $s->manufacturer = 'Siemens';
        $s->model = 'Model 2';
        $s->type = 'Type 2';
        $s->description = 'Siemens_Model 2_Type 2';
        $s->part_number = 'NA';
        $s->identity_number = 'NA';
        $s->code_number = 'NA';
        $s->minimum_storage = '5';
        $s->unit = 'Litre';
        $s->save();
    }
}

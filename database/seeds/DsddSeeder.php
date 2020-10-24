<?php

use Illuminate\Database\Seeder;
use App\Bankaccount;

class DsddSeeder extends Seeder
{

    public function run()
    {
        $ba = new Bankaccount;
        $ba->name = 'Test Bank';
        $ba->ac_name = 'Test A/C name';
        $ba->ac_number = 'Test A/C number';
        $ba->save();
    }
}

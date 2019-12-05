<?php

use Illuminate\Database\Seeder;
use App\Customertype;

class CustomertypesTableSeeder extends Seeder
{

    public function run()
    {
        $cuctomerTypes = [
            0 => ['Dealer'],
            1 => ['Sub Dealer'],
            2 => ['Individual'],
        ];
        foreach ($cuctomerTypes as $c){
            $ct = new Customertype;
            $ct->title = $c[0];
            $ct->save();
        }
    }
}

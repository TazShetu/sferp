<?php

use Illuminate\Database\Seeder;
use App\Factory;

class FactoriesTableSeeder extends Seeder
{
    public function run()
    {
        $f = new Factory;
        $f->name = 'Sagar Fishing Net Industries (Pvt.) Ltd.';
        $f->address = 'Shakhari Bazar, Rampal, Munshiganj';
        $f->established_date = '1984-11-26';
        $f->save();

    }
}
<?php

use Illuminate\Database\Seeder;
use App\DailySheet;

class DailySheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ds = new DailySheet;
        $ds->date = '2021-06-11';
        $ds->opening_balance = 0;
        $ds->save();
    }
}

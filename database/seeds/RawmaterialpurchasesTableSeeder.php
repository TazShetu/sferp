<?php

use Illuminate\Database\Seeder;
use App\Rawmaterialpurchase;
use App\Warehouse;
use App\Rawmaterialstore;
use App\Rawmaterialstock;


class RawmaterialpurchasesTableSeeder extends Seeder
{

    public function run()
    {
        $w = new Warehouse;
        $w->name = 'Warehouse 1';
        $w->save();

        $rp = new Rawmaterialpurchase;
        $rp->rawmaterial_id = '1';
        $rp->invoice_date = '2020-04-20';
        $rp->invoice_number = 'I987654';
        $rp->description = 'NA';
        $rp->hs_code = 'NA';
        $rp->quantity = '60';
        $rp->unit = 'Kg';
        $rp->cnf_dhaka = '1';
        $rp->price_per_unit = '1';
        $rp->currency = '$';
        $rp->total_price = '1';
        $rp->purchase_from = 'Rahim';
        $rp->indented_date = '2020-03-27';
        $rp->indented_by = 'Karim';
        $rp->imported_by = 'Sagar Fishing';
        $rp->lc_number = 'LC987654';
        $rp->port_of_landing = 'Dhaka';
        $rp->user_id = '2';
        $rp->save();

        $rs = new Rawmaterialstore;
        $rs->rawmaterial_id = '1';
        $rs->quantity = '60';
        $rs->warehouse_id = '1';
        $rs->user_id = '2';
        $rs->save();

        $rms = new Rawmaterialstock;
        $rms->rawmaterial_id = '1';
        $rms->quantity = '60';
        $rms->warehouse_id = '1';
        $rms->save();

    }
}

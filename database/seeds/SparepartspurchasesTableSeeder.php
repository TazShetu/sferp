<?php

use Illuminate\Database\Seeder;
use App\Sparepartspurchase;
use App\Sroom;
use App\Sparepartsstore;
use App\Sparepartsstock;

class SparepartspurchasesTableSeeder extends Seeder
{

    public function run()
    {
        $sr = new Sroom;
        $sr->name = 'Sroom 1';
        $sr->save();

        $sp = new Sparepartspurchase;
        $sp->spareparts_id = '1';
        $sp->quantity = '36';
        $sp->unit = 'Kg';
        $sp->country_origin = 'Germany';
        $sp->country_purchase = 'Bangladesh';
        $sp->manufacture_year = '2019';
        $sp->currency = '$';
        $sp->unit_price = '1';
        $sp->unit_price_cnf = '1';
        $sp->unit_price_fob = '1';
        $sp->cnf_price_dhaka = '1';
        $sp->total_price = '1';
        $sp->purchase_date = '2020-04-20';
        $sp->arrival_date = '2020-05-20';
        $sp->shipped_by = 'Local';
        $sp->invoice_number = 'Invoice 123456';
        $sp->lc_number = 'LC 123456';
        $sp->note = 'NA';
        $sp->user_id = '2';
        $sp->status = 'stored';
        $sp->receive_user_id = '2';
        $sp->save();

        $ss = new Sparepartsstore;
        $ss->spareparts_id = '1';
        $ss->quantity = '36';
        $ss->sroom_id = '1';
        $ss->user_id = '2';
        $ss->save();

        $sk = new Sparepartsstock;
        $sk->spareparts_id = '1';
        $sk->quantity = '36';
        $sk->sroom_id = '1';
        $sk->save();

    }
}

<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomersTableSeeder extends Seeder
{

    public function run()
    {
        $c = new Customer;
        $c->name = 'John Doe';
        $c->dob = '1984-11-26';
        $c->company_name = 'Doe Enterprise';
        $c->nid = '0123456789';
        $c->bin = 'xx01255xx255xxx0';
        $c->business_address = 'Mohakhali, Dhaka';
        $c->business_area = 'Mohakhali';
        $c->business_telephone = '+8802152635';
        $c->business_email = 'johndoe@gmail.com';
        $c->type = 'Sub Dealer';
        $c->company_site = 'www.johndoe.com';
        $c->save();
    }
}

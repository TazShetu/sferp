<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomersTableSeeder extends Seeder
{

    public function run()
    {
        $c1 = new Customer;
        $c1->name = 'John Doe';
        $c1->dob = '1984-11-26';
        $c1->company_name = 'Doe Enterprise';
        $c1->nid = '0123456789';
        $c1->bin = 'xx01255xx255xxx0';
        $c1->tin = '00012xx55xx2x0';
        $c1->business_address = 'Mohakhali, Dhaka';
        $c1->business_area = 'Mohakhali';
        $c1->business_telephone = '+8802152635';
        $c1->business_email = 'johndoe@gmail.com';
        $c1->customertype_id = '1';
        $c1->company_site = 'www.johndoe.com';
        $c1->save();

        $c2 = new Customer;
        $c2->name = 'John Doe Sub';
        $c2->dob = '1984-11-26';
        $c2->company_name = 'Doe Enterprise Sub';
        $c2->nid = '0123456789';
        $c2->bin = 'xx01255xx255xxx0';
        $c2->tin = '00012xx55xx2x0';
        $c2->business_address = 'Mohakhali, Dhaka';
        $c2->business_area = 'Mohakhali';
        $c2->business_telephone = '+8802152635';
        $c2->business_email = 'johndoe@gmail.com';
        $c2->customertype_id = '2';
        $c2->company_site = 'www.johndoe.com';
        $c2->save();

        $c3 = new Customer;
        $c3->name = 'John Doe Individual';
        $c3->dob = '1984-11-26';
        $c3->company_name = 'Doe Enterprise Individual';
        $c3->nid = '0123456789';
        $c3->bin = 'xx01255xx255xxx0';
        $c3->tin = '00012xx55xx2x0';
        $c3->business_address = 'Mohakhali, Dhaka';
        $c3->business_area = 'Mohakhali';
        $c3->business_telephone = '+8802152635';
        $c3->business_email = 'johndoe@gmail.com';
        $c3->customertype_id = '3';
        $c3->company_site = 'www.johndoe.com';
        $c3->save();


        $c2 = new Customer;
        $c2->name = 'John Doe Sub 2';
        $c2->dob = '1984-11-26';
        $c2->company_name = 'Doe Enterprise Sub 2';
        $c2->nid = '0123456789';
        $c2->bin = 'xx01255xx255xxx0';
        $c2->tin = '00012xx55xx2x0';
        $c2->business_address = 'Mohakhali, Dhaka';
        $c2->business_area = 'Mohakhali';
        $c2->business_telephone = '+8802152635';
        $c2->business_email = 'johndoe@gmail.com';
        $c2->customertype_id = '2';
        $c2->company_site = 'www.johndoe.com';
        $c2->save();


        $c3 = new Customer;
        $c3->name = 'John Doe Individual 2';
        $c3->dob = '1984-11-26';
        $c3->company_name = 'Doe Enterprise Individual 2';
        $c3->nid = '0123456789';
        $c3->bin = 'xx01255xx255xxx0';
        $c3->tin = '00012xx55xx2x0';
        $c3->business_address = 'Mohakhali, Dhaka';
        $c3->business_area = 'Mohakhali';
        $c3->business_telephone = '+8802152635';
        $c3->business_email = 'johndoe@gmail.com';
        $c3->customertype_id = '3';
        $c3->company_site = 'www.johndoe.com';
        $c3->save();

    }
}

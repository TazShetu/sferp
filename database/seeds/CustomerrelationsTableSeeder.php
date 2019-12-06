<?php

use Illuminate\Database\Seeder;
use App\Customerrelation;

class CustomerrelationsTableSeeder extends Seeder
{

    public function run()
    {
        $cr1 = new Customerrelation;
        $cr1->parent_id = 1;
        $cr1->parent_type_id = 1;
        $cr1->child_id = 2;
        $cr1->child_type_id = 2;
        $cr1->save();

        $cr2 = new Customerrelation;
        $cr2->parent_id = 1;
        $cr2->parent_type_id = 1;
        $cr2->child_id = 3;
        $cr2->child_type_id = 3;
        $cr2->save();

        $cr3 = new Customerrelation;
        $cr3->parent_id = 2;
        $cr3->parent_type_id = 2;
        $cr3->child_id = 3;
        $cr3->child_type_id = 3;
        $cr3->save();
    }
}

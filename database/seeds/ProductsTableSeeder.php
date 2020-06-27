<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Producttype;

class ProductsTableSeeder extends Seeder
{

    public function run()
    {
        // can not change the order of Product type
        $pts = ["Twin",
                "Daline",
                "DP Rope",
                "Raschel/Knotless Net",
                "Fishing Net",
                "Chemicals",
                "Nylon Chips",
                "Polypropylene Chips",
                "High Density Polythylene Chips",
        ];
        foreach ($pts as $pt){
            $p = new Producttype;
            $p->name = $pt;
            $p->save();
        }



        $p1 = new Product;
        $p1->identification = 'Twine_Nylon_Multi_1';
        $p1->producttype_id = '1';
        $p1->name = 'Nylon Multifilament';
        $p1->size_denier = '1';
        $p1->plys = '1';
        $p1->unit = 'kg';
        $p1->minimum_storage = '1';
        $p1->save();

        $p2 = new Product;
        $p2->identification = 'Twine_Nylon_Mono_1';
        $p2->producttype_id = '1';
        $p2->name = 'Nylon Monomulti';
        $p2->size_mm = '1';
        $p2->plys = '1';
        $p2->unit = 'kg';
        $p2->minimum_storage = '1';
        $p2->save();


        $p3 = new Product;
        $p3->identification = 'Danline_Rope_3sc';
        $p3->producttype_id = '2';
        $p3->name = 'Danline Rope';
        $p3->size_mm = '1';
        $p3->strand = '3';
        $p3->coil_type = 'Coil';
        $p3->unit = 'kg';
        $p3->minimum_storage = '1';
        $p3->save();


    }
}

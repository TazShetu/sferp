<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Producttype;
use App\Productname;

class ProductsTableSeeder extends Seeder
{

    public function run()
    {
        // can not change the order of Product type
        $pts = [
            0 => ["Twin", 'Twine (সুতা)'],
            1 => ["Daline", 'Danline'],
            2 => ["DP Rope", 'PP Rope'],
            3 => ["Raschel/Knotless Net", 'Raschel/Knotless Net'],
            4 => ["Fishing Net", 'Fishing Net'],
            5 => ["Chemicals", 'Chemicals'],
            6 => ["Nylon Chips", 'Nylon Chips'],
            7 => ["Polypropylene Chips", 'Polypropylene Chips'],
            8 => ["High Density Polythylene Chips", 'High Density Polythylene Chips'],
        ];
        foreach ($pts as $pt) {
            $p = new Producttype;
            $p->name = $pt[0];
            $p->display_name = $pt[1];
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

        // can not change class
        $pns = [
            0 => ['Nylon Multifilament', 'Nylon Multifilament', 'tid1'],
            1 => ['Nylon Monomulti', 'Nylon Mono-multi', 'tid1'],
            2 => ['Danline Rope', 'Danline Rope (সাগর পাতা)', 'tid2'],
            3 => ['Hanks D', 'Hanks D (হেংস D)', 'tid2'],
            4 => ['Rong Pata', 'Rong Pata (রং পাতা)', 'tid3'],
            5 => ['White Knotless', 'White Knotless', 'tid4'],
            6 => ['Green HDPE Knotless', 'Green HDPE Knotless', 'tid4'],
            7 => ['Black HDPE Knotless', 'Black HDPE Knotless', 'tid4'],
            8 => ['Nylon Multifilament Fishingnet', 'Nylon Multifilament Fishingnet', 'tid5'],
            9 => ['Nylon Mono Multi Fishingnet', 'Nylon Mono-multi Fishingnet', 'tid5'],
            10 => ['HT Fishingnet', 'HT Fishingnet', 'tid5'],
            11 => ['HDPE Fishingnet', 'HDPE Fishingnet', 'tid5'],
//            12 => ['HDPE Cage Net', 'HDPE Cage Net', 'tid5'],
            13 => ['HDPE Trap Net', 'HDPE Trap Net', 'tid5'],
        ];


        foreach ($pns as $pn) {
            $p = new Productname;
            $p->name = $pn[0];
            $p->display_name = $pn[1];
            $p->type_class = $pn[2];
            $p->save();
        }


    }
}

<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{

    public function run()
    {
        $ps = [
            0 => ["permission", "Permission", "Permission menu that goes under Access Control"],
            1 => ["role", "Role", "Role menu that goes under Access Control"],
            2 => ["user", "User", "User menu that goes under Access Control"],
            3 => ["user_permission", "User_Permission", "User Permission menu that goes under Access Control"],
            4 => ["customer", "Customer", "Customer menu"],
            5 => ["factory", "Factory", "Factory menu"],
            6 => ["machine", "Machine", "Machine menu"],
            7 => ["spare_parts", "Spare Parts", "Spare Parts menu"],
            8 => ["raw_material", "Raw Material", "Raw Material menu"],
            9 => ["product", "Product", "Product menu"],
            10 => ["ware_house", "Ware House", "Ware House menu"],
            11 => ["sparepart_room", "Spare Part Room", "Spare Part Room menu"],
            12 => ["sparepart_purchase", "Spare Part Purchase", "Spare Part Purchase menu"],
            13 => ["raw_material_purchase", "Raw Material Purchase", "Raw Material Purchase menu"],
            14 => ["sparepart_receive", "Spare Part Receive", "Spare Part Receive under Purchase menu"],
            15 => ["raw_material_receive", "Raw Material Receive", "Raw Material Receive under Purchase menu"],
            16 => ["sparepart_stock", "Spare Part Stock", "Spare Part Stock under Purchase menu"],
            17 => ["raw_material_stock", "Raw Material Stock", "Raw Material Stock under Purchase menu"],
            18 => ["stock_out_raw_material", "Raw Material Stock Out", "Raw Material Stock Out Store"],
            19 => ["stock_in_raw_material", "Raw Material Stock In", "Raw Material Stock In Store"],
            20 => ["stock_out_spare_part", "Spare Part Stock Out", "Spare Part Stock Out Store"],
            21 => ["stock_in_spare_part", "Spare Part Stock In", "Spare Part Stock In Store"],
            22 => ["stock_out_product", "Product Stock Out", "Product Stock Out Store"],
            23 => ["stock_in_product", "Product Stock In", "Product Stock In Store"],
            24 => ["production_stock_in_raw_material", "Raw Material Stock In Production", "Raw Material Stock In Production"],
            25 => ["production_stock_out_Product", "Raw Material Stock Out Production", "Raw Material Stock Out Production"],
        ];

        $s = Role::find(1);

        foreach ($ps as $p){
            $a = new Permission;
            $a->name = $p[0];
            $a->display_name = $p[1];
            $a->description = $p[2];
            $a->save();
            $s->attachPermission($a);
        }

        $r4 = Role::find(4);
        $r4->attachPermission(5);
    }
}

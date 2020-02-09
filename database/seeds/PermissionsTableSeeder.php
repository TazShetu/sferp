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

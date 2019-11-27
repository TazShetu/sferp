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
//            4 => ["customer_create", "Customer_Create", "Customer Create menu that goes under Customer"],
//            5 => ["customer_edit", "Customer_Edit", "Customer Edit Permission"],
//            6 => ["customer_delete", "Customer_Delete", "Customer Delete Permission"],
//            7 => ["customer_list", "Customer_List", "Customer List menu that goes under Customer"],
//            8 => ["customer_profile", "Customer_Profile", "Customer Profile menu that goes under Customer"],
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
    }
}

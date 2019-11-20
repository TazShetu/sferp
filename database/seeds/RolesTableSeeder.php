<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $rs = [
            0 => ['super_admin', 'Super Admin'],
            1 => ['admin', 'Admin'],
            2 => ['no_permission', 'No Permission'],
        ];
        foreach ($rs as $r){
            $a = new Role;
            $a->name = $r[0];
            $a->display_name = $r[1];
            $a->save();
        }

        $u1 = User::find(2);
        $u1->attachRole(1);

//        $u1 = User::find(2);
//
//        $sa = new Role();
//        $sa->name = 'super_admin';
//        $sa->display_name = "Super Admin";
//        $sa->save();
//
//        $u1->attachRole($sa);

    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $u1 = User::find(2);

        $sa = new Role();
        $sa->name = 'super_admin';
        $sa->display_name = "Super Admin";
        $sa->save();

        $u1->attachRole($sa);

    }
}

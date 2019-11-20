<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $users = [
            0 => ['Dummy', 'd@g.com', '123456'],
            1 => ['Admin', 'a@g.com', '123456'],
        ];
        foreach ($users as $u){
            $a = new User;
            $a->name = $u[0];
            $a->email = $u[1];
            $a->password = bcrypt($u[2]);
            $a->save();
        }
    }
}

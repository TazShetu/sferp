<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $users = [
            0 => ['Dummy', 'd@g.com', '123456'],
            1 => ['Shagar', 'sagar@gmail.com', '123456789A'],
            2 => ['xxx', 'a1@g.com', '123456789A'],
            3 => ['xxx', 'a2@g.com', '123456789A'],
            4 => ['xxx', 'a3@g.com', '123456789A'],
            5 => ['xxx', 'a4@g.com', '123456789A'],
            6 => ['John Doe', 'john@gmail.com', '123456789A'],
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AclController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function permission()
    {
        return view('permission.index');
    }

    public function role()
    {
        return view('role.index');
    }


    public function userPermission()
    {
        return view('user.permission');
    }


}

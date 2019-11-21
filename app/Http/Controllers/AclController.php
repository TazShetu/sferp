<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class AclController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function permission()
    {
        $permissions = Permission::paginate(5);
        return view('permission.index', compact('permissions'));
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

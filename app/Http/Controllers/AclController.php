<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AclController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function permission()
    {
        if (Auth::user()->can('permission')) {
            $permissions = Permission::paginate(10);
            return view('permission.index', compact('permissions'));
        } else {
            abort(403);
        }
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

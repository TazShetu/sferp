<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        if (Auth::user()->can('role')) {
            $permissions = Permission::all();
            $roles = Role::all();
            return view('role.index', compact('permissions', 'roles'));
        } else {
            abort(403);
        }

    }


    public function roleStore(Request $request)
    {
        if (Auth::user()->can('role')) {
            $request->validate([
                'name' => 'required|unique:roles,name',
                'permissions' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $r = new Role;
                $r->name = $request->name;
                if ($request->filled('description')){
                    $r->description = $request->description;
                }
                $r->save();
                $r->attachPermissions($request->permissions);
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Role has been created successfully.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function roleEdit($rid)
    {
        if (Auth::user()->can('role')) {
            $permissions = Permission::all();
            $roles = Role::all();
            $redit = Role::find($rid);
            $pedits = $redit->permissions()->get();
            return view('role.edit', compact('permissions', 'roles', 'redit', 'pedits'));
        } else {
            abort(403);
        }
    }


    public function roleUpdate(Request $request, $rid)
    {
        if (Auth::user()->can('role')) {
            $request->validate([
                'name' => 'required',
                'permissions' => 'required',
            ]);
            $r = Role::find($rid);
            if ($r->name != $request->name){
                $request->validate(['name' => 'unique:roles,name']);
            }
            DB::beginTransaction();
            try {
                $r->name = $request->name;
                if ($request->filled('description')){
                    $r->description = $request->description;
                }
                $r->update();
                $r->syncPermissions($request->permissions);
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Role has been updated successfully.");
                return redirect()->route('role');
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function roleDelete($rid)
    {
        if (Auth::user()->can('role')) {
            $r = Role::find($rid);
            // check if any user is attached to it first /////////////////////////
            // no need to detach all permissions. delete() detach auto all permissions
            $r->delete();
            Session::flash('Success', "The Role has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function userPermission()
    {
        return view('user.permission');
    }


}

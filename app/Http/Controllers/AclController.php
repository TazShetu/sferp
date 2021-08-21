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

    public function permission()
    {
        abort_unless(Auth::user()->can('permission'), 403);
        $permissions = Permission::paginate(10);
        return view('permission.index', compact('permissions'));
    }


    public function permissionEdit($pid)
    {
        abort_unless(Auth::user()->can('permission'), 403);
        $pedit = Permission::find($pid);
        $permissions = Permission::paginate(10);
        return view('permission.edit', compact('permissions', 'pedit'));
    }


    public function permissionUpdate(Request $request, $pid)
    {
        abort_unless(Auth::user()->can('permission'), 403);
        $request->validate([
            'description' => 'required',
        ]);
        $p = Permission::find($pid);
        $p->description = $request->description;
        $p->update();
        Session::flash('Success', "The Permission description has been updated successfully.");
        return redirect()->back();
    }


    public function role()
    {
        abort_unless(Auth::user()->can('role'), 403);
        $permissions = Permission::all();
        $roles = Role::all();
        return view('role.index', compact('permissions', 'roles'));
    }


    public function roleStore(Request $request)
    {
        abort_unless(Auth::user()->can('role'), 403);
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $r = new Role;
            $r->name = $request->name;
            if ($request->filled('description')) {
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
    }


    public function roleEdit($rid)
    {
        abort_unless(Auth::user()->can('role'), 403);
        $permissions = Permission::all();
        $roles = Role::all();
        $redit = Role::find($rid);
        $pedits = $redit->permissions()->get();
        return view('role.edit', compact('permissions', 'roles', 'redit', 'pedits'));
    }


    public function roleUpdate(Request $request, $rid)
    {
        abort_unless(Auth::user()->can('role'), 403);
        $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);
        $r = Role::find($rid);
        if ($r->name != $request->name) {
            $request->validate(['name' => 'unique:roles,name']);
        }
        DB::beginTransaction();
        try {
            $r->name = $request->name;
            if ($request->filled('description')) {
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
    }


    public function roleDelete($rid)
    {
        abort_unless(Auth::user()->can('role'), 403);
        $r = Role::find($rid);
        if (count($r->users()->get()) > 0) {
            Session::flash('unsuccess', "The Role cannot be deleted as it has assigned users.");
            return redirect()->back();
        } else {
            // no need to detach all permissions. delete() detach auto all permissions (on delete cascade)
            $r->delete();
            Session::flash('Success', "The Role has been deleted successfully.");
            return redirect()->back();
        }
    }


//    public function userPermission()
//    {
//        return view('user.permission');
//    }


}

<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }


    public function user()
    {
        if (Auth::user()->can('user')) {
            $users = User::where('id', '>', 6)->get();
            $roles = Role::all();
            return view('user.index', compact('roles', 'users'));
        } else {
            abort(403);
        }
    }


    public function userStore(Request $request)
    {
        if (Auth::user()->can('user')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed',
                'roles' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $u = new User;
                $u->name = $request->name;
                $u->email = $request->email;
                $u->password = bcrypt($request->password);
                $u->save();
                $u->attachRoles($request->roles);
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The User has been created successfully.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function userEdit($uid)
    {
        if ((Auth::user()->can('user')) && (($uid * 1) > 6)) {
            $users = User::where('id', '>', 6)->get();
            $roles = Role::all();
            $uedit = User::find($uid);
            $redits = $uedit->roles()->get();
            return view('user.edit', compact('roles', 'users', 'uedit', 'redits'));
        } else {
            abort(403);
        }
    }


    public function userUpdate(Request $request, $uid)
    {
        if ((Auth::user()->can('user')) && (($uid * 1) > 6)) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'roles' => 'required',
            ]);
            if ($request->filled('password')){
                $request->validate(['password' => 'required|confirmed']);
            }
            $u = User::find($uid);
            if ($u->email != $request->email){
                $request->validate(['email' => 'unique:users,email',]);
            }
            DB::beginTransaction();
            try {
                $u->name = $request->name;
                $u->email = $request->email;
                if ($request->filled('password')){
                    $u->password = bcrypt($request->password);
                }
                $u->update();
                $u->syncRoles($request->roles);
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The User has been updated successfully.");
                return redirect()->route('users');
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->route('users');
            }
        } else {
            abort(403);
        }
    }


    public function userDelete($uid)
    {
        if ((Auth::user()->can('user')) && (($uid * 1) > 6)) {
            User::find($uid)->delete();
            Session::flash('Success', "The User has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function test()
    {
        return view('test');
    }


}

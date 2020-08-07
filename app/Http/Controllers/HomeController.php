<?php

namespace App\Http\Controllers;

use App\Product;
use App\Rawmaterial;
use App\Role;
use App\Spareparts;
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
        $n = null;
        $products = Product::all();
        $sps = Spareparts::all();
        $rms = Rawmaterial::all();
        if (compact($products) > 0){
            foreach ($products as $p) {
                $stock = DB::table('productstocks')->where('product_id', $p->id)->sum('quantity');
                if (($p->minimum_storage * 1) > $stock) {
                    $n = 1;
                    break;
                }
            }
        }
        if (($n == null) && (compact($sps) > 0)) {
            foreach ($sps as $s) {
                $ss = DB::table('sparepartsstocks')->where('spareparts_id', $s->id)->sum('quantity');
                if (($s->minimum_storage * 1) > $ss) {
                    $n = 1;
                    break;
                }
            }
        }
        if (($n == null) && (compact($rms) > 0)) {
            foreach ($rms as $r) {
                $sss = DB::table('rawmaterialstocks')->where('rawmaterial_id', $r->id)->sum('quantity');
                if (($r->minimum_storage * 1) > $sss) {
                    $n = 1;
                    break;
                }
            }
        }
        return view('home', compact('n'));
    }



    public function dashboardProduction()
    {
        return view('dashboard.production');
    }


    public function dashboardInventory()
    {
        return view('dashboard.inventory');
    }


    public function dashboardSells()
    {
        return view('dashboard.sells');
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
            if ($request->filled('password')) {
                $request->validate(['password' => 'required|confirmed']);
            }
            $u = User::find($uid);
            if ($u->email != $request->email) {
                $request->validate(['email' => 'unique:users,email',]);
            }
            DB::beginTransaction();
            try {
                $u->name = $request->name;
                $u->email = $request->email;
                if ($request->filled('password')) {
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


    public function minimumStorage()
    {
        $products = [];
        $ps = Product::all();
        $spareparts = [];
        $sps = Spareparts::all();
        $rawmaterials = [];
        $rms = Rawmaterial::all();
        foreach ($ps as $p) {
            $stock = DB::table('productstocks')->where('product_id', $p->id)->sum('quantity');
            if (($p->minimum_storage * 1) > $stock) {
                $p['stock'] = $stock;
                $products[] = $p;
            }
        }
        foreach ($sps as $s) {
            $ss = DB::table('sparepartsstocks')->where('spareparts_id', $s->id)->sum('quantity');
            if (($s->minimum_storage * 1) > $ss) {
                $s['stock'] = $ss;
                $spareparts[] = $s;
            }
        }

        foreach ($rms as $r) {
            $sss = DB::table('rawmaterialstocks')->where('rawmaterial_id', $r->id)->sum('quantity');
            if (($r->minimum_storage * 1) > $sss) {
                $r['stock'] = $sss;
                $rawmaterials[] = $r;
            }
        }
//        dd($spareparts);
        return view('Notifications.minimumStorage', compact('products', 'rawmaterials', 'spareparts'));
    }


    public function test()
    {
        return view('test');
    }


}

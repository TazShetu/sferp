<?php

namespace App\Http\Controllers;

use App\Factory;
use App\Machine;
use App\Product;
use App\Productproductionout;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductproductionoutController extends Controller
{

    public function out()
    {
        abort_unless(Auth::user()->can('product_out_production'), 403);
        $products = Product::all();
        $factories = Factory::all();
        return view('Production.direct.productout', compact('products', 'factories'));
    }


    public function ajaxPidToUnit()
    {
        if (request()->ajax()) {
            $pid = $_GET['pid'];
            $p = Product::find($pid);
            return $p->unit;
        } else {
            return json_encode(['success' => false]);
        }
    }


    public function inStore(Request $request)
    {
        abort_unless(Auth::user()->can('product_out_production'), 403);
        $request->validate([
            'product' => 'required',
            'quantity' => 'required|min:1',
            'factory' => 'required',
            'machine' => 'required',
        ]);
        $p = new Productproductionout;
        $p->product_id = $request->product;
        $p->quantity = $request->quantity;
        $p->factory_id = $request->factory;
        $p->machine_id = $request->machine;
        $p->user_id = Auth::id();
        $p->save();
        Session::flash('Success', "The Product has been produced from Production successfully.");
        return redirect()->back();
    }


    public function history()
    {
        abort_unless(Auth::user()->can('product_out_production'), 403);
        $pofp = Productproductionout::orderBy('created_at', 'DESC')->paginate(20);
        foreach ($pofp as $sp) {
            $s = Product::find($sp->product_id);
            $sp['product'] = $s->name;
            $sp['unit'] = $s->unit;
            $sp['user'] = User::find($sp->user_id)->name;
            $sp['factory'] = Factory::find($sp->factory_id)->name;
            $sp['machine'] = Machine::find($sp->machine_id)->identification_code;
        }
        return view('Production.direct.productouthistory', compact('pofp'));
    }


}

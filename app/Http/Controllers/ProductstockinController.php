<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Product;
use App\Productstock;
use App\Productstockin;
use App\Room;
use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductstockinController extends Controller
{

    public function in()
    {
        $products = Product::all();
        $warehouses = Warehouse::all();
        return view('Stock.in.productindex', compact('products', 'warehouses'));
    }


    public function inStore(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'quantity' => 'required|min:1',
            'warehouse' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $r = new Productstockin;
            $rr = Productstock::where('product_id', $request->product)->where('warehouse_id', $request->warehouse)->where('floor_id', $request->floor)->where('room_id', $request->room)->first();
            if (!$rr) {
                $rr = new Productstock;
            }
            $r->product_id = $request->product;
            $rr->product_id = $request->product;
            $r->quantity = $request->quantity;
            $rr->quantity = $rr->quantity + $request->quantity;
            $r->warehouse_id = $request->warehouse;
            $rr->warehouse_id = $request->warehouse;
            if ($request->filled('floor')) {
                $r->floor_id = $request->floor;
                $rr->floor_id = $request->floor;
            }
            if ($request->filled('room')) {
                $r->room_id = $request->room;
                $rr->room_id = $request->room;
            }
            $r->user_id = Auth::id();
            $r->save();
            $rr->save();
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }
        if ($success) {
            Session::flash('Success', "The Product has been stocked successfully.");
            return redirect()->back();
        } else {
            Session::flash('unsuccess', "Something went wrong :(");
            return redirect()->back();
        }
    }


    public function history()
    {
        $psos = Productstockin::orderBy('created_at', 'DESC')->paginate(20);
        foreach ($psos as $sp) {
            $s = Product::find($sp->product_id);
            $sp['product'] = $s->name;
            $sp['unit'] = $s->unit;
            $sp['user'] = User::find($sp->user_id)->name;
            $sp['warehouse'] = Warehouse::find($sp->warehouse_id)->name;
            if ($sp->floor_id != null) {
                $sp['floor'] = Floor::find($sp->floor_id)->name;
            }
            if ($sp->room_id != null) {
                $sp['room'] = Room::find($sp->room_id)->name;
            }
        }
        return view('Stock.in.producthistory', compact('psos'));
    }


}

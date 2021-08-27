<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Product;
use App\Productstock;
use App\Productstockout;
use App\Room;
use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductstockoutController extends Controller
{

    public function out()
    {
        $ps = Productstock::paginate(20);
        foreach ($ps as $sp) {
            $s = Product::find($sp->product_id);
            $sp['product'] = $s->name;
            $sp['unit'] = $s->unit;
            $sp['warehouse'] = Warehouse::find($sp->warehouse_id)->name;
            if ($sp->floor_id != null) {
                $sp['floor'] = Floor::find($sp->floor_id)->name;
            }
            if ($sp->room_id != null) {
                $sp['room'] = Room::find($sp->room_id)->name;
            }
        }
        return view('Stock.out.productindex', compact('ps'));
    }


    public function outStore(Request $request, $psid)
    {
        $request->validate([
            'outQuantity' => 'required|min:1',
        ]);
        $sps = Productstock::find($psid);
        if (($request->outQuantity * 1) > ($sps->quantity * 1)) {
            Session::flash('unsuccess', "Do not mess with the original Code :(");
            return redirect()->back();
        }
        DB::beginTransaction();
        try {
            $spso = new Productstockout;
            $spso->product_id = $sps->product_id;
            $spso->quantity = $request->outQuantity;
            $spso->warehouse_id = $sps->warehouse_id;
            $spso->floor_id = $sps->floor_id;
            $spso->room_id = $sps->room_id;
            $spso->user_id = Auth::id();
            $spso->save();
            if (($request->outQuantity * 1) == ($sps->quantity * 1)) {
                $sps->delete();
            } else {
                $sps->quantity = $sps->quantity - $request->outQuantity;
                $sps->update();
            }
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }
        if ($success) {
            Session::flash('Success', "Successfully stocked out.");
            return redirect()->back();
        } else {
            Session::flash('unsuccess', "Something went wrong :(");
            return redirect()->back();
        }
    }


    public function history()
    {
        $psos = Productstockout::orderBy('created_at', 'DESC')->paginate(20);
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
        return view('Stock.out.producthistory', compact('psos'));
    }


}

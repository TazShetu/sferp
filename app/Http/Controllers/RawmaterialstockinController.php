<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Rawmaterial;
use App\Rawmaterialstock;
use App\Rawmaterialstockin;
use App\Room;
use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RawmaterialstockinController extends Controller
{

    public function in()
    {
        abort_unless(Auth::user()->can('stock_in_raw_material'), 403);
        $rawmaterials = Rawmaterial::all();
        $warehouses = Warehouse::all();
        return view('Stock.in.rawmaterialindex', compact('rawmaterials', 'warehouses'));
    }


    public function inStore(Request $request)
    {
        abort_unless(Auth::user()->can('stock_in_raw_material'), 403);
        $request->validate([
            'rawMaterial' => 'required',
            'quantity' => 'required|min:1',
            'warehouse' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $r = new Rawmaterialstockin;
            $rr = Rawmaterialstock::where('rawmaterial_id', $request->rawMaterial)->where('warehouse_id', $request->warehouse)->where('floor_id', $request->floor)->where('room_id', $request->room)->first();
            if (!$rr) {
                $rr = new Rawmaterialstock;
            }
            $r->rawmaterial_id = $request->rawMaterial;
            $rr->rawmaterial_id = $request->rawMaterial;
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
            Session::flash('Success', "The Raw Material has been stocked successfully.");
            return redirect()->back();
        } else {
            Session::flash('unsuccess', "Something went wrong :(");
            return redirect()->back();
        }
    }


    public function history()
    {
        abort_unless(Auth::user()->can('stock_in_raw_material'), 403);
        $rmsos = Rawmaterialstockin::orderBy('created_at', 'DESC')->paginate(20);
        foreach ($rmsos as $sp) {
            $s = Rawmaterial::find($sp->rawmaterial_id);
            $sp['rm'] = $s->auto_id;
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
        return view('Stock.in.rawmaterialhistory', compact('rmsos'));
    }


}

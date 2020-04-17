<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Rawmaterial;
use App\Rawmaterialstock;
use App\Rawmaterialstockout;
use App\Room;
use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RawmaterialstockoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function out()
    {
        if (Auth::user()->can('stock_out_raw_material')) {
            $rms = Rawmaterialstock::paginate(20);
            foreach ($rms as $sp){
                $s = Rawmaterial::find($sp->rawmaterial_id);
                $sp['rm'] = $s->auto_id;
                $sp['unit'] = $s->unit;
                $sp['warehouse'] = Warehouse::find($sp->warehouse_id)->name;
                if ($sp->floor_id != null){
                    $sp['floor'] = Floor::find($sp->floor_id)->name;
                }
                if ($sp->room_id != null){
                    $sp['room'] = Room::find($sp->room_id)->name;
                }
            }
            return view('Stock.out.rawmaterialindex', compact('rms'));
        } else {
            abort(403);
        }
    }


    public function outStore(Request $request, $rmsid)
    {
        if (Auth::user()->can('stock_out_raw_material')) {
            $request->validate([
                'outQuantity' => 'required',
            ]);
            $sps = Rawmaterialstock::find($rmsid);
            if (($request->outQuantity * 1) > ($sps->quantity * 1)){
                Session::flash('unsuccess', "Do not mess with the original Code :(");
                return redirect()->back();
            }
            DB::beginTransaction();
            try {
                $spso = new Rawmaterialstockout;
                $spso->rawmaterial_id = $sps->rawmaterial_id;
                $spso->quantity = $request->outQuantity;
                $spso->warehouse_id = $sps->warehouse_id;
                $spso->floor_id = $sps->floor_id;
                $spso->room_id = $sps->room_id;
                $spso->user_id = Auth::id();
                $spso->save();
                if (($request->outQuantity * 1) == ($sps->quantity * 1)){
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
        } else {
            abort(403);
        }
    }


    public function history()
    {
        if (Auth::user()->can('stock_out_raw_material')) {
            $rmsos = Rawmaterialstockout::paginate(20);
            foreach ($rmsos as $sp){
                $s = Rawmaterial::find($sp->rawmaterial_id);
                $sp['rm'] = $s->auto_id;
                $sp['unit'] = $s->unit;
                $sp['user'] = User::find($sp->user_id)->name;
                $sp['warehouse'] = Warehouse::find($sp->warehouse_id)->name;
                if ($sp->floor_id != null){
                    $sp['floor'] = Floor::find($sp->floor_id)->name;
                }
                if ($sp->room_id != null){
                    $sp['room'] = Room::find($sp->room_id)->name;
                }
            }
            return view('Stock.out.rawmaterialhistory', compact('rmsos'));
        } else {
            abort(403);
        }
    }

}

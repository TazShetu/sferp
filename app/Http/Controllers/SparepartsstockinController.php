<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Row;
use App\Spareparts;
use App\Sparepartsstock;
use App\Sparepartsstockin;
use App\Sroom;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SparepartsstockinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function in()
    {
        if (Auth::user()->can('stock_in_spare_part')) {
            $spareparts = Spareparts::all();
            $srooms = Sroom::all();
            return view('Stock.in.sparepartsindex', compact('spareparts', 'srooms'));
        } else {
            abort(403);
        }
    }



    public function inStore(Request $request)
    {
        if (Auth::user()->can('stock_in_spare_part')) {
            $request->validate([
                'sparePart' => 'required',
                'quantity' => 'required|min:1',
                'sparePartRoom' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $s = new Sparepartsstockin;
                $ss = Sparepartsstock::where('spareparts_id', $request->sparePart)->where('sroom_id', $request->sparePartRoom)->where('row_id', $request->row)->where('rack_id', $request->rack)->first();
                if (!$ss){
                    $ss = new Sparepartsstock;
                }
                $s->spareparts_id = $request->sparePart;
                $ss->spareparts_id = $request->sparePart;
                $s->quantity = $request->quantity;
                $ss->quantity = $ss->quantity + $request->quantity;
                $s->sroom_id = $request->sparePartRoom;
                $ss->sroom_id = $request->sparePartRoom;
                if ($request->filled('row')) {
                    $s->row_id = $request->row;
                    $ss->row_id = $request->row;
                }
                if ($request->filled('rack')) {
                    $s->rack_id = $request->rack;
                    $ss->rack_id = $request->rack;
                }
                $s->user_id = Auth::id();
                $s->save();
                $ss->save();
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Spare Part has been stocked successfully.");
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
        if (Auth::user()->can('stock_in_spare_part')) {
            $spsos = Sparepartsstockin::orderBy('created_at', 'DESC')->paginate(20);
            foreach ($spsos as $sp){
                $s = Spareparts::find($sp->spareparts_id);
                $sp['sp'] = $s->description;
                $sp['unit'] = $s->unit;
                $sp['user'] = User::find($sp->user_id)->name;
                $sp['room'] = Sroom::find($sp->sroom_id)->name;
                if ($sp->row_id != null){
                    $sp['row'] = Row::find($sp->row_id)->name;
                }
                if ($sp->rack_id != null){
                    $sp['rack'] = Rack::find($sp->rack_id)->name;
                }
            }
            return view('Stock.in.sparepartshistory', compact('spsos'));
        } else {
            abort(403);
        }
    }


}

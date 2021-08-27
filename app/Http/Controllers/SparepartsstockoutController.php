<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Row;
use App\Spareparts;
use App\Sparepartsstock;
use App\Sparepartsstockout;
use App\Sroom;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SparepartsstockoutController extends Controller
{

    public function out()
    {
        $sps = Sparepartsstock::paginate(20);
        foreach ($sps as $sp) {
            $s = Spareparts::find($sp->spareparts_id);
            $sp['sp'] = $s->description;
            $sp['unit'] = $s->unit;
            $sp['room'] = Sroom::find($sp->sroom_id)->name;
            if ($sp->row_id != null) {
                $sp['row'] = Row::find($sp->row_id)->name;
            }
            if ($sp->rack_id != null) {
                $sp['rack'] = Rack::find($sp->rack_id)->name;
            }
        }
        return view('Stock.out.sparepartsindex', compact('sps'));
    }


    public function outStore(Request $request, $spsid)
    {
        $request->validate([
            'outQuantity' => 'required|min:1',
        ]);
        $sps = Sparepartsstock::find($spsid);
        if (($request->outQuantity * 1) > ($sps->quantity * 1)) {
            Session::flash('unsuccess', "Do not mess with the original Code :(");
            return redirect()->back();
        }
        DB::beginTransaction();
        try {
            $spso = new Sparepartsstockout;
            $spso->spareparts_id = $sps->spareparts_id;
            $spso->quantity = $request->outQuantity;
            $spso->sroom_id = $sps->sroom_id;
            $spso->row_id = $sps->row_id;
            $spso->rack_id = $sps->rack_id;
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
        $spsos = Sparepartsstockout::orderBy('created_at', 'DESC')->paginate(20);
        foreach ($spsos as $sp) {
            $s = Spareparts::find($sp->spareparts_id);
            $sp['sp'] = $s->description;
            $sp['unit'] = $s->unit;
            $sp['user'] = User::find($sp->user_id)->name;
            $sp['room'] = Sroom::find($sp->sroom_id)->name;
            if ($sp->row_id != null) {
                $sp['row'] = Row::find($sp->row_id)->name;
            }
            if ($sp->rack_id != null) {
                $sp['rack'] = Rack::find($sp->rack_id)->name;
            }
        }
        return view('Stock.out.sparepartshistory', compact('spsos'));
    }


}

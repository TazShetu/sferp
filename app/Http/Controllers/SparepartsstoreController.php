<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Row;
use App\Spareparts;
use App\Sparepartspurchase;
use App\Sparepartsstore;
use App\Sroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SparepartsstoreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function storeIndex()
    {
        if (Auth::user()->can('sparepart_stock')) {
            $receives = Sparepartspurchase::where('status', 'received')->orderBy('created_at', 'DESC')->get();
            foreach ($receives as $r) {
                $r['spare_part'] = Spareparts::find($r->spareparts_id)->description;
            }
            return view('PURCHASE.STORE.spareParts', compact('receives'));
        } else {
            abort(403);
        }
    }


    public function storeSinglePurchase($sphid)
    {
        if (Auth::user()->can('sparepart_stock')) {
            $sph = Sparepartspurchase::find($sphid);
            if ($sph) {
                $sph['spare_part'] = Spareparts::find($sph->spareparts_id)->description;
                $srooms = Sroom::all();

                return view('PURCHASE.STORE.sparePartStore', compact('sph', 'srooms'));
            } else {
                Session::flash('unsuccess', "Please do not mess with the URL :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function ajaxSridToRooms(Request $request)
    {
        if (request()->ajax() && Auth::user()->can('sparepart_stock')) {
            $rows = Row::where('sroom_id', $request->srid)->get();
            if (count($rows) > 0) {
                $html = ' <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                Row
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker" id="sroom-row" name="row">
                                    <option selected disabled hidden value="">Choose...
                                    </option>';
                foreach ($rows as $r) {
                    $html .= "<option value='$r->id'>'$r->name'</option>";
                }
                $html .= ' </select></div></div>';
            } else {
                $html = '<div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Row</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker">
                                    <option selected disabled value="">
                                        This Spare Part Room has no Row or Rack.
                                    </option>
                                </select>
                            </div>
                        </div>';
            }
            return $html;
        } else {
            return json_encode(['success' => false]);
        }
    }


    public function ajaxRidToRacks(Request $request)
    {
        if (request()->ajax() && Auth::user()->can('sparepart_stock')) {
            $racks = Rack::where('row_id', $request->rid)->get();
            if (count($racks) > 0) {
                $html = ' <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                Rack
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker" name="rack">
                                    <option selected disabled hidden value="">Choose...
                                    </option>';
                foreach ($racks as $r) {
                    $html .= "<option value='$r->id'>'$r->name'</option>";
                }
                $html .= ' </select></div></div>';
            } else {
                $html = '<div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Rack</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker">
                                    <option selected disabled value="">
                                        This Row has no Rack.
                                    </option>
                                </select>
                            </div>
                        </div>';
            }
            return $html;
        } else {
            return json_encode(['success' => false]);
        }
    }


    public function stock(Request $request, $sphid)
    {
        if (Auth::user()->can('sparepart_stock')) {
            $request->validate([
                'sparePart' => 'required',
                'quantity' => 'required',
                'sparePartRoom' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $sph = Sparepartspurchase::find($sphid);
                $sph->status = 'stored';
                $sph->update();
                $s = new Sparepartsstore;
                $s->spareparts_id = $request->sparePart;
                $s->quantity = $request->quantity;
                $s->sroom_id = $request->sparePartRoom;
                if ($request->filled('row')) {
                    $s->row_id = $request->row;
                }
                if ($request->filled('rack')) {
                    $s->rack_id = $request->rack;
                }
                $s->save();
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Spare Part has been stored successfully.");
                return redirect()->route('spare-part.purchase.store');
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }


    }


}

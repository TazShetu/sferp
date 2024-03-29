<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Rawmaterial;
use App\Rawmaterialpurchase;
use App\Rawmaterialstock;
use App\Rawmaterialstore;
use App\Room;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RawmaterialstoreController extends Controller
{

    public function storeIndex()
    {
        $receives = Rawmaterialpurchase::where('status', 'received')->orderBy('created_at', 'DESC')->get();
        foreach ($receives as $r) {
            $r['raw_material'] = Rawmaterial::find($r->rawmaterial_id)->auto_id;
        }
        return view('PURCHASE.STORE.rawMaterials', compact('receives'));
    }


    public function storeSinglePurchase($rmpid)
    {
        $rmp = Rawmaterialpurchase::find($rmpid);
        if ($rmp) {
            $rmp['raw_material'] = Rawmaterial::find($rmp->rawmaterial_id)->auto_id;
            $warehouses = Warehouse::all();
            return view('PURCHASE.STORE.rawMaterilaStore', compact('rmp', 'warehouses'));
        } else {
            Session::flash('unsuccess', "Please do not mess with the URL :(");
            return redirect()->back();
        }
    }


    public function ajaxWidToFloor(Request $request)
    {
        if (request()->ajax()) {
            $floors = Floor::where('warehouse_id', $request->wid)->get();
            if (count($floors) > 0) {
                $html = ' <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Floor</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker" id="warehouse-floor" name="floor">
                                    <option selected disabled hidden value="">Choose...</option>';
                foreach ($floors as $f) {
                    $html .= "<option value='$f->id'>'$f->name'</option>";
                }
                $html .= ' </select></div></div>';
            } else {
                $html = '<div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Floor</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker">
                                    <option selected disabled value="">
                                        This Warehouse has no Floor or Room.
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


    public function ajaxFidToRoom(Request $request)
    {
        if (request()->ajax()) {
            $rooms = Room::where('floor_id', $request->fid)->get();
            if (count($rooms) > 0) {
                $html = ' <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Room</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker" name="room">
                                    <option selected disabled hidden value="">Choose...</option>';
                foreach ($rooms as $r) {
                    $html .= "<option value='$r->id'>'$r->name'</option>";
                }
                $html .= ' </select></div></div>';
            } else {
                $html = '<div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Room</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker">
                                    <option selected disabled value="">
                                        This Floor has no Room.
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


    public function stock(Request $request, $rmpid)
    {
        $request->validate([
            'rawMaterial' => 'required',
            'quantity' => 'required',
            'warehouse' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $rmp = Rawmaterialpurchase::find($rmpid);
            $rmp->status = 'stored';
            $rmp->update();
            $r = new Rawmaterialstore;
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
            Session::flash('Success', "The Raw Material has been stored successfully.");
            return redirect()->route('spare-part.purchase.store');
        } else {
            Session::flash('unsuccess', "Something went wrong :(");
            return redirect()->back();
        }
    }


}

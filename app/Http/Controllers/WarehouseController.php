<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Productstock;
use App\Rawmaterialstock;
use App\Room;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WarehouseController extends Controller
{

    public function index()
    {
        abort_unless(Auth::user()->can('ware_house'), 403);
        $warehouses = Warehouse::all();
        return view('warehouse.index', compact('warehouses'));
    }


    public function store(Request $request)
    {
        abort_unless(Auth::user()->can('ware_house'), 403);
        $request->validate([
            'name' => 'required',
        ]);
        $w = new Warehouse;
        $w->name = $request->name;
        $w->save();
        Session::flash('Success', "Warehouse '$w->name' has been created successfully. You can add Floor in Floor tab.");
        session(['is_edit' => 1]);
        return redirect()->route('warehouse.edit', ['wid' => $w->id]);
    }


    public function edit($wid)
    {
        abort_unless(Auth::user()->can('ware_house'), 403);
        $warehouse = Warehouse::find($wid);
        $floors = $warehouse->floors()->get();
        foreach ($floors as $f) {
            $r = $f->rooms()->get();
            if (count($r) > 0) {
                $f['x'] = 1;
            } else {
                $f['x'] = null;
            }
        }
        $rooms = $warehouse->rooms()->get();
        foreach ($rooms as $r) {
            $r['floor_name'] = $r->floor->name;
        }
        $is_edit = false;
        if (session()->has('is_edit')) {
            $is_edit = true;
            session()->forget('is_edit');
        }
        return view('warehouse.edit', compact('warehouse', 'floors', 'rooms', 'is_edit'));
    }


    public function update(Request $request, $wid)
    {
        abort_unless(Auth::user()->can('ware_house'), 403);
        $request->validate([
            'name' => 'required',
        ]);
        $w = Warehouse::find($wid);
        $w->name = $request->name;
        $w->update();
        Session::flash('Success', "Warehouse '$w->name' has been updated successfully. You can add Floor in Floor tab.");
        return redirect()->back();
    }


    public function destroy($wid)
    {
        abort_unless(Auth::user()->can('ware_house'), 403);
        $warehouse = Warehouse::find($wid);
        // check it has stock history or not
        // if it, has then can not delete

        // no need to check floor or room
//            $floors = $warehouse->floors;
//            $rooms = $warehouse->rooms;
        $rm = Rawmaterialstock::where('warehouse_id', $wid)->get();
        $p = Productstock::where('warehouse_id', $wid)->get();
        if ((count($rm) > 0) || (count($p) > 0)) {
            Session::flash('unsuccess', "Warehouse '$warehouse->name' has things in it. Can not delete :(");
            return redirect()->back();
        } else {
            $warehouse->delete();
            Session::flash('Success', "Warehouse has been deleted successfully.");
            return redirect()->back();
        }
    }


    public function floorUpdate(Request $request, $wid)
    {
        abort_unless(Auth::user()->can('ware_house'), 403);
        DB::beginTransaction();
        try {
            if ($request->filled('floorName')) {
                if ($request->filled('oldFloorId')) {
                    $fs = Floor::where('warehouse_id', $wid)->get();
                    if (count($fs) != count($request->oldFloorId)) {
                        foreach ($fs as $floor) {
                            $x = 0;
                            foreach ($request->oldFloorId as $fid1) {
                                if ($floor->id == $fid1) {
                                    $x = 1;
                                    break;
                                }
                            }
                            if ($x == 0) {
                                // check it has stock or not
                                // if it, has make the room id null
                                Room::where('floor_id', $floor->id)->delete();
                                // check it has stock or not
                                // if it, has make the floor id null
                                $floor->delete();
                            }
                        }
                    }
                    foreach ($request->floorName as $i => $f) {
                        foreach ($request->oldFloorId as $ii => $fid) {
                            if (($i == $ii) && ($f != "")) {
                                $ff = Floor::find($fid);
                                $ff->name = $f;
                                $ff->update();
                            } else {
                                if ($f != "") {
                                    $ff = new Floor;
                                    $ff->warehouse_id = $wid;
                                    $ff->name = $f;
                                    $ff->save();
                                }
                            }
                        }
                    }
                } else {
                    // check it has stock or not
                    // if it, has make the floor id null
                    Floor::where('warehouse_id', $wid)->delete();
                    // check it has stock or not
                    // if it, has make the room id null
                    Room::where('warehouse_id', $wid)->delete();
                    foreach ($request->floorName as $i => $f) {
                        if ($f != "") {
                            $ff = new Floor;
                            $ff->warehouse_id = $wid;
                            $ff->name = $f;
                            $ff->save();
                        }
                    }
                }
            } else {
                // check it has stock or not
                // if it, has make the floor id null
                Floor::where('warehouse_id', $wid)->delete();
                // check it has stock or not
                // if it, has make the room id null
                Room::where('warehouse_id', $wid)->delete();
            }
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }
        if ($success) {
            Session::flash('Success', "The Floor has been updated successfully. Check them in floor tab.");
            return redirect()->back();
        } else {
            Session::flash('unsuccess', "Something went wrong :(");
            return redirect()->back();
        }
    }


    public function roomUpdate(Request $request, $wid)
    {
        abort_unless(Auth::user()->can('ware_house'), 403);
        if ($request->filled('floor')) {
            foreach ($request->floor as $f) {
                if ($f == null) {
                    Session::flash('unsuccess', "Please Do Not Mess With The Original Code :(");
                    return redirect()->back();
                }
            }
        } elseif ($request->filled('roomName')) {
            Session::flash('unsuccess', "Please Do Not Mess With The Original Code :(");
            return redirect()->back();
        }
        if ($request->filled('roomName')) {
            foreach ($request->roomName as $r) {
                if ($r == null) {
                    Session::flash('unsuccess', "Please Do Not Mess With The Original Code :(");
                    return redirect()->back();
                }
            }
        }
        if (($request->filled('floor')) && ($request->filled('roomName')) && (count($request->floor) != count($request->roomName))) {
            Session::flash('unsuccess', "Please Do Not Mess With The Original Code :(");
            return redirect()->back();
        }
        DB::beginTransaction();
        try {
            Room::where('warehouse_id', $wid)->delete();
            if (($request->filled('floor')) && ($request->filled('roomName'))) {
                foreach ($request->floor as $i => $f) {
                    foreach ($request->roomName as $ii => $rr) {
                        if ($i == $ii) {
                            $r = new Room;
                            $r->warehouse_id = $wid;
                            $r->floor_id = $f;
                            $r->name = $rr;
                            $r->save();
                            break;
                        }
                    }
                }
            }
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }
        if ($success) {
            Session::flash('Success', "The Room has been updated successfully. Check them in room tab.");
            return redirect()->back();
        } else {
            Session::flash('unsuccess', "Something went wrong :(");
            return redirect()->back();
        }
    }


}

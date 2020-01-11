<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Rack;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (Auth::user()->can('ware_house')) {
            $warehouses = Warehouse::all();
            return view('warehouse.index', compact('warehouses'));
        } else {
            abort(403);
        }
    }



    public function store(Request $request)
    {
        if (Auth::user()->can('ware_house')) {
            $request->validate([
                'name' => 'required',
            ]);
            $w = new Warehouse;
            $w->name = $request->name;
            $w->save();
            Session::flash('Success', "Warehouse '$w->name' has been created successfully. You can add Floor in Floor tab.");
            session(['is_edit' => 1]);
            return redirect()->route('warehouse.edit', ['wid' => $w->id]);
        } else {
            abort(403);
        }
    }



    public function edit($wid)
    {
        if (Auth::user()->can('ware_house')) {
            $warehouse = Warehouse::find($wid);
            $floors = $warehouse->floors;
            $racks = $warehouse->racks;
            $is_edit = false;
            if (session()->has('is_edit')){
                $is_edit = true;
                session()->forget('is_edit');
            }
            return view('warehouse.edit', compact('warehouse', 'floors', 'racks', 'is_edit'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $wid)
    {
        if (Auth::user()->can('ware_house')) {
            $request->validate([
                'name' => 'required',
            ]);
            $w = Warehouse::find($wid);
            $w->name = $request->name;
            $w->update();
            Session::flash('Success', "Warehouse '$w->name' has been updated successfully. You can add Floor in Floor tab.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function destroy($wid)
    {
        if (Auth::user()->can('ware_house')) {
            $warehouse = Warehouse::find($wid);
            $floors = $warehouse->floors;
            $racks = $warehouse->racks;
            if ((count($floors) > 0) || (count($racks) > 0)){
                Session::flash('unsuccess', "Warehouse '$warehouse->name' has data in them. Can not delete :(");
                return redirect()->back();
            }else {
                $warehouse->delete();
                Session::flash('Success', "Warehouse has been deleted successfully.");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }



    public function floorUpdate(Request $request, $wid)
    {
        if (Auth::user()->can('ware_house')) {
            DB::beginTransaction();
            try {
                Floor::where('warehouse_id', $wid)->delete();
                if ($request->filled('floorName')){
                    foreach ($request->floorName as $f){
                        if ($f != ""){
                            $ff = new Floor;
                            $ff->warehouse_id = $wid;
                            $ff->name = $f;
                            $ff->save();
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
                Session::flash('Success', "The Floor has been added successfully. Check them in floor tab.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }



}
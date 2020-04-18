<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Row;
use App\Sparepartsstock;
use App\Sroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SroomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->can('sparepart_room')) {
            $srooms = Sroom::all();
            return view('sroom.index', compact('srooms'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('sparepart_room')) {
            $request->validate([
                'name' => 'required',
            ]);
            $w = new Sroom;
            $w->name = $request->name;
            $w->save();
            Session::flash('Success', "Spare Part Room '$w->name' has been created successfully. You can add Row in Row tab.");
            session(['is_edit' => 1]);
            return redirect()->route('sroom.edit', ['srid' => $w->id]);
        } else {
            abort(403);
        }
    }


    public function edit($srid)
    {
        if (Auth::user()->can('sparepart_room')) {
            $sroom = Sroom::find($srid);
            $rows = $sroom->rows()->get();
            foreach ($rows as $r){
                $rs = $r->racks()->get();
                if (count($rs) > 0){
                    $r['x'] = 1;
                }else {
                    $r['x'] = null;
                }
            }
            $racks = $sroom->racks()->get();
            foreach ($racks as $r) {
                $r['row_name'] = $r->row->name;
            }
            $is_edit = false;
            if (session()->has('is_edit')) {
                $is_edit = true;
                session()->forget('is_edit');
            }
            return view('sroom.edit', compact('sroom', 'rows', 'racks', 'is_edit'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $srid)
    {
        if (Auth::user()->can('sparepart_room')) {
            $request->validate([
                'name' => 'required',
            ]);
            $w = Sroom::find($srid);
            $w->name = $request->name;
            $w->update();
            Session::flash('Success', "Spare Part Room has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function destroy($srid)
    {
        if (Auth::user()->can('sparepart_room')) {
            $sroom = Sroom::find($srid);
            // check it has stock history or not
            // if it, has then can not delete

            // no need to check floor or room
//            $rows = $sroom->rows()->get();
//            $racks = $sroom->racks()->get();
            $sp = Sparepartsstock::where('sroom_id', $srid)->get();
            if (count($sp) > 0) {
                Session::flash('unsuccess', "Spare Part Room '$sroom->name' has things in it. Can not delete :(");
                return redirect()->back();
            } else {
                $sroom->delete();
                Session::flash('Success', "Spare Part Room has been deleted successfully.");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function rowUpdate(Request $request, $srid)
    {
        if (Auth::user()->can('sparepart_room')) {
            DB::beginTransaction();
            try {
                if ($request->filled('rowName')) {
                    if ($request->filled('oldRowId')) {
                        $rs = Row::where('sroom_id', $srid)->get();
                        if (count($rs) != count($request->oldRowId)) {
                            foreach ($rs as $row) {
                                $x = 0;
                                foreach ($request->oldRowId as $fid1) {
                                    if ($row->id == $fid1) {
                                        $x = 1;
                                        break;
                                    }
                                }
                                if ($x == 0) {
                                    // check it has stock or not
                                    // if it, has make the room id null
                                    Rack::where('row_id', $row->id)->delete();
                                    // check it has stock or not
                                    // if it, has make the floor id null
                                    $row->delete();
                                }
                            }
                        }
                        foreach ($request->rowName as $i => $f) {
                            foreach ($request->oldRowId as $ii => $fid) {
                                if (($i == $ii) && ($f != "")) {
                                    $ff = Row::find($fid);
                                    $ff->name = $f;
                                    $ff->update();
                                } else {
                                    if ($f != "") {
                                        $ff = new Row;
                                        $ff->sroom_id = $srid;
                                        $ff->name = $f;
                                        $ff->save();
                                    }
                                }
                            }
                        }
                    } else {
                        // check it has stock or not
                        // if it, has make the floor id null
                        Row::where('sroom_id', $srid)->delete();
                        // check it has stock or not
                        // if it, has make the room id null
                        Rack::where('sroom_id', $srid)->delete();
                        foreach ($request->rowName as $f) {
                            if ($f != "") {
                                $ff = new Row;
                                $ff->sroom_id = $srid;
                                $ff->name = $f;
                                $ff->save();
                            }
                        }
                    }
                } else {
                    // check it has stock or not
                    // if it, has make the floor id null
                    Row::where('sroom_id', $srid)->delete();
                    // check it has stock or not
                    // if it, has make the room id null
                    Rack::where('sroom_id', $srid)->delete();
                }
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Row has been updated successfully. Check them in row tab.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function rackUpdate(Request $request, $srid)
    {
        if (Auth::user()->can('sparepart_room')) {
            if ($request->filled('row')) {
                foreach ($request->row as $f) {
                    if ($f == null) {
                        Session::flash('unsuccess', "Please Do Not Mess With The Original Code :(");
                        return redirect()->back();
                    }
                }
            } elseif ($request->filled('rackName')) {
                Session::flash('unsuccess', "Please Do Not Mess With The Original Code :(");
                return redirect()->back();
            }
            if ($request->filled('rackName')) {
                foreach ($request->rackName as $r) {
                    if ($r == null) {
                        Session::flash('unsuccess', "Please Do Not Mess With The Original Code :(");
                        return redirect()->back();
                    }
                }
            }
            if (($request->filled('row')) && ($request->filled('rackName')) && (count($request->row) != count($request->rackName))) {
                Session::flash('unsuccess', "Please Do Not Mess With The Original Code :(");
                return redirect()->back();
            }
            DB::beginTransaction();
            try {
                Rack::where('sroom_id', $srid)->delete();
                if (($request->filled('row')) && ($request->filled('rackName'))) {
                    foreach ($request->row as $i => $f) {
                        foreach ($request->rackName as $ii => $rr) {
                            if ($i == $ii) {
                                $r = new Rack;
                                $r->sroom_id = $srid;
                                $r->row_id = $f;
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
                Session::flash('Success', "The Rack has been updated successfully. Check them in rack tab.");
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

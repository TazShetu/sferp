<?php

namespace App\Http\Controllers;

use App\Spareparts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SparepartsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list(Request $request)
    {
        if (Auth::user()->can('spare_parts')) {
//            $spareParts = Spareparts::paginate(10);
            $spareParts = Spareparts::where('type', 'LIKE', "%{$request->type}%")->Where('description', 'LIKE', "%{$request->tag}%")->paginate(10);
            foreach ($spareParts as $s) {
                $ms = $s->machines()->get();
                $machines = [];
                foreach ($ms as $m) {
                    $t = str_replace(';.;', ' ', $m->tag);
                    $machines[] = $t;
                }
                $s['machines'] = $machines;
            }
            $spareParts->appends(['type' => $request->type, 'tag' => $request->tag]);
            $query = $request->all();
            return view('spareParts.list', compact('spareParts', 'query'));
        } else {
            abort(403);
        }
    }


    public function create()
    {
        if (Auth::user()->can('spare_parts')) {
//            $machines = DB::select(DB::raw('SELECT tag FROM machines GROUP BY tag'));
            $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM spareparts GROUP BY manufacturer'));
            $datalist['model'] = DB::select(DB::raw('SELECT model FROM spareparts GROUP BY model'));
            $datalist['type'] = DB::select(DB::raw('SELECT type FROM spareparts GROUP BY type'));
            $datalist['unit'] = DB::select(DB::raw('SELECT unit FROM spareparts GROUP BY unit'));
            return view('spareParts.create', compact('datalist'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('spare_parts')) {
            $request->validate([
                'manufacturerName' => 'required',
                'model' => 'required',
                'type' => 'required',
//                'partNumber' => 'required',
//                'identityNumber' => 'required',
//                'codeNumber' => 'required',
                'minimumStorage' => 'required|min:0',
                'unit' => 'required',
            ]);
            $s = new Spareparts;
            $s->manufacturer = $request->manufacturerName;
            $s->model = $request->model;
            $s->type = $request->type;
            $s->description = $request->manufacturerName . '_' . $request->model . '_' . $request->type;
            $s->part_number = $request->partNumber;
            $s->identity_number = $request->identityNumber;
            $s->code_number = $request->codeNumber;
            $s->minimum_storage = $request->minimumStorage;
            $s->unit = $request->unit;
            $s->description_2 = $request->description_2;
            $s->save();
            Session::flash('Success', "The Spare Parts has been created successfully.");
            return redirect()->route('spareParts.list');
        } else {
            abort(403);
        }
    }


    public function destroy($spid)
    {
        if (Auth::user()->can('spare_parts')) {
            $s = Spareparts::find($spid);
            $s->machines()->detach();
            $s->delete();
            Session::flash('Success', "The Spare Part has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($spid)
    {
        if (Auth::user()->can('spare_parts')) {
            $spedit = Spareparts::find($spid);
            $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM spareparts GROUP BY manufacturer'));
            $datalist['model'] = DB::select(DB::raw('SELECT model FROM spareparts GROUP BY model'));
            $datalist['type'] = DB::select(DB::raw('SELECT type FROM spareparts GROUP BY type'));
            $datalist['unit'] = DB::select(DB::raw('SELECT unit FROM spareparts GROUP BY unit'));
            return view('spareParts.edit', compact('spedit', 'datalist'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $spid)
    {
        if (Auth::user()->can('spare_parts')) {
            $request->validate([
                'manufacturerName' => 'required',
                'model' => 'required',
                'type' => 'required',
//                'partNumber' => 'required',
//                'identityNumber' => 'required',
//                'codeNumber' => 'required',
                'minimumStorage' => 'required|min:0',
                'unit' => 'required',
            ]);
            $s = Spareparts::find($spid);
//            if ($s->identity_number != $request->identityNumber) {
//                $request->validate([
//                    'identityNumber' => 'unique:spareparts,identity_number',
//                ]);
//            }
            $s->manufacturer = $request->manufacturerName;
            $s->model = $request->model;
            $s->type = $request->type;
            $s->description = $request->manufacturerName . '_' . $request->model . '_' . $request->type;
            $s->part_number = $request->partNumber;
            $s->identity_number = $request->identityNumber;
            $s->code_number = $request->codeNumber;
            $s->minimum_storage = $request->minimumStorage;
            $s->unit = $request->unit;
            $s->description_2 = $request->description_2;
            $s->update();
            Session::flash('Success', "The Spare Parts has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }

}

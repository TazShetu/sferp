<?php

namespace App\Http\Controllers;

use App\Rawmaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RawmaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        if (Auth::user()->can('raw_material')) {
            $rawMaterials = Rawmaterial::paginate(10);
            return view('rawMaterial.list', compact('rawMaterials'));
        } else {
            abort(403);
        }
    }


    public function create()
    {
        if (Auth::user()->can('raw_material')) {
            $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM rawmaterials GROUP BY country_origin'));
            $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM rawmaterials GROUP BY manufacturer'));
            $datalist['unit'] = DB::select(DB::raw('SELECT unit FROM rawmaterials GROUP BY unit'));
            return view('rawMaterial.create', compact('datalist'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('raw_material')) {
            $request->validate([
                'name' => 'required',
                'manufacturerName' => 'required',
                'countryOfOrigin' => 'required',
                'gradeNumber' => 'required',
                'minimumStorage' => 'required|min:0',
                'unit' => 'required',
            ]);
            $r = new Rawmaterial;
            $r->name = $request->name;
            $r->manufacturer = $request->manufacturerName;
            $r->country_origin = $request->countryOfOrigin;
            $r->grade_number = $request->gradeNumber;
            $r->auto_id = $request->name . "_" . $request->manufacturerName . "_" . $request->gradeNumber;
            if ($request->filled('mfi')) {
                $request->validate([
                    'nmfi' => 'min:0',
                ]);
                $r->melting_flow_index = $request->mfi;
            }
            if ($request->filled('meltingPoint')) {
                $r->melting_point = $request->meltingPoint;
            }
            if ($request->filled('viscosity')) {
                $request->validate([
                    'viscosity' => 'min:0',
                ]);
                $r->viscosity = $request->viscosity;
            }
            if ($request->filled('relativeDensity')) {
                $r->relative_density = $request->relativeDensity;
            }
            if ($request->filled('density')) {
                $r->density = $request->density;
            }
            $r->minimum_storage = $request->minimumStorage;
            $r->unit = $request->unit;
            $r->save();
            Session::flash('Success', "The Raw Material has been created successfully.");
            return redirect()->route('rawMaterial.list');
        } else {
            abort(403);
        }
    }


    public function edit($rmid)
    {
        if (Auth::user()->can('raw_material')) {
            $rmedit = Rawmaterial::find($rmid);
            $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM rawmaterials GROUP BY country_origin'));
            $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM rawmaterials GROUP BY manufacturer'));
            $datalist['unit'] = DB::select(DB::raw('SELECT unit FROM rawmaterials GROUP BY unit'));
            return view('rawMaterial.edit', compact('datalist', 'rmedit'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $rmid)
    {
        if (Auth::user()->can('raw_material')) {
            $request->validate([
                'name' => 'required',
                'manufacturerName' => 'required',
                'countryOfOrigin' => 'required',
                'gradeNumber' => 'required',
                'minimumStorage' => 'required|min:0',
                'unit' => 'required',
            ]);
            $r = Rawmaterial::find($rmid);
            $r->name = $request->name;
            $r->manufacturer = $request->manufacturerName;
            $r->country_origin = $request->countryOfOrigin;
            $r->grade_number = $request->gradeNumber;
            $r->auto_id = $request->name . "_" . $request->manufacturerName . "_" . $request->gradeNumber;
            if ($request->filled('mfi')) {
                $request->validate([
                    'nmfi' => 'min:0',
                ]);
                $r->melting_flow_index = $request->mfi;
            }
            if ($request->filled('meltingPoint')) {
                $r->melting_point = $request->meltingPoint;
            }
            if ($request->filled('viscosity')) {
                $request->validate([
                    'viscosity' => 'min:0',
                ]);
                $r->viscosity = $request->viscosity;
            }
            if ($request->filled('relativeDensity')) {
                $r->relative_density = $request->relativeDensity;
            }
            if ($request->filled('density')) {
                $r->density = $request->density;
            }
            $r->minimum_storage = $request->minimumStorage;
            $r->unit = $request->unit;
            $r->update();
            Session::flash('Success', "The Raw Material has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function destroy($rmid)
    {
        if (Auth::user()->can('raw_material')) {
            $r = Rawmaterial::find($rmid);
            $r->products()->detach();
            $r->delete();
            Session::flash('Success', "The Raw Material has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }
}

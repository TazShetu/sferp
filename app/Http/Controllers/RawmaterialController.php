<?php

namespace App\Http\Controllers;

use App\Rawmaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RawmaterialController extends Controller
{

    public function list(Request $request)
    {
        abort_unless(Auth::user()->can('raw_material'), 403);
        $rawMaterials = Rawmaterial::where('auto_id', 'LIKE', "%{$request->identityNumber}%")->Where('country_origin', 'LIKE', "%{$request->countryOrigin}%")->paginate(10);
        $rawMaterials->appends(['identityNumber' => "$request->identityNumber", 'countryOrigin' => "$request->countryOrigin"]);
        $query = $request->all();
        return view('rawMaterial.list', compact('rawMaterials', 'query'));
    }


    public function create()
    {
        abort_unless(Auth::user()->can('raw_material'), 403);
        $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM rawmaterials GROUP BY country_origin'));
        $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM rawmaterials GROUP BY manufacturer'));
        $datalist['unit'] = DB::select(DB::raw('SELECT unit FROM rawmaterials GROUP BY unit'));
        return view('rawMaterial.create', compact('datalist'));
    }


    public function store(Request $request)
    {
        abort_unless(Auth::user()->can('raw_material'), 403);
        $request->validate([
            'type' => 'required',
            'manufacturerName' => 'required',
            'countryOfOrigin' => 'required',
            'gradeNumber' => 'required',
            'minimumStorage' => 'required|min:0',
            'unit' => 'required',
        ]);
        $r = new Rawmaterial;
        $r->type = $request->type;
        $r->manufacturer = $request->manufacturerName;
        $r->country_origin = $request->countryOfOrigin;
        $r->grade_number = $request->gradeNumber;
        $r->auto_id = $request->type . "_" . $request->manufacturerName . "_" . $request->gradeNumber;
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
    }


    public function edit($rmid)
    {
        abort_unless(Auth::user()->can('raw_material'), 403);
        $rmedit = Rawmaterial::find($rmid);
        $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM rawmaterials GROUP BY country_origin'));
        $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM rawmaterials GROUP BY manufacturer'));
        $datalist['unit'] = DB::select(DB::raw('SELECT unit FROM rawmaterials GROUP BY unit'));
        return view('rawMaterial.edit', compact('datalist', 'rmedit'));
    }


    public function update(Request $request, $rmid)
    {
        abort_unless(Auth::user()->can('raw_material'), 403);
        $request->validate([
            'type' => 'required',
            'manufacturerName' => 'required',
            'countryOfOrigin' => 'required',
            'gradeNumber' => 'required',
            'minimumStorage' => 'required|min:0',
            'unit' => 'required',
        ]);
        $r = Rawmaterial::find($rmid);
        $r->type = $request->type;
        $r->manufacturer = $request->manufacturerName;
        $r->country_origin = $request->countryOfOrigin;
        $r->grade_number = $request->gradeNumber;
        $r->auto_id = $request->type . "_" . $request->manufacturerName . "_" . $request->gradeNumber;
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
    }


    public function destroy($rmid)
    {
        abort_unless(Auth::user()->can('raw_material'), 403);
        $r = Rawmaterial::find($rmid);
        $r->products()->detach();
        $r->delete();
        Session::flash('Success', "The Raw Material has been deleted successfully.");
        return redirect()->back();
    }
}

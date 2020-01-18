<?php

namespace App\Http\Controllers;

use App\Factory;
use App\Machine;
use App\Machinecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MachineController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list()
    {
        if (Auth::user()->can('machine')) {
            $machines = Machine::paginate(10);
            foreach ($machines as $m){
                $m['category'] = Machinecategory::find($m->machinecategory_id)->name;
                $m['factory'] = Factory::find($m->factory_id)->name;
            }
            return view('machine.list', compact('machines'));
        } else {
            abort(403);
        }
    }


    public function create()
    {
        if (Auth::user()->can('machine')) {
            $factories = Factory::all();
            $machineCategories = Machinecategory::all();
            $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM machines GROUP BY manufacturer'));
            $datalist['type'] = DB::select(DB::raw('SELECT type FROM machines GROUP BY type'));
            return view('machine.create', compact('machineCategories', 'factories', 'datalist'));
        } else {
            abort(403);
        }
    }



    public function store(Request $request)
    {
        if (Auth::user()->can('machine')) {
            $request->validate([
                'category' => 'required',
                'factory' => 'required',
                'manufacturerName' => 'required',
                'typeOrModelNumber' => 'required',
                'serialNumber' => 'required|unique:machines,identification_code',
                'manufacturerYear' => 'required',
                'countryOfOrigin' => 'required',
            ]);
            $m = new Machine;
            $m->machinecategory_id = $request->category;
            $m->factory_id = $request->factory;
            $m->manufacturer = $request->manufacturerName;
            $m->type = $request->typeOrModelNumber;
            $m->identification_code = $request->serialNumber;
            $m->manufacture_year = $request->manufacturerYear;
            $m->manufacture_country = $request->countryOfOrigin;
            if ($request->filled('skOrDk')){
                $m->sk_dk = $request->skOrDk;
            }
            if ($request->filled('pitchSize')){
                $request->validate([
                    'pitchSize' => 'min:0',
                ]);
                $m->pitch_size = $request->pitchSize;
            }
            if ($request->filled('spoolDiameter')){
                $request->validate([
                    'spoolDiameter' => 'min:0',
                ]);
                $m->spool_diameter = $request->spoolDiameter;
            }
            if ($request->filled('numberOfShuttles')){
                $request->validate([
                    'numberOfShuttles' => 'min:0',
                ]);
                $m->number_of_shuttles = $request->numberOfShuttles;
            }
            if (($request->filled('ropeSizeStart')) || ($request->filled('ropeSizeEnd')) ){
                $request->validate([
                    'ropeSizeStart' => 'required|min:0',
                    'ropeSizeEnd' => 'required|min:0',
                ]);
                $m->rope_size_from = $request->ropeSizeStart;
                $m->rope_size_to = $request->ropeSizeEnd;
            }
            if (($request->filled('sizeRangeStart')) || ($request->filled('sizeRangeEnd')) ){
                $request->validate([
                    'sizeRangeStart' => 'required|min:0',
                    'sizeRangeEnd' => 'required|min:0',
                ]);
                $m->size_range_from = $request->sizeRangeStart;
                $m->size_range_to = $request->sizeRangeEnd;
            }
            if ($request->filled('screwSize')){
                 $request->validate([
                    'screwSize' => 'min:0',
                ]);
                $m->screw_size = $request->screwSize;
            }
            if ($request->filled('productionCapacity')){
                 $request->validate([
                    'productionCapacity' => 'min:0',
                ]);
                $m->production_capacity = $request->productionCapacity;
            }
            if ($request->filled('LDRatio')){
                 $request->validate([
                    'LDRatio' => 'min:0',
                ]);
                $m->ld_ratio = $request->LDRatio;
            }
            $m->save();
            Session::flash('Success', "The Machine has been created successfully.");
            return redirect()->route('machine.list');
        } else {
            abort(403);
        }
    }




    public function edit($mid)
    {
        if (Auth::user()->can('machine')) {
            $medit = Machine::find($mid);
            $medit['factoryName'] = Factory::find($medit->factory_id)->name;
            $medit['categoryName'] = Machinecategory::find($medit->machinecategory_id)->name;
            $factories = Factory::all();
            $machineCategories = Machinecategory::all();
            $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM machines GROUP BY manufacturer'));
            $datalist['type'] = DB::select(DB::raw('SELECT type FROM machines GROUP BY type'));
            return view('machine.edit', compact('medit','factories', 'machineCategories', 'datalist'));
        } else {
            abort(403);
        }
    }




    public function update(Request $request, $mid)
    {
        if (Auth::user()->can('machine')) {
            $request->validate([
                'category' => 'required',
                'factory' => 'required',
                'manufacturerName' => 'required',
                'typeOrModelNumber' => 'required',
                'serialNumber' => 'required',
                'manufacturerYear' => 'required',
                'countryOfOrigin' => 'required',
            ]);
            $m = Machine::find($mid);
            if ($m->identification_code != $request->serialNumber){
                $request->validate([
                    'serialNumber' => 'unique:machines,identification_code',
                ]);
            }
            $m->machinecategory_id = $request->category;
            $m->factory_id = $request->factory;
            $m->manufacturer = $request->manufacturerName;
            $m->type = $request->typeOrModelNumber;
            $m->identification_code = $request->serialNumber;
            $m->manufacture_year = $request->manufacturerYear;
            $m->manufacture_country = $request->countryOfOrigin;
            if ($request->filled('skOrDk')){
                $m->sk_dk = $request->skOrDk;
            }
            if ($request->filled('pitchSize')){
                $request->validate([
                    'pitchSize' => 'min:0',
                ]);
                $m->pitch_size = $request->pitchSize;
            }
            if ($request->filled('spoolDiameter')){
                $request->validate([
                    'spoolDiameter' => 'min:0',
                ]);
                $m->spool_diameter = $request->spoolDiameter;
            }
            if ($request->filled('numberOfShuttles')){
                $request->validate([
                    'numberOfShuttles' => 'min:0',
                ]);
                $m->number_of_shuttles = $request->numberOfShuttles;
            }
            if (($request->filled('ropeSizeStart')) || ($request->filled('ropeSizeEnd')) ){
                $request->validate([
                    'ropeSizeStart' => 'required|min:0',
                    'ropeSizeEnd' => 'required|min:0',
                ]);
                $m->rope_size_from = $request->ropeSizeStart;
                $m->rope_size_to = $request->ropeSizeEnd;
            }
            if (($request->filled('sizeRangeStart')) || ($request->filled('sizeRangeEnd')) ){
                $request->validate([
                    'sizeRangeStart' => 'required|min:0',
                    'sizeRangeEnd' => 'required|min:0',
                ]);
                $m->size_range_from = $request->sizeRangeStart;
                $m->size_range_to = $request->sizeRangeEnd;
            }
            if ($request->filled('screwSize')){
                $request->validate([
                    'screwSize' => 'min:0',
                ]);
                $m->screw_size = $request->screwSize;
            }
            if ($request->filled('productionCapacity')){
                $request->validate([
                    'productionCapacity' => 'min:0',
                ]);
                $m->production_capacity = $request->productionCapacity;
            }
            if ($request->filled('LDRatio')){
                $request->validate([
                    'LDRatio' => 'min:0',
                ]);
                $m->ld_ratio = $request->LDRatio;
            }
            $m->update();
            Session::flash('Success', "The Machine has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }



    public function destroy($mid)
    {
        if (Auth::user()->can('machine')) {
            Machine::find($mid)->delete();
            Session::flash('Success', "The Machine has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }



}

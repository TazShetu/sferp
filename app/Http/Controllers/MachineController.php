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
//            session()->forget('mcid');
            $factories = Factory::all();
            $machineCategories = Machinecategory::all();
            return view('machine.create', compact('machineCategories', 'factories'));
        } else {
            abort(403);
        }
    }



    public function store(Request $request, $mcid)
    {
        if (Auth::user()->can('machine')) {
            if (($mcid * 1) == 1){
                // Fishing Net Machine
                session(['mcid' => 1]);
                $request->validate([
                    'manufacturerName' => 'required',
                    'typeOrModelNumber' => 'required',
                    'serialNumber' => 'required|unique:machines,identification_code',
                    'manufacturerYear' => 'required',
                    'countryOfOrigin' => 'required',
                    'skOrDk' => 'required',
                    'pitchSize' => 'required',
                    'spoolDiameter' => 'required',
                    'numberOfShuttles' => 'required',
                    'factory' => 'required',
                ]);
                $m = new Machine;
                $m->identification_code = $request->serialNumber;
                $m->machinecategory_id = $mcid;
                $m->factory_id = $request->factory;
                $m->manufacturer = $request->manufacturerName;
                $m->manufacture_year = $request->manufacturerYear;
                $m->manufacture_country = $request->countryOfOrigin;
                $m->type = $request->typeOrModelNumber;
                $m->sk_dk = $request->skOrDk;
                $m->pitch_size = $request->pitchSize;
                $m->spool_diameter = $request->spoolDiameter;
                $m->number_of_shuttles = $request->numberOfShuttles;
                $m->save();
            }elseif (($mcid * 1) == 2){
                // Rope Making Machine
                session(['mcid' => 2]);
                $request->validate([
                    'manufacturerName' => 'required',
                    'typeOrModelNumber' => 'required',
                    'serialNumber' => 'required|unique:machines,identification_code',
                    'manufacturerYear' => 'required',
                    'countryOfOrigin' => 'required',
                    'ropeSizeStart' => 'required',
                    'ropeSizeEnd' => 'required',
                    'factory' => 'required',
                ]);
                $m = new Machine;
                $m->identification_code = $request->serialNumber;
                $m->machinecategory_id = $mcid;
                $m->factory_id = $request->factory;
                $m->manufacturer = $request->manufacturerName;
                $m->manufacture_year = $request->manufacturerYear;
                $m->manufacture_country = $request->countryOfOrigin;
                $m->type = $request->typeOrModelNumber;
                $m->rope_size_from = $request->ropeSizeStart;
                $m->rope_size_to = $request->ropeSizeEnd;
                $m->save();
            }elseif (($mcid * 1) == 3){
                // Twisting Machine
                session(['mcid' => 3]);
                $request->validate([
                    'manufacturerName' => 'required',
                    'typeOrModelNumber' => 'required',
                    'serialNumber' => 'required|unique:machines,identification_code',
                    'manufacturerYear' => 'required',
                    'countryOfOrigin' => 'required',
                    'ropeSizeStart' => 'required',
                    'ropeSizeEnd' => 'required',
                    'factory' => 'required',
                ]);
                $m = new Machine;
                $m->identification_code = $request->serialNumber;
                $m->machinecategory_id = $mcid;
                $m->factory_id = $request->factory;
                $m->manufacturer = $request->manufacturerName;
                $m->manufacture_year = $request->manufacturerYear;
                $m->manufacture_country = $request->countryOfOrigin;
                $m->type = $request->typeOrModelNumber;
                $m->rope_size_from = $request->ropeSizeStart;
                $m->rope_size_to = $request->ropeSizeEnd;
                $m->save();
            }elseif (($mcid * 1) == 4){
                // Extruder
                session(['mcid' => 4]);
                $request->validate([
                    'manufacturerName' => 'required',
                    'typeOrModelNumber' => 'required',
                    'serialNumber' => 'required|unique:machines,identification_code',
                    'manufacturerYear' => 'required',
                    'countryOfOrigin' => 'required',
                    'screwSize' => 'required',
                    'productionCapacity' => 'required',
                    'factory' => 'required',
                ]);
                $m = new Machine;
                $m->identification_code = $request->serialNumber;
                $m->machinecategory_id = $mcid;
                $m->factory_id = $request->factory;
                $m->manufacturer = $request->manufacturerName;
                $m->manufacture_year = $request->manufacturerYear;
                $m->manufacture_country = $request->countryOfOrigin;
                $m->type = $request->typeOrModelNumber;
                $m->screw_size = $request->screwSize;
                $m->production_capacity = $request->productionCapacity;
                $m->save();
            }
            session()->forget('mcid');
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
            $factories = Factory::all();
            return view('machine.edit', compact('medit','factories'));
        } else {
            abort(403);
        }
    }




    public function update(Request $request, $mid)
    {
        if (Auth::user()->can('machine')) {
            $request->validate([
                'manufacturerName' => 'required',
                'typeOrModelNumber' => 'required',
                'serialNumber' => 'required',
                'manufacturerYear' => 'required',
                'countryOfOrigin' => 'required',
                'factory' => 'required',
            ]);
            $m = Machine::find($mid);
            if ($m->identification_code != $request->serialNumber){
                $request->validate([
                    'serialNumber' => 'unique:machines,identification_code',
                ]);
            }
            if (($m->machinecategory_id * 1) == 1){
                // Fishing Net Machine
                $request->validate([
                    'skOrDk' => 'required',
                    'pitchSize' => 'required',
                    'spoolDiameter' => 'required',
                    'numberOfShuttles' => 'required',
                ]);
                $m->identification_code = $request->serialNumber;
                $m->factory_id = $request->factory;
                $m->manufacturer = $request->manufacturerName;
                $m->manufacture_year = $request->manufacturerYear;
                $m->manufacture_country = $request->countryOfOrigin;
                $m->type = $request->typeOrModelNumber;
                $m->sk_dk = $request->skOrDk;
                $m->pitch_size = $request->pitchSize;
                $m->spool_diameter = $request->spoolDiameter;
                $m->number_of_shuttles = $request->numberOfShuttles;
                $m->update();
            }elseif (($m->machinecategory_id * 1) == 2){
                // Rope Making Machine
                $request->validate([
                    'ropeSizeStart' => 'required',
                    'ropeSizeEnd' => 'required',
                ]);
                $m->identification_code = $request->serialNumber;
                $m->factory_id = $request->factory;
                $m->manufacturer = $request->manufacturerName;
                $m->manufacture_year = $request->manufacturerYear;
                $m->manufacture_country = $request->countryOfOrigin;
                $m->type = $request->typeOrModelNumber;
                $m->rope_size_from = $request->ropeSizeStart;
                $m->rope_size_to = $request->ropeSizeEnd;
                $m->update();
            }elseif (($m->machinecategory_id * 1) == 3){
                // Twisting Machine
                $request->validate([
                    'ropeSizeStart' => 'required',
                    'ropeSizeEnd' => 'required',
                ]);
                $m->identification_code = $request->serialNumber;
                $m->factory_id = $request->factory;
                $m->manufacturer = $request->manufacturerName;
                $m->manufacture_year = $request->manufacturerYear;
                $m->manufacture_country = $request->countryOfOrigin;
                $m->type = $request->typeOrModelNumber;
                $m->rope_size_from = $request->ropeSizeStart;
                $m->rope_size_to = $request->ropeSizeEnd;
                $m->update();
            }elseif (($m->machinecategory_id * 1) == 4){
                // Extruder
                $request->validate([
                    'screwSize' => 'required',
                    'productionCapacity' => 'required',
                ]);
                $m->identification_code = $request->serialNumber;
                $m->factory_id = $request->factory;
                $m->manufacturer = $request->manufacturerName;
                $m->manufacture_year = $request->manufacturerYear;
                $m->manufacture_country = $request->countryOfOrigin;
                $m->type = $request->typeOrModelNumber;
                $m->screw_size = $request->screwSize;
                $m->production_capacity = $request->productionCapacity;
                $m->update();
            }
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

<?php

namespace App\Http\Controllers;

use App\Factory;
use App\Machine;
use App\Machinecategory;
use App\Spareparts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MachineController extends Controller
{

    public function list(Request $request)
    {
        if ($request->factoryId) {
            $machines = Machine::where('manufacturer', 'LIKE', "%{$request->manufacturer}%")
                ->Where('category', 'LIKE', "%{$request->category}%")
                ->Where('factory_id', 'LIKE', "$request->factoryId")
                ->Where('manufacture_country', 'LIKE', "%{$request->country}%")
                ->paginate(10);
        } else {
            $machines = Machine::where('manufacturer', 'LIKE', "%{$request->manufacturer}%")
                ->Where('category', 'LIKE', "%{$request->category}%")
                ->Where('manufacture_country', 'LIKE', "%{$request->country}%")
                ->paginate(10);
        }
        foreach ($machines as $m) {
            $m['factory'] = Factory::find($m->factory_id)->name;
        }
        $factories = Factory::all();
        if ($request->factoryId) {
            $machines->appends(['manufacturer' => "$request->manufacturer", 'category' => "$request->category", 'factoryId' => "$request->factoryId", 'country' => "$request->country"]);
        } else {
            $machines->appends(['manufacturer' => "$request->manufacturer", 'category' => "$request->category", 'country' => "$request->country"]);
        }
        $query = $request->all();
        if ((count($query) > 0) && array_key_exists("factoryId", $query)) {
            $query['factoryName'] = Factory::find($query['factoryId'])->name;
        }
        return view('machine.list', compact('machines', 'factories', 'query'));
    }


    public function create()
    {
        $factories = Factory::all();
        $datalist['category'] = DB::select(DB::raw('SELECT category FROM machines GROUP BY category'));
        $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM machines GROUP BY manufacturer'));
        $datalist['type'] = DB::select(DB::raw('SELECT type FROM machines GROUP BY type'));
        return view('machine.create', compact('factories', 'datalist'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'factory' => 'required',
            'manufacturerName' => 'required',
            'typeOrModelNumber' => 'required',
//                'serialNumber' => 'required|unique:machines,identification_code',
//                'manufacturerYear' => 'required',
            'countryOfOrigin' => 'required',
        ]);
        $m = new Machine;
        $m->category = $request->category;
        $m->factory_id = $request->factory;
        $m->manufacturer = $request->manufacturerName;
        $m->tag = str_replace(' ', ';.;', $request->manufacturerName) . ' ' . str_replace(' ', ';.;', $request->category);
        $m->type = $request->typeOrModelNumber;
        $m->identification_code = $request->serialNumber;
        $m->manufacture_year = $request->manufacturerYear;
        $m->manufacture_country = $request->countryOfOrigin;
        if ($request->filled('skOrDk')) {
            $m->sk_dk = $request->skOrDk;
        }
        if ($request->filled('pitchSize')) {
            $request->validate([
                'pitchSize' => 'min:0',
            ]);
            $m->pitch_size = $request->pitchSize;
        }
        if ($request->filled('spoolDiameter')) {
            $request->validate([
                'spoolDiameter' => 'min:0',
            ]);
            $m->spool_diameter = $request->spoolDiameter;
        }
        if ($request->filled('numberOfShuttles')) {
            $request->validate([
                'numberOfShuttles' => 'min:0',
            ]);
            $m->number_of_shuttles = $request->numberOfShuttles;
        }
        if (($request->filled('ropeSizeStart')) || ($request->filled('ropeSizeEnd'))) {
            $request->validate([
                'ropeSizeStart' => 'required|min:0',
                'ropeSizeEnd' => 'required|min:0',
            ]);
            $m->rope_size_from = $request->ropeSizeStart;
            $m->rope_size_to = $request->ropeSizeEnd;
        }
        if (($request->filled('sizeRangeStart')) || ($request->filled('sizeRangeEnd'))) {
            $request->validate([
                'sizeRangeStart' => 'required|min:0',
                'sizeRangeEnd' => 'required|min:0',
            ]);
            $m->size_range_from = $request->sizeRangeStart;
            $m->size_range_to = $request->sizeRangeEnd;
        }
        if ($request->filled('screwSize')) {
            $request->validate([
                'screwSize' => 'min:0',
            ]);
            $m->screw_size = $request->screwSize;
        }
        if ($request->filled('productionCapacity')) {
            $request->validate([
                'productionCapacity' => 'min:0',
            ]);
            $m->production_capacity = $request->productionCapacity;
        }
        if ($request->filled('LDRatio')) {
            $request->validate([
                'LDRatio' => 'min:0',
            ]);
            $m->ld_ratio = $request->LDRatio;
        }
        if ($request->filled('ringSize')) {
            $request->validate([
                'ringSize' => 'min:0',
            ]);
            $m->ring_size = $request->ringSize;
        }
        $m->manual_location = $request->manualLocation;
        if ($request->hasFile('manual')) {
            $img = $request->manual;
            $img_name = time() . $img->getClientOriginalName();
            $a = $img->move('uploads/Manual/machine', $img_name);
            $d = 'uploads/Manual/machine/' . $img_name;
            $m->manual = $d;
        }
        if ($request->hasFile('smanual')) {
            $img = $request->smanual;
            $img_name = time() . $img->getClientOriginalName();
            $a = $img->move('uploads/Manual/machine', $img_name);
            $d = 'uploads/Manual/machine/' . $img_name;
            $m->smanual = $d;
        }
        $m->save();
        Session::flash('Success', "The Machine has been created successfully.");
        return redirect()->route('machine.list');
    }


    public function edit($mid)
    {
        $medit = Machine::find($mid);
        $spareParts = $medit->spareparts()->get();
        $allSpareParts = Spareparts::all();
        $medit['factoryName'] = Factory::find($medit->factory_id)->name;
        $factories = Factory::all();
        $datalist['category'] = DB::select(DB::raw('SELECT category FROM machines GROUP BY category'));
        $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM machines GROUP BY manufacturer'));
        $datalist['type'] = DB::select(DB::raw('SELECT type FROM machines GROUP BY type'));
        return view('machine.edit', compact('medit', 'spareParts', 'allSpareParts', 'factories', 'datalist'));
    }


    public function update(Request $request, $mid)
    {
        $request->validate([
            'category' => 'required',
            'factory' => 'required',
            'manufacturerName' => 'required',
            'typeOrModelNumber' => 'required',
//                'serialNumber' => 'required',
//                'manufacturerYear' => 'required',
            'countryOfOrigin' => 'required',
        ]);
        $m = Machine::find($mid);
        $m->category = $request->category;
        $m->factory_id = $request->factory;
        $m->manufacturer = $request->manufacturerName;
        $m->type = $request->typeOrModelNumber;
        $m->identification_code = $request->serialNumber;
        $m->manufacture_year = $request->manufacturerYear;
        $m->manufacture_country = $request->countryOfOrigin;
        if ($request->filled('skOrDk')) {
            $m->sk_dk = $request->skOrDk;
        }
        if ($request->filled('pitchSize')) {
            $request->validate([
                'pitchSize' => 'min:0',
            ]);
            $m->pitch_size = $request->pitchSize;
        }
        if ($request->filled('spoolDiameter')) {
            $request->validate([
                'spoolDiameter' => 'min:0',
            ]);
            $m->spool_diameter = $request->spoolDiameter;
        }
        if ($request->filled('numberOfShuttles')) {
            $request->validate([
                'numberOfShuttles' => 'min:0',
            ]);
            $m->number_of_shuttles = $request->numberOfShuttles;
        }
        if (($request->filled('ropeSizeStart')) || ($request->filled('ropeSizeEnd'))) {
            $request->validate([
                'ropeSizeStart' => 'required|min:0',
                'ropeSizeEnd' => 'required|min:0',
            ]);
            $m->rope_size_from = $request->ropeSizeStart;
            $m->rope_size_to = $request->ropeSizeEnd;
        }
        if (($request->filled('sizeRangeStart')) || ($request->filled('sizeRangeEnd'))) {
            $request->validate([
                'sizeRangeStart' => 'required|min:0',
                'sizeRangeEnd' => 'required|min:0',
            ]);
            $m->size_range_from = $request->sizeRangeStart;
            $m->size_range_to = $request->sizeRangeEnd;
        }
        if ($request->filled('screwSize')) {
            $request->validate([
                'screwSize' => 'min:0',
            ]);
            $m->screw_size = $request->screwSize;
        }
        if ($request->filled('productionCapacity')) {
            $request->validate([
                'productionCapacity' => 'min:0',
            ]);
            $m->production_capacity = $request->productionCapacity;
        }
        if ($request->filled('LDRatio')) {
            $request->validate([
                'LDRatio' => 'min:0',
            ]);
            $m->ld_ratio = $request->LDRatio;
        }
        if ($request->filled('ringSize')) {
            $request->validate([
                'ringSize' => 'min:0',
            ]);
            $m->ring_size = $request->ringSize;
        }
        $m->manual_location = $request->manualLocation;
        if ($request->hasFile('manual')) {
            if ($m->manual) {
                unlink($m->manual);
            }
            $img = $request->manual;
            $img_name = time() . $img->getClientOriginalName();
            $a = $img->move('uploads/Manual/machine', $img_name);
            $d = 'uploads/Manual/machine/' . $img_name;
            $m->manual = $d;
        }
        $m->update();
        Session::flash('Success', "The Machine has been updated successfully.");
        return redirect()->back();
    }


    public function destroy($mid)
    {
        $m = Machine::find($mid);
        $m->spareparts()->detach();
        Machine::find($mid)->delete();
        Session::flash('Success', "The Machine has been deleted successfully.");
        return redirect()->back();
    }


    public function updateMachineSparePart(Request $request, $mid)
    {
        $machine = Machine::find($mid);
        if ($request->filled('sparePart')) {
            $spareparts = array_unique($request->sparePart);
            $machine->spareparts()->sync($spareparts);
        } else {
            $machine->spareparts()->detach();
        }
        Session::flash('Success', "The Machine has been successfully updated with spare parts.");
        return redirect()->back();
    }


    public function mmd($mid)
    {
        $m = Machine::find($mid);
        return response()->download(public_path($m->manual));
    }


}

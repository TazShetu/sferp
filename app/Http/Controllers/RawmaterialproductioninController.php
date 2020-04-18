<?php

namespace App\Http\Controllers;

use App\Factory;
use App\Machine;
use App\Rawmaterial;
use App\Rawmaterialproductionin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RawmaterialproductioninController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function in()
    {
        if (Auth::user()->can('raw_material_in_production')) {
            $rawmaterials = Rawmaterial::all();
            $factories = Factory::all();
            return view('Production.direct.rawmaterialin', compact('rawmaterials', 'factories'));
        } else {
            abort(403);
        }
    }


    public function ajaxFidToMachine(Request $request)
    {
        if (request()->ajax() && Auth::user()->can('raw_material_in_production')) {
            $machines = Machine::where('factory_id', $request->fid)->get();
            if (count($machines) > 0) {
                $html = ' <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Machine</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker" name="machine" required>
                                    <option selected disabled hidden value="">Choose...</option>';
                foreach ($machines as $f) {
                    $html .= "<option value='$f->id'>'$f->identification_code'</option>";
                }
                $html .= ' </select></div></div>';
            } else {
                $html = '<div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Machine</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control kt-selectpicker" required>
                                    <option selected disabled value="">
                                        There is no machine in this Factory :(
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


    public function inStore(Request $request)
    {
        if (Auth::user()->can('raw_material_in_production')) {
            $request->validate([
                'rawMaterial' => 'required',
                'quantity' => 'required|min:1',
                'factory' => 'required',
                'machine' => 'required',
            ]);
            $r = new Rawmaterialproductionin;
            $r->rawmaterial_id = $request->rawMaterial;
            $r->quantity = $request->quantity;
            $r->factory_id = $request->factory;
            $r->machine_id = $request->machine;
            $r->user_id = Auth::id();
            $r->save();
            Session::flash('Success', "The Raw Material has been stocked in for Production successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function history()
    {
        if (Auth::user()->can('raw_material_in_production')) {
            $rmsos = Rawmaterialproductionin::orderBy('created_at', 'DESC')->paginate(20);
            foreach ($rmsos as $sp) {
                $s = Rawmaterial::find($sp->rawmaterial_id);
                $sp['rm'] = $s->auto_id;
                $sp['unit'] = $s->unit;
                $sp['user'] = User::find($sp->user_id)->name;
                $sp['factory'] = Factory::find($sp->factory_id)->name;
                $sp['machine'] = Machine::find($sp->machine_id)->identification_code;
            }
            return view('Production.direct.rawmaterialinHistory', compact('rmsos'));
        } else {
            abort(403);
        }
    }


}

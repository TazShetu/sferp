<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Employeetype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DesignationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->can('hr_designation')) {
            $types = Employeetype::all();
            $designations = Designation::orderBy('employeetype_id')->get();
            foreach ($designations as $d){
                $d['type'] = Employeetype::find($d->employeetype_id)->title;
            }
            return view('HR.Designation.index', compact('types', 'designations'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('hr_designation')) {
            $this->validate($request, [
//                'title' => 'required|unique:designations,title',
                'type' => 'required',
                'title' => 'required',
                'code' => 'required',
            ]);
            $j = new Designation;
            $j->employeetype_id = $request->type;
            $j->title = $request->title;
            $j->code = $request->code;
            $j->save();
            Session::flash('Success', "Designation has been created successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($did)
    {
        if (Auth::user()->can('hr_designation')) {
            $dedit = Designation::find($did);
            $dedit['type'] = Employeetype::find($dedit->employeetype_id)->title;
//            $types = Employeetype::all();
            $designations = Designation::orderBy('employeetype_id')->get();
            foreach ($designations as $d){
                $d['type'] = Employeetype::find($d->employeetype_id)->title;
            }
            return view('HR.Designation.edit', compact('dedit', 'designations'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $did)
    {
        if (Auth::user()->can('hr_designation')) {
            $this->validate($request, [
                'title' => 'required',
                'code' => 'required',
            ]);
            $j = Designation::find($did);
            $j->title = $request->title;
            $j->code = $request->code;
            $j->update();
            Session::flash('Success', "Designation has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function destroy($did)
    {
        if (Auth::user()->can('hr_designation')) {
            $d = Designation::find($did);
            $es = $d->employees()->get();
            if (count($es) > 0){
                Session::flash('unsuccess', "The Designation has assigned employee and can not be deleted.");
                return redirect()->back();
            } else {
                $d->delete();
                Session::flash('Success', "The Designation has has been deleted successfully.");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }
}

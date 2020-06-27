<?php

namespace App\Http\Controllers;

use App\Designation;
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
            $designations = Designation::orderBy('title')->get();
            return view('HR.Designation.index', compact('designations'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('hr_designation')) {
            $this->validate($request, [
                'title' => 'required|unique:designations,title',
            ]);
            $j = new Designation;
            $j->title = $request->title;
            $j->save();
            Session::flash('Success', "Designation '$j->title' has been created successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($did)
    {
        if (Auth::user()->can('hr_designation')) {
            $dedit = Designation::find($did);
            $designations = Designation::orderBy('title')->get();
            return view('HR.Designation.edit', compact('dedit', 'designations'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $did)
    {
        if (Auth::user()->can('hr_designation')) {
            $this->validate($request, [
                'title' => 'required|unique:designations,title',
            ]);
            $j = Designation::find($did);
            $j->title = $request->title;
            $j->update();
            Session::flash('Success', "Designation '$j->title' has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function destroy($did)
    {
        if (Auth::user()->can('hr_designation')) {
            Designation::find($did)->delete();
            Session::flash('Success', "The Designation has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }
}

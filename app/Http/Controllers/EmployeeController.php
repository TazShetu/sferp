<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Auth::user()->can('hr_employee')) {
            if ($request->designationId){
                $employees = Employee::Where('name', 'LIKE', "%{$request->name}%")
                    ->Where('designation_id', 'LIKE', "$request->designationId")
                    ->Where('mobile', 'LIKE', "%{$request->mobile}%")
                    ->paginate(10);
            }else {
                $employees = Employee::Where('name', 'LIKE', "%{$request->name}%")
                    ->Where('mobile', 'LIKE', "%{$request->mobile}%")
                    ->paginate(10);
            }
            foreach ($employees as $e) {
                $e['designation'] = Designation::find($e->designation_id)->title;
            }
            $designations = Designation::all();
            if ($request->factoryId){
                $employees->appends(['name' => "$request->name", 'designationId' => "$request->designationId", 'mobile' => "$request->mobile"]);
            } else {
                $employees->appends(['name' => "$request->name", 'mobile' => "$request->mobile"]);
            }
            $query = $request->all();
            if ((count($query) > 0) && array_key_exists("designationId", $query)){
                $query['designationName'] = Designation::find($query['designationId'])->title;
            }
            return view('HR.Employee.list', compact('employees', 'designations', 'query'));
        } else {
            abort(403);
        }

    }


    public function create()
    {
        if (Auth::user()->can('hr_employee')) {
            $designations = Designation::all();
            return view('HR.Employee.create', compact('designations'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('hr_employee')) {
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'mobile' => 'required',
            ]);
            $e = new Employee;
            $e->name = $request->name;
            $e->designation_id = $request->designation;
            $e->mobile = $request->mobile;
            if ($request->filled('dateOfBirth')){
                $e->dob = date('Y-m-d', strtotime($request->dateOfBirth));
            }
            $e->email = $request->email;
            $e->address = $request->address;
            $e->nid = $request->nid;
            $e->save();
            Session::flash('Success', "The Employee has been created successfully.");
            return redirect()->route('employee.list');
        } else {
            abort(403);
        }
    }


    public function edit($eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $eedit = Employee::find($eid);
            $eedit['designation'] = Designation::find($eedit->designation_id)->title;
            $designations = Designation::all();
            return view('HR.Employee.edit', compact('eedit', 'designations'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'mobile' => 'required',
            ]);
            $e = Employee::find($eid);
            $e->name = $request->name;
            $e->designation_id = $request->designation;
            $e->mobile = $request->mobile;
            if ($request->filled('dateOfBirth')){
                $e->dob = date('Y-m-d', strtotime($request->dateOfBirth));
            }
            $e->email = $request->email;
            $e->address = $request->address;
            $e->nid = $request->nid;
            $e->update();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function destroy($eid)
    {
        if (Auth::user()->can('hr_employee')) {
            Employee::find($eid)->delete();
            Session::flash('Success', "The Employee has has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }
}

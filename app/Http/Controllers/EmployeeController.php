<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Employee;
use App\Employeetype;
use App\Factory;
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
            if ($request->designationId) {
                $employees = Employee::Where('name', 'LIKE', "%{$request->name}%")
                    ->Where('designation_id', 'LIKE', "$request->designationId")
                    ->paginate(10);
            } else {
                $employees = Employee::Where('name', 'LIKE', "%{$request->name}%")
                    ->paginate(10);
            }
            foreach ($employees as $e) {
                $e['designation'] = Designation::find($e->designation_id)->title;
                $e['type'] = Employeetype::find($e->employeetype_id)->title;
            }
            $designations = Designation::all();
            $types = Employeetype::all();
            if ($request->designationId) {
                $employees->appends(['name' => "$request->name", 'designationId' => "$request->designationId"]);
            } else {
                $employees->appends(['name' => "$request->name"]);
            }
            $query = $request->all();
            if ((count($query) > 0) && array_key_exists("designationId", $query)) {
                $query['designationName'] = Designation::find($query['designationId'])->title;
            }
            return view('HR.Employee.list', compact('employees', 'designations', 'query', 'types'));
        } else {
            abort(403);
        }

    }


    public function create()
    {
        if (Auth::user()->can('hr_employee')) {
            $factories = Factory::all();
            $types = Employeetype::all();
            return view('HR.Employee.create', compact('factories', 'types'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('hr_employee')) {
            $request->validate([
                'factory' => 'required',
                'type' => 'required',
                'designation' => 'required',
                'name' => 'required',
                'dateOfJoining' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $e = new Employee;
                $e->employeetype_id = $request->type;
                $e->designation_id = $request->designation;
                $e->name = $request->name;
                $e->doj = date('Y-m-d', strtotime($request->dateOfJoining));
                $code = '';
                foreach ($request->factory as $f) {
                    $code .= Factory::find($f)->code;
                }
                $code .= Designation::find($request->designation)->code;
                $e->code = $code;
                $e->save();
                $e->code = $e->code.$e->id;
                $e->update();
                $e->factories()->attach($request->factory);
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Employee has been created successfully.");
                return redirect()->route('employee.list');
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
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
            if ($request->filled('dateOfBirth')) {
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


    public function tidToDesignation(Request $request)
    {
        if (request()->ajax()) {
            $html = '';
            $tid = $request->tid;
            $ds = Designation::where('employeetype_id', $tid)->get();
            if (count($ds) > 0) {
                foreach ($ds as $d) {
                    $html .= "<option value=" . $d->id . ">" . $d->title . "</option>";
                }
            } else {
                $html .= '<option selected disabled hidden value="">No Designation in this Employee Type</option>';
            }

            return $html;
        } else {
            return json_encode(['success' => false]);
        }
    }


}

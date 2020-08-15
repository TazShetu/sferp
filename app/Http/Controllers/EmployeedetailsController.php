<?php

namespace App\Http\Controllers;

use App\Employeedetail;
use App\Employeefile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmployeedetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function updatePinfo(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->name_bengali = $request->name;
            if ($request->filled('dateOfBirth')) {
                $e->dob = date('Y-m-d', strtotime($request->dateOfBirth));
            }
            $e->m_status = $request->mstatus;
            $e->b_number = $request->bcn;
            $e->nid = $request->nid;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateStaffAC(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->school_ssc = $request->sscSchool;
            $e->date_ssc = $request->sscYear;
            $e->result_ssc = $request->sscResult;
            $e->school_hsc = $request->hscSchool;
            $e->date_hsc = $request->hscYear;
            $e->result_hsc = $request->hscResult;
            $e->institute_graduation = $request->gInstitute;
            $e->date_graduation = $request->graduationYear;
            $e->result_graduation = $request->graduationResult;
            $e->institute_Pgraduation = $request->pgInstitute;
            $e->date_Pgraduation = $request->pgraduationYear;
            $e->result_Pgraduation = $request->pgraduationResult;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateAddress(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->current_address = $request->currentAddress;
            $e->permanent_address = $request->permanentAddress;
            $e->permanent_address_bengali = $request->permanentAddressB;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateCinfo(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->mobile_1 = $request->mobile1;
            $e->mobile_2 = $request->mobile2;
            $e->email_1 = $request->email1;
            $e->email_2 = $request->email2;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateFinfo(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->spouse_name = $request->sname;
            $e->spouse_mobile_1 = $request->smobile1;
            $e->spouse_mobile_2 = $request->smobile2;
            $e->spouse_nid = $request->snid;
            $e->father_name = $request->fname;
            $e->father_profession = $request->fprofession;
            $e->father_nid = $request->fnid;
            $e->mother_name = $request->mname;
            $e->mother_profession = $request->mprofession;
            $e->mother_nid = $request->mnid;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateStaffS(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->sibling_1_name = $request->sname1;
            $e->sibling_1_profession = $request->sp1;
            $e->sibling_2_name = $request->sname2;
            $e->sibling_2_profession = $request->sp2;
            $e->sibling_3_name = $request->sname3;
            $e->sibling_3_profession = $request->sp3;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateExperience(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->company_1 = $request->cname1;
            $e->designation_1 = $request->designation1;
            if ($request->filled('from1')) {
                $e->from_1 = date('Y-m-d', strtotime($request->from1));
            }
            if ($request->filled('to1')) {
                $e->to_1 = date('Y-m-d', strtotime($request->to1));
            }
            $e->duration_1 = $request->duration1;
            $e->company_2 = $request->cname2;
            $e->designation_2 = $request->designation2;
            if ($request->filled('from2')) {
                $e->from_2 = date('Y-m-d', strtotime($request->from2));
            }
            if ($request->filled('to2')) {
                $e->to_2 = date('Y-m-d', strtotime($request->to2));
            }
            $e->duration_2 = $request->duration2;
            $e->company_3 = $request->cname3;
            $e->designation_3 = $request->designation3;
            if ($request->filled('from3')) {
                $e->from_3 = date('Y-m-d', strtotime($request->from3));
            }
            if ($request->filled('to3')) {
                $e->to_3 = date('Y-m-d', strtotime($request->to3));
            }
            $e->duration_3 = $request->duration3;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateEmergencyContact(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->ecname_1 = $request->cname1;
            $e->ecmobile_1 = $request->mobile1;
            $e->ecrelation_1 = $request->relation1;
            $e->ecaddress_1 = $request->address1;
            $e->ecname_2 = $request->cname2;
            $e->ecmobile_2 = $request->mobile2;
            $e->ecrelation_2 = $request->relation2;
            $e->ecaddress_2 = $request->address2;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateStaffBank(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->baccount_1 = $request->account1;
            $e->baccount_type_1 = $request->type1;
            $e->bank_1 = $request->bank1;
            $e->branch_1 = $request->branch1;
            $e->baccount_2 = $request->account2;
            $e->baccount_type_2 = $request->type2;
            $e->bank_2 = $request->bank2;
            $e->branch_2 = $request->branch2;
            $e->baccount_3 = $request->account3;
            $e->baccount_type_3 = $request->type3;
            $e->bank_3 = $request->bank3;
            $e->branch_3 = $request->branch3;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateStaffBankM(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->bkash = $request->bkash;
            $e->nagad = $request->nagad;
            $e->rocket = $request->rocket;
            $e->ucash = $request->ucash;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateAB(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->height_academic = $request->hal;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateSGTPC(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $e = Employeedetail::where('employee_id', $eid)->first();
            if (!$e) {
                $e = new Employeedetail;
                $e->employee_id = $eid;
            }
            $e->third_party_company = $request->company;
            $e->third_party_company_address = $request->address;
            $e->tpc_cp_name_1 = $request->cpname1;
            $e->tpc_cp_mobile_1 = $request->cpmobile1;
            $e->tpc_cp_name_2 = $request->cpname2;
            $e->tpc_cp_mobile_2 = $request->cpmobile2;
            $e->save();
            Session::flash('Success', "The Employee has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function updateEFUpload(Request $request, $eid)
    {
        if (Auth::user()->can('hr_employee')) {
            $request->validate([
                'description' => 'required',
//                'file2' => 'required',
            ]);
            $e = new Employeefile;
            $e->employee_id = $eid;
            $e->description = $request->description;
            if ($request->hasFile('file2')) {
                $img = $request->file2;
//                $img_name = time() . $img->getClientOriginalName();
                $img_name = $img->getClientOriginalName();
                $img->move('uploads/Employee/Files', $img_name);
                $d = 'uploads/Employee/Files/' . $img_name;
                $e->file = $d;
            } else {
                Session::flash('unsuccess', "Do not mess with the original code !!!");
                return redirect()->back();
            }
            $e->save();
            Session::flash('Success', "The File has been uploaded successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


}


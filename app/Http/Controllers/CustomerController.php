<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        if (Auth::user()->can('customer')) {
            $customers = Customer::paginate(10);
            return view('customer.list', compact('customers'));
        } else {
            abort(403);
        }
    }

    public function create()
    {
        if (Auth::user()->can('customer')) {
            return view('customer.create');
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('customer')) {
            $request->validate([
                'name' => 'required',
                'dateOfBirth' => 'required',
                'companyName' => 'required',
                'binNumber' => 'required',
                'nidNumber' => 'required',
                'businessAddress' => 'required',
                'businessArea' => 'required',
                'businessTelephone' => 'required',
                'businessEmail' => 'required',
                'customerType' => 'required',
                'companySite' => 'required',
            ]);
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->dob = $request->dateOfBirth;
            $customer->company_name = $request->companyName;
            $customer->bin = $request->binNumber;
            $customer->nid = $request->nidNumber;
            $customer->business_address = $request->businessAddress;
            $customer->business_area = $request->businessArea;
            $customer->business_telephone = $request->businessTelephone;
            $customer->business_email = $request->businessEmail;
            $customer->type = $request->customerType;
            $customer->company_site = $request->companySite;
            if ($request->hasFile('avatar')){
                $img = $request->avatar;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Customers/Image', $img_name);
                $d = 'uploads/Customers/Image/' . $img_name;
                $customer->image = $d;
            }
            if ($request->hasFile('nidFile')){
                $img = $request->nidFile;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Customers/NID', $img_name);
                $d = 'uploads/Customers/NID/' . $img_name;
                $customer->nid_file = $d;
            }
            if ($request->hasFile('binFile')){
                $img = $request->binFile;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Customers/BIN', $img_name);
                $d = 'uploads/Customers/BIN/' . $img_name;
                $customer->bin_file = $d;
            }
            if ($request->filled('businessTelephone2')){
                $customer->business_telephone_2 = $request->businessTelephone2;
            }
            if ($request->filled('businessEmail2')){
                $customer->business_email_2 = $request->businessEmail2;
            }
            $customer->save();
            Session::flash('Success', "Customer '$customer->name' has been created successfully.");
            return redirect()->route('customer.list');
        } else {
            abort(403);
        }
    }


    public function show($cid)
    {
        if (Auth::user()->can('customer')) {
            $customer = Customer::find($cid);
            // also get all the contact persons ////////////////////////////////////////
            return view('customer.profile', compact('customer'));
        } else {
            abort(403);
        }
    }

    public function edit($cid)
    {
        if (Auth::user()->can('customer')) {
            return view('customer.edit');
        } else {
            abort(403);
        }
    }



    public function destroy($cid)
    {
        if (Auth::user()->can('customer')) {
            // first check for all connections, if exist then can not delete //////////////////////////////////////////////
            $customer = Customer::find($cid);
            if ($customer->bin_file){
                unlink($customer->bin_file);
            }
            if ($customer->nid_file){
                unlink($customer->nid_file);
            }
            if ($customer->image){
                unlink($customer->image);
            }
            $customer->delete();
            Session::flash('Success', "The Customer has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }

    }

    public function index()
    {
        //
    }





    public function update(Request $request, Customer $customer)
    {
        //
    }



}

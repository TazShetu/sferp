<?php

namespace App\Http\Controllers;

use App\Contactperson;
use App\Customer;
use App\Customerproductdiscount;
use App\Customerrelation;
use App\Customertype;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $customers = Customer::paginate(4);
            foreach ($customers as $c){
                $c['type'] = Customertype::find($c->customertype_id)->title;
            }
            return view('customer.list', compact('customers'));
        } else {
            abort(403);
        }
    }

    public function create()
    {
        if (Auth::user()->can('customer')) {
            $customerTypes = Customertype::all();
            return view('customer.create', compact('customerTypes'));
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
                'tinNumber' => 'required',
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
            $customer->dob = date('Y-m-d',strtotime($request->dateOfBirth));
            $customer->company_name = $request->companyName;
            $customer->bin = $request->binNumber;
            $customer->tin = $request->tinNumber;
            $customer->nid = $request->nidNumber;
            $customer->business_address = $request->businessAddress;
            $customer->business_area = $request->businessArea;
            $customer->business_telephone = $request->businessTelephone;
            $customer->business_email = $request->businessEmail;
            $customer->customertype_id = $request->customerType;
            $customer->company_site = $request->companySite;
            if ($request->hasFile('avatar')){
                $img = $request->avatar;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Customers/Image', $img_name);
                $d = 'uploads/Customers/Image/' . $img_name;
                $customer->image = $d;
            }
            if ($request->hasFile('binFile')){
                $img = $request->binFile;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Customers/BIN', $img_name);
                $d = 'uploads/Customers/BIN/' . $img_name;
                $customer->bin_file = $d;
            }
            if ($request->hasFile('tinFile')){
                $img = $request->tinFile;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Customers/TIN', $img_name);
                $d = 'uploads/Customers/TIN/' . $img_name;
                $customer->tin_file = $d;
            }
            if ($request->hasFile('nidFile')){
                $img = $request->nidFile;
                $img_name = time() . $img->getClientOriginalName();
                $img->move('uploads/Customers/NID', $img_name);
                $d = 'uploads/Customers/NID/' . $img_name;
                $customer->nid_file = $d;
            }
            if ($request->filled('businessTelephone2')){
                $customer->business_telephone_2 = $request->businessTelephone2;
            }
            if ($request->filled('businessEmail2')){
                $customer->business_email_2 = $request->businessEmail2;
            }
            $customer->save();
            Session::flash('Success', "Customer '$customer->name' has been created successfully. You can add Contact Person in Contact Person tab.");
            session(['is_edit' => 1]);
            return redirect()->route('customer.edit', ['cid' => $customer->id]);
        } else {
            abort(403);
        }
    }


    public function show($cid)
    {
        if (Auth::user()->can('customer')) {
            $customer = Customer::find($cid);
            $customer['type'] = Customertype::find($customer->customertype_id)->title;
            $cPersons =  Contactperson::where('customer_id', $cid)->get();
            $hierarchy = Customerrelation::where('parent_id', $cid)->orWhere('child_id', $cid)->get();
            $percentage = 100;
            if (count($hierarchy) == 0){
                $percentage = $percentage - 20;
            }
            if (count($cPersons) == 0){
                $percentage = $percentage - 20;
            }
            if ($customer->img == null){
                $percentage = $percentage - 10;
            }
            if ($customer->bin_file == null){
                $percentage = $percentage - 5;
            }
            if ($customer->nid_file == null){
                $percentage = $percentage - 5;
            }
            if ($customer->business_telephone_2 == null){
                $percentage = $percentage - 5;
            }
            if ($customer->business_email_2 == null){
                $percentage = $percentage - 5;
            }
            $dealers = [];
            $subdealers = [];
            $individuals = [];
            if (count($hierarchy) > 0){
                if (($customer->customertype_id * 1) == 1){
                    // dealer
                    foreach ($hierarchy as $h){
                        if (($h->child_type_id * 1) == 2){
                            // get sub dealers
                            $subdealers[] = Customer::find($h->child_id);
                        } elseif (($h->child_type_id * 1) == 3){
                            // get individuals
                            $individuals[] = Customer::find($h->child_id);
                        }
                    }
                } elseif (($customer->customertype_id * 1) == 2){
                    // sub dealer
                    foreach ($hierarchy as $h){
                        if (($h->parent_type_id * 1) == 1){
                            // get dealers
                            $dealers[] = Customer::find($h->parent_id);
                        } elseif (($h->child_type_id * 1) == 3){
                            // get individuals
                            $individuals[] = Customer::find($h->child_id);
                        }
                    }

                } elseif (($customer->customertype_id * 1) == 3){
                    // indididuals
                    foreach ($hierarchy as $h){
                        if (($h->parent_type_id * 1) == 1){
                            // get dealers
                            $dealers[] = Customer::find($h->parent_id);
                        } elseif (($h->parent_type_id * 1) == 2){
                            // get sub dealers
                            $subdealers[] = Customer::find($h->parent_id);
                        }
                    }
                }
            }
            return view('customer.profile', compact('customer', 'cPersons', 'percentage', 'hierarchy', 'dealers', 'subdealers', 'individuals'));
        } else {
            abort(403);
        }
    }

    public function edit($cid)
    {
        if (Auth::user()->can('customer')) {
            $customer = Customer::find($cid);
            $customer['type'] = Customertype::find($customer->customertype_id)->title;
            $cPersons =  Contactperson::where('customer_id', $cid)->get();
            $is_edit = false;
            if (session()->has('is_edit')){
                $is_edit = true;
                session()->forget('is_edit');
            }
            $customerTypes = Customertype::all();
            $subDealers = null;
            $individuals = null;
            if (($customer->customertype_id * 1) == 1){
                $subDealers = Customerrelation::where('parent_id', $cid)->where('child_type_id', '2')->get();
                if (count($subDealers) > 0){
                    foreach ($subDealers as $s){
                        $s['name'] = Customer::find($s->child_id)->name;
                    }
                }
            }
            if ((($customer->customertype_id * 1) == 1) || (($customer->customertype_id * 1) == 2) ){
                $individuals = Customerrelation::where('parent_id', $cid)->where('child_type_id', '3')->get();
                if (count($individuals) > 0){
                    foreach ($individuals as $i){
                        $i['name'] = Customer::find($i->child_id)->name;
                    }
                }
            }
            $allSubDealers = Customer::where('customertype_id', '2')->get();
            $allIndividuals = Customer::where('customertype_id', '3')->get();
            $products = Product::all();
            $aps = Customerproductdiscount::where('customer_id', $cid)->get();
            foreach ($aps as $ap){
                $ap['product_name'] = Product::find($ap->product_id)->name;
            }
            return view('customer.edit', compact('customer', 'cPersons', 'is_edit', 'customerTypes', 'subDealers', 'individuals', 'allSubDealers', 'allIndividuals', 'products', 'aps'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $cid)
    {
        if (Auth::user()->can('customer')) {
            $request->validate([
                'name' => 'required',
                'dateOfBirth' => 'required',
                'companyName' => 'required',
                'binNumber' => 'required',
                'tinNumber' => 'required',
                'nidNumber' => 'required',
                'businessAddress' => 'required',
                'businessArea' => 'required',
                'businessTelephone' => 'required',
                'businessEmail' => 'required',
                'customerType' => 'required',
                'companySite' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $customer = Customer::find($cid);
                $customer->name = $request->name;
                $customer->dob = date('Y-m-d',strtotime($request->dateOfBirth));
                $customer->company_name = $request->companyName;
                $customer->bin = $request->binNumber;
                $customer->tin = $request->tinNumber;
                $customer->nid = $request->nidNumber;
                $customer->business_address = $request->businessAddress;
                $customer->business_area = $request->businessArea;
                $customer->business_telephone = $request->businessTelephone;
                $customer->business_email = $request->businessEmail;
                $customer->company_site = $request->companySite;
                if ($request->hasFile('avatar')){
                    if ($customer->image){
                        unlink($customer->image);
                    }
                    $img = $request->avatar;
                    $img_name = time() . $img->getClientOriginalName();
                    $img->move('uploads/Customers/Image', $img_name);
                    $d = 'uploads/Customers/Image/' . $img_name;
                    $customer->image = $d;
                }
                if ($request->hasFile('binFile')){
                    if ($customer->bin_file){
                        unlink($customer->bin_file);
                    }
                    $img = $request->binFile;
                    $img_name = time() . $img->getClientOriginalName();
                    $img->move('uploads/Customers/BIN', $img_name);
                    $d = 'uploads/Customers/BIN/' . $img_name;
                    $customer->bin_file = $d;
                }
                if ($request->hasFile('tinFile')){
                    if ($customer->tin_file){
                        unlink($customer->tin_file);
                    }
                    $img = $request->tinFile;
                    $img_name = time() . $img->getClientOriginalName();
                    $img->move('uploads/Customers/TIN', $img_name);
                    $d = 'uploads/Customers/TIN/' . $img_name;
                    $customer->tin_file = $d;
                }
                if ($request->hasFile('nidFile')){
                    if ($customer->nid_file){
                        unlink($customer->nid_file);
                    }
                    $img = $request->nidFile;
                    $img_name = time() . $img->getClientOriginalName();
                    $img->move('uploads/Customers/NID', $img_name);
                    $d = 'uploads/Customers/NID/' . $img_name;
                    $customer->nid_file = $d;
                }
                if ($request->filled('businessTelephone2')){
                    $customer->business_telephone_2 = $request->businessTelephone2;
                }
                if ($request->filled('businessEmail2')){
                    $customer->business_email_2 = $request->businessEmail2;
                }
                if ($customer->customertype_id != $request->customerType){
                    Customerrelation::where('parent_id', $cid)->orWhere('child_id', $cid)->delete();
                    $customer->customertype_id = $request->customerType;
                }
                $customer->update();
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "Customer '$customer->name' has been updated successfully.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function updateContactPerson(Request $request, $cid)
    {
        if (Auth::user()->can('customer')) {
            $request->validate([
                'cName' => 'required',
                'designation' => 'required',
                'number' => 'required',
            ]);
            if ((count($request->cName) != count($request->designation)) || (count($request->cName) != count($request->number)) || (count($request->designation) != count($request->number))){
                Session::flash('unsuccess', "Please do not mess with the original code !!!");
                return redirect()->back();
            }
            DB::beginTransaction();
            try {
                Contactperson::where('customer_id', $cid)->delete();
                foreach ($request->cName as $i => $name){
                    $c = new Contactperson;
                    $c->customer_id = $cid;
                    $c->name = $name;
                    $c->designation = $request->designation[$i];
                    $c->number = $request->number[$i];
                    $c->save();
                }
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Contact Person for this Customer has been updated successfully.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function destroy($cid)
    {
        if (Auth::user()->can('customer')) {
            // first check for all connections, if exist then can not delete //////////////////////////////////////////////
            DB::beginTransaction();
            try {
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
                Customerproductdiscount::where('customer_id', $cid)->delete();
                $customer->delete();
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Customer has been deleted successfully.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }

    }


    public function subDealerUpdate(Request $request, $cid)
    {
        if (Auth::user()->can('customer')) {
            DB::beginTransaction();
            try {
                Customerrelation::where('parent_id', $cid)->where('child_type_id', '2')->delete();
                if ($request->filled('subDealer')){
                    $subdealers = array_unique($request->subDealer);
                    foreach ($subdealers as $sid){
                        $c = new Customerrelation;
                        $c->parent_id = $cid;
                        $c->parent_type_id = 1;
                        $c->child_id = $sid;
                        $c->child_type_id = 2;
                        $c->save();
                    }
                }
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Sub-Dealer list has been updated successfully.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function individualUpdate(Request $request, $cid)
    {
        if (Auth::user()->can('customer')) {
            DB::beginTransaction();
            try {
                Customerrelation::where('parent_id', $cid)->where('child_type_id', '3')->delete();
                if ($request->filled('individual')){
                    $C = Customer::find($cid);
                    $individuals = array_unique($request->individual);
                    foreach ($individuals as $id){
                        $c = new Customerrelation;
                        $c->parent_id = $cid;
                        $c->parent_type_id = $C->customertype_id;
                        $c->child_id = $id;
                        $c->child_type_id = 3;
                        $c->save();
                    }
                }
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Individual list has been updated successfully.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function productDiscountUpdate(Request $request, $cid)
    {
        if (Auth::user()->can('customer')) {
            if (($request->filled('product')) || ($request->filled('discount'))){
                $request->validate([
                    'product.*' => 'required',
                    'discount.*' => 'required|min:0',
                ]);
                if (count($request->product) != count($request->discount)){
                    Session::flash('unsuccess', "Please do not mess with the original code !!!");
                    return redirect()->back();
                }
            }
            DB::beginTransaction();
            try {
                Customerproductdiscount::where('customer_id', $cid)->delete();
                if (($request->filled('product')) || ($request->filled('discount'))){
                    $products = array_unique($request->product);
                    foreach ($products as $i => $p){
                        $c = new Customerproductdiscount;
                        $c->customer_id = $cid;
                        $c->product_id = $p;
                        $c->discount = $request->discount[$i];
                        $c->save();
                    }
                }
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('Success', "The Customer Product Discount has been updated successfully.");
                return redirect()->back();
            } else {
                Session::flash('unsuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


}

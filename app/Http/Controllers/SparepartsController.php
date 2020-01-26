<?php

namespace App\Http\Controllers;

use App\Spareparts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SparepartsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


//    public function list()
//    {
//        if (Auth::user()->can('spare_parts')) {
//            $spareParts = Spareparts::paginate(10);
//            return view('spareParts.list', compact('spareParts'));
//        } else {
//            abort(403);
//        }
//    }
//
//
//    public function create()
//    {
//        if (Auth::user()->can('spare_parts')) {
//            $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM spareparts GROUP BY country_origin'));
//            $datalist['countryOfPurchase'] = DB::select(DB::raw('SELECT country_purchase FROM spareparts GROUP BY country_purchase'));
//            $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM spareparts GROUP BY manufacturer'));
//            $datalist['currency'] = DB::select(DB::raw('SELECT currency FROM spareparts GROUP BY currency'));
////            $datalist['currency'] = Spareparts::select('currency')->distinct()->get();
//           return view('spareParts.create', compact('datalist'));
//        } else {
//            abort(403);
//        }
//    }
//
//
//    public function store(Request $request)
//    {
//        if (Auth::user()->can('spare_parts')) {
//            $request->validate([
//                'countryOfOrigin' => 'required',
//                'countryOfPurchase' => 'required',
//                'manufacturerName' => 'required',
//                'manufacturerYear' => 'required',
//                'currency' => 'required',
//                'unitPrice' => 'required|min:0',
//                'priceInCnf' => 'required|min:0',
//                'priceInFob' => 'required|min:0',
//                'dateOfPurchase' => 'required',
//                'dateOfArrival' => 'required',
//                'shippedBy' => 'required',
//                'name' => 'required',
//                'description' => 'required',
//                'codeNumber' => 'required',
//                'partNumber' => 'required',
//                'identityNumber' => 'required|unique:spareparts,identity_number',
//                'invoiceNumber' => 'required',
//                'lcNumber' => 'required',
//                'note' => 'required',
//                'minimumStorage' => 'required|min:0',
//            ]);
//            $s = new Spareparts;
//            $s->country_origin = $request->countryOfOrigin;
//            $s->country_purchase = $request->countryOfPurchase;
//            $s->manufacturer = $request->manufacturerName;
//            $s->manufacture_year = $request->manufacturerYear;
//            $s->currency = $request->currency;
//            $s->unit_price = $request->unitPrice;
//            $s->unit_price_cnf = $request->priceInCnf;
//            $s->unit_price_fob = $request->priceInFob;
//            if ($request->filled('priceInDhaka')){
//                $request->validate([
//                    'priceInDhaka' => 'min:0',
//                ]);
//                $s->cnf_price_dhaka = $request->priceInDhaka;
//            }
//            if ($request->filled('priceInChittagong')){
//                $request->validate([
//                    'priceInChittagong' => 'min:0',
//                ]);
//                $s->cnf_price_chittagong = $request->priceInChittagong;
//            }
//            $s->purchase_date = date('Y-m-d',strtotime($request->dateOfPurchase));
//            $s->arrival_date = date('Y-m-d',strtotime($request->dateOfArrival));
//            $s->shipped_by = $request->shippedBy;
//            $s->name = $request->name;
//            $s->description = $request->description;
//            $s->code_number = $request->codeNumber;
//            $s->part_number = $request->partNumber;
//            $s->identity_number = $request->identityNumber;
//            $s->invoice_number = $request->invoiceNumber;
//            $s->lc_number = $request->lcNumber;
//            $s->note = $request->note;
//            $s->minimum_storage = $request->minimumStorage;
//            $s->save();
//            Session::flash('Success', "The Spare Parts has been created successfully.");
//            return redirect()->route('spareParts.list');
//        } else {
//            abort(403);
//        }
//    }
//
//
//
//    public function edit($spid)
//    {
//        if (Auth::user()->can('spare_parts')) {
//            $spedit = Spareparts::find($spid);
//            $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM spareparts GROUP BY country_origin'));
//            $datalist['countryOfPurchase'] = DB::select(DB::raw('SELECT country_purchase FROM spareparts GROUP BY country_purchase'));
//            $datalist['manufacturer'] = DB::select(DB::raw('SELECT manufacturer FROM spareparts GROUP BY manufacturer'));
//            $datalist['currency'] = DB::select(DB::raw('SELECT currency FROM spareparts GROUP BY currency'));
//            return view('spareParts.edit', compact('spedit', 'datalist'));
//        } else {
//            abort(403);
//        }
//    }
//
//
//    public function update(Request $request, $spid)
//    {
//        if (Auth::user()->can('spare_parts')) {
//            $request->validate([
//                'countryOfOrigin' => 'required',
//                'countryOfPurchase' => 'required',
//                'manufacturerName' => 'required',
//                'manufacturerYear' => 'required',
//                'currency' => 'required',
//                'unitPrice' => 'required|min:0',
//                'priceInCnf' => 'required|min:0',
//                'priceInFob' => 'required|min:0',
//                'dateOfPurchase' => 'required',
//                'dateOfArrival' => 'required',
//                'shippedBy' => 'required',
//                'name' => 'required',
//                'description' => 'required',
//                'codeNumber' => 'required',
//                'partNumber' => 'required',
//                'identityNumber' => 'required',
//                'invoiceNumber' => 'required',
//                'lcNumber' => 'required',
//                'note' => 'required',
//                'minimumStorage' => 'required|min:0',
//            ]);
//            $s = Spareparts::find($spid);
//            if ($s->identity_number != $request->identityNumber){
//                $request->validate([
//                    'identityNumber' => 'unique:spareparts,identity_number',
//                ]);
//            }
//            $s->country_origin = $request->countryOfOrigin;
//            $s->country_purchase = $request->countryOfPurchase;
//            $s->manufacturer = $request->manufacturerName;
//            $s->manufacture_year = $request->manufacturerYear;
//            $s->currency = $request->currency;
//            $s->unit_price = $request->unitPrice;
//            $s->unit_price_cnf = $request->priceInCnf;
//            $s->unit_price_fob = $request->priceInFob;
//            if ($request->filled('priceInDhaka')){
//                $request->validate([
//                    'priceInDhaka' => 'min:0',
//                ]);
//                $s->cnf_price_dhaka = $request->priceInDhaka;
//            }
//            if ($request->filled('priceInChittagong')){
//                $request->validate([
//                    'priceInChittagong' => 'min:0',
//                ]);
//                $s->cnf_price_chittagong = $request->priceInChittagong;
//            }
//            $s->purchase_date = date('Y-m-d',strtotime($request->dateOfPurchase));
//            $s->arrival_date = date('Y-m-d',strtotime($request->dateOfArrival));
//            $s->shipped_by = $request->shippedBy;
//            $s->name = $request->name;
//            $s->description = $request->description;
//            $s->code_number = $request->codeNumber;
//            $s->part_number = $request->partNumber;
//            $s->identity_number = $request->identityNumber;
//            $s->invoice_number = $request->invoiceNumber;
//            $s->lc_number = $request->lcNumber;
//            $s->note = $request->note;
//            $s->minimum_storage = $request->minimumStorage;
//            $s->update();
//            Session::flash('Success', "The Spare Parts has been updated successfully.");
//            return redirect()->back();
//        } else {
//            abort(403);
//        }
//    }
//
//
//    public function destroy($spid)
//    {
//        if (Auth::user()->can('spare_parts')) {
//            Spareparts::find($spid)->delete();
//            Session::flash('Success', "The Spare Part has been deleted successfully.");
//            return redirect()->back();
//        } else {
//            abort(403);
//        }
//    }

}

<?php

namespace App\Http\Controllers;

use App\Spareparts;
use App\Sparepartspurchase;
use App\Sroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SparepartspurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function history()
    {
        if (Auth::user()->can('sparepart_purchase')) {
            $histories = Sparepartspurchase::orderBy('created_at', 'DESC')->paginate(10);
            foreach ($histories as $h){
                $h['spare_part'] = Spareparts::find($h->spareparts_id)->description;
            }
            return view('PURCHASE.HISTORY.spareParts', compact('histories'));
        } else {
            abort(403);
        }
    }


    public function index()
    {
        if (Auth::user()->can('sparepart_purchase')) {
            $spareparts = Spareparts::all();
            $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM sparepartspurchases GROUP BY country_origin'));
            $datalist['countryOfPurchase'] = DB::select(DB::raw('SELECT country_purchase FROM sparepartspurchases GROUP BY country_purchase'));
            $datalist['currency'] = DB::select(DB::raw('SELECT currency FROM sparepartspurchases GROUP BY currency'));
            return view('PURCHASE.spareparts.index', compact('spareparts', 'datalist'));
        } else {
            abort(403);
        }
    }


    public function ajaxSpidToUnit()
    {
        if (request()->ajax()) {
            $spid = $_GET['spid'];
            $sp = Spareparts::find($spid);
            return $sp->unit;
        } else {
            return json_encode(['success' => false]);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('sparepart_purchase')) {
            $request->validate([
                'sparePart' => 'required',
                'quantity' => 'required',
                'unit' => 'required',
//                'countryOfOrigin' => 'required',
                'countryOfPurchase' => 'required',
                'manufacturerYear' => 'required',
                'currency' => 'required',
                'unitPrice' => 'required|min:0',
//                'priceInCnf' => 'required|min:0',
//                'priceInFob' => 'required|min:0',
                'totalPrice' => 'required|min:0',
                'dateOfPurchase' => 'required',
                'dateOfArrival' => 'required',
                'shippedBy' => 'required',
                'invoiceNumber' => 'required',
                'lcNumber' => 'required',
                'note' => 'required',
            ]);
            $s = new Sparepartspurchase;
            $s->spareparts_id = $request->sparePart;
            $s->quantity = $request->quantity;
            $s->unit = $request->unit;
            $s->country_origin = $request->countryOfOrigin;
            $s->country_purchase = $request->countryOfPurchase;
            $s->manufacture_year = $request->manufacturerYear;
            $s->currency = $request->currency;
            $s->unit_price = $request->unitPrice;
            $s->unit_price_cnf = $request->priceInCnf;
            $s->unit_price_fob = $request->priceInFob;
            if ($request->filled('priceInDhaka')) {
                $request->validate([
                    'priceInDhaka' => 'min:0',
                ]);
                $s->cnf_price_dhaka = $request->priceInDhaka;
            }
            if ($request->filled('priceInChittagong')) {
                $request->validate([
                    'priceInChittagong' => 'min:0',
                ]);
                $s->cnf_price_chittagong = $request->priceInChittagong;
            }
            $s->total_price = $request->totalPrice;
            $s->purchase_date = date('Y-m-d', strtotime($request->dateOfPurchase));
            $s->arrival_date = date('Y-m-d', strtotime($request->dateOfArrival));
            $s->shipped_by = $request->shippedBy;
            $s->invoice_number = $request->invoiceNumber;
            $s->lc_number = $request->lcNumber;
            $s->note = $request->note;
            $s->user_id = Auth::id();
            $s->save();
            Session::flash('Success', "The Spare Parts has been purchased successfully.");
            return redirect()->route('spare-part.purchase.history');
        } else {
            abort(403);
        }
    }


    public function destroy($spid)
    {
        if (Auth::user()->can('sparepart_purchase')) {
            Sparepartspurchase::find($spid)->delete();
            Session::flash('Success', "The Spare Part Purchase History has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($spid)
    {
        if (Auth::user()->can('sparepart_purchase')) {
            $spedit = Sparepartspurchase::find($spid);
            $spedit['spare_part'] = Spareparts::find($spedit->spareparts_id)->description;
            $spareparts = Spareparts::all();
            $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM sparepartspurchases GROUP BY country_origin'));
            $datalist['countryOfPurchase'] = DB::select(DB::raw('SELECT country_purchase FROM sparepartspurchases GROUP BY country_purchase'));
            $datalist['currency'] = DB::select(DB::raw('SELECT currency FROM sparepartspurchases GROUP BY currency'));
            return view('PURCHASE.spareparts.edit', compact('spedit','spareparts', 'datalist'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $spid)
    {
        if (Auth::user()->can('sparepart_purchase')) {
            $request->validate([
                'sparePart' => 'required',
                'quantity' => 'required',
                'unit' => 'required',
//                'countryOfOrigin' => 'required',
                'countryOfPurchase' => 'required',
                'manufacturerYear' => 'required',
                'currency' => 'required',
                'unitPrice' => 'required|min:0',
//                'priceInCnf' => 'required|min:0',
//                'priceInFob' => 'required|min:0',
                'totalPrice' => 'required|min:0',
                'dateOfPurchase' => 'required',
                'dateOfArrival' => 'required',
                'shippedBy' => 'required',
                'invoiceNumber' => 'required',
                'lcNumber' => 'required',
                'note' => 'required',
            ]);
            $s = Sparepartspurchase::find($spid);
            $s->spareparts_id = $request->sparePart;
            $s->quantity = $request->quantity;
            $s->unit = $request->unit;
            $s->country_origin = $request->countryOfOrigin;
            $s->country_purchase = $request->countryOfPurchase;
            $s->manufacture_year = $request->manufacturerYear;
            $s->currency = $request->currency;
            $s->unit_price = $request->unitPrice;
            $s->unit_price_cnf = $request->priceInCnf;
            $s->unit_price_fob = $request->priceInFob;
            if ($request->filled('priceInDhaka')) {
                $request->validate([
                    'priceInDhaka' => 'min:0',
                ]);
                $s->cnf_price_dhaka = $request->priceInDhaka;
            }
            if ($request->filled('priceInChittagong')) {
                $request->validate([
                    'priceInChittagong' => 'min:0',
                ]);
                $s->cnf_price_chittagong = $request->priceInChittagong;
            }
            $s->total_price = $request->totalPrice;
            $s->purchase_date = date('Y-m-d', strtotime($request->dateOfPurchase));
            $s->arrival_date = date('Y-m-d', strtotime($request->dateOfArrival));
            $s->shipped_by = $request->shippedBy;
            $s->invoice_number = $request->invoiceNumber;
            $s->lc_number = $request->lcNumber;
            $s->note = $request->note;
            $s->edit_user_id = Auth::id();
            $s->update();
            Session::flash('Success', "The Spare Parts purchase has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }



    public function receiveIndex()
    {
        if (Auth::user()->can('sparepart_receive')) {
            $histories = Sparepartspurchase::where('status', 'pending')->orWhere('status', 'received')->orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);
            foreach ($histories as $h){
                $h['spare_part'] = Spareparts::find($h->spareparts_id)->description;
            }
            return view('PURCHASE.RECEIVED.spareParts', compact('histories'));
        } else {
            abort(403);
        }
    }



    public function received(Request $request, $spid)
    {
        if (Auth::user()->can('sparepart_receive')) {
            $h = Sparepartspurchase::find($spid);
            $h->status = 'received';
            $h->receive_user_id = Auth::id();
            $h->update();
            Session::flash('Success', "The Spare Parts has been received successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }



    public function notReceived(Request $request, $spid)
    {
        if (Auth::user()->can('sparepart_receive')) {
            $h = Sparepartspurchase::find($spid);
            $h->status = 'pending';
            $h->receive_user_id = null;
            $h->update();
            Session::flash('Success', "The Spare Parts purchase history status is pending now.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }



}

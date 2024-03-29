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

    public function history(Request $request)
    {
        if ($request->spid) {
            $histories = Sparepartspurchase::Where('spareparts_id', 'LIKE', "$request->spid")
                ->where('status', 'LIKE', "%{$request->status}%")
                ->Where('quantity', 'LIKE', "%{$request->quantity}%")
                ->Where('country_purchase', 'LIKE', "%{$request->country}%")
                ->Where('total_price', 'LIKE', "%{$request->price}%")
                ->Where('invoice_number', 'LIKE', "%{$request->invoice}%")
                ->Where('lc_number', 'LIKE', "%{$request->lc}%")
                ->paginate(10);
        } else {
            $histories = Sparepartspurchase::where('status', 'LIKE', "%{$request->status}%")
                ->Where('quantity', 'LIKE', "%{$request->quantity}%")
                ->Where('country_purchase', 'LIKE', "%{$request->country}%")
                ->Where('total_price', 'LIKE', "%{$request->price}%")
                ->Where('invoice_number', 'LIKE', "%{$request->invoice}%")
                ->Where('lc_number', 'LIKE', "%{$request->lc}%")
                ->paginate(10);
        }
        foreach ($histories as $h) {
            $h['spare_part'] = Spareparts::find($h->spareparts_id)->description;
        }
        $spareparts = Spareparts::all();
        if ($request->spid) {
            $histories->appends(['spid' => "$request->spid", 'status' => "$request->status", 'quantity' => "$request->quantity", 'country' => "$request->country", 'price' => "$request->price", 'invoice' => "$request->invoice", 'lc' => "$request->lc"]);
        } else {
            $histories->appends(['status' => "$request->status", 'quantity' => "$request->quantity", 'country' => "$request->country", 'price' => "$request->price", 'invoice' => "$request->invoice", 'lc' => "$request->lc"]);
        }
        $query = $request->all();
        if ((count($query) > 0) && array_key_exists("spid", $query)) {
            $query['sparePartD'] = Spareparts::find($query['spid'])->description;
        }
        return view('PURCHASE.HISTORY.spareParts', compact('histories', 'query', 'spareparts'));
    }


    public function index()
    {
        $spareparts = Spareparts::all();
        $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM sparepartspurchases GROUP BY country_origin'));
        $datalist['countryOfPurchase'] = DB::select(DB::raw('SELECT country_purchase FROM sparepartspurchases GROUP BY country_purchase'));
        $datalist['currency'] = DB::select(DB::raw('SELECT currency FROM sparepartspurchases GROUP BY currency'));
        return view('PURCHASE.spareparts.index', compact('spareparts', 'datalist'));
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
    }


    public function destroy($spid)
    {
        Sparepartspurchase::find($spid)->delete();
        Session::flash('Success', "The Spare Part Purchase History has been deleted successfully.");
        return redirect()->back();
    }


    public function edit($spid)
    {
        $spedit = Sparepartspurchase::find($spid);
        $spedit['spare_part'] = Spareparts::find($spedit->spareparts_id)->description;
        $spareparts = Spareparts::all();
        $datalist['countryOfOrigin'] = DB::select(DB::raw('SELECT country_origin FROM sparepartspurchases GROUP BY country_origin'));
        $datalist['countryOfPurchase'] = DB::select(DB::raw('SELECT country_purchase FROM sparepartspurchases GROUP BY country_purchase'));
        $datalist['currency'] = DB::select(DB::raw('SELECT currency FROM sparepartspurchases GROUP BY currency'));
        return view('PURCHASE.spareparts.edit', compact('spedit', 'spareparts', 'datalist'));
    }


    public function update(Request $request, $spid)
    {
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
    }


    public function receiveIndex()
    {
        $histories = Sparepartspurchase::where('status', 'pending')->orWhere('status', 'received')->orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);
        foreach ($histories as $h) {
            $h['spare_part'] = Spareparts::find($h->spareparts_id)->description;
        }
        return view('PURCHASE.RECEIVED.spareParts', compact('histories'));
    }


    public function received(Request $request, $spid)
    {
        $h = Sparepartspurchase::find($spid);
        $h->status = 'received';
        $h->receive_user_id = Auth::id();
        $h->update();
        Session::flash('Success', "The Spare Parts has been received successfully.");
        return redirect()->back();
    }


    public function notReceived(Request $request, $spid)
    {
        $h = Sparepartspurchase::find($spid);
        $h->status = 'pending';
        $h->receive_user_id = null;
        $h->update();
        Session::flash('Success', "The Spare Parts purchase history status is pending now.");
        return redirect()->back();
    }


}

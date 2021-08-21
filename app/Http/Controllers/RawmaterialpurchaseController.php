<?php

namespace App\Http\Controllers;

use App\Rawmaterial;
use App\Rawmaterialpurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RawmaterialpurchaseController extends Controller
{

    public function history(Request $request)
    {
        abort_unless(Auth::user()->can('raw_material_purchase'), 403);
        if ($request->rid) {
            $histories = Rawmaterialpurchase::Where('rawmaterial_id', 'LIKE', "$request->rid")
                ->where('status', 'LIKE', "%{$request->status}%")
                ->Where('invoice_number', 'LIKE', "%{$request->invoice}%")
                ->Where('quantity', 'LIKE', "%{$request->quantity}%")
                ->Where('total_price', 'LIKE', "%{$request->price}%")
                ->Where('purchase_from', 'LIKE', "%{$request->seller}%")
                ->Where('lc_number', 'LIKE', "%{$request->lc}%")
                ->paginate(10);
        } else {
            $histories = Rawmaterialpurchase::where('status', 'LIKE', "%{$request->status}%")
                ->Where('invoice_number', 'LIKE', "%{$request->invoice}%")
                ->Where('quantity', 'LIKE', "%{$request->quantity}%")
                ->Where('total_price', 'LIKE', "%{$request->price}%")
                ->Where('purchase_from', 'LIKE', "%{$request->seller}%")
                ->Where('lc_number', 'LIKE', "%{$request->lc}%")
                ->paginate(10);
        }
        foreach ($histories as $h) {
            $h['raw_material'] = Rawmaterial::find($h->rawmaterial_id)->auto_id;
        }
        $rawMaterials = Rawmaterial::all();
        if ($request->rid) {
            $histories->appends(['rid' => "$request->rid", 'status' => "$request->status", 'invoice' => "$request->invoice", 'quantity' => "$request->quantity", 'price' => "$request->price", 'seller' => "$request->seller", 'lc' => "$request->lc"]);
        } else {
            $histories->appends(['status' => "$request->status", 'invoice' => "$request->invoice", 'quantity' => "$request->quantity", 'price' => "$request->price", 'seller' => "$request->seller", 'lc' => "$request->lc"]);
        }
        $query = $request->all();
        if ((count($query) > 0) && array_key_exists("rid", $query)) {
            $query['RawMaterialD'] = Rawmaterial::find($query['rid'])->auto_id;
        }
        return view('PURCHASE.HISTORY.rawMaterial', compact('histories', 'query', 'rawMaterials'));
    }


    public function index()
    {
        abort_unless(Auth::user()->can('raw_material_purchase'), 403);
        $rawmaterials = Rawmaterial::all();
//            $warehouses = Warehouse::all();
        $datalist['currency'] = DB::select(DB::raw('SELECT currency FROM rawmaterialpurchases GROUP BY currency'));
        $datalist['purchaseFrom'] = DB::select(DB::raw('SELECT purchase_from FROM rawmaterialpurchases GROUP BY purchase_from'));
        $datalist['indentedBy'] = DB::select(DB::raw('SELECT indented_by FROM rawmaterialpurchases GROUP BY indented_by'));
        $datalist['importedBy'] = DB::select(DB::raw('SELECT imported_by FROM rawmaterialpurchases GROUP BY imported_by'));
        $datalist['portOfLanding'] = DB::select(DB::raw('SELECT port_of_landing FROM rawmaterialpurchases GROUP BY port_of_landing'));
        return view('PURCHASE.rawmaterial.index', compact('rawmaterials', 'datalist'));
    }


    public function ajaxRidToUnit()
    {
        if (request()->ajax()) {
            $rid = $_GET['rid'];
            $r = Rawmaterial::find($rid);
            return $r->unit;
        } else {
            return json_encode(['success' => false]);
        }
    }


    public function store(Request $request)
    {
        abort_unless(Auth::user()->can('raw_material_purchase'), 403);
        $request->validate([
            'rawMaterial' => 'required',
            'invoiceDate' => 'required',
            'invoiceNumber' => 'required',
            'description' => 'required',
            'hsCode' => 'required',
            'quantity' => 'required|min:0',
            'unit' => 'required',
            'pricePerUnit' => 'required|min:0',
            'currency' => 'required',
            'totalPrice' => 'required|min:0',
            'purchasedFrom' => 'required',
            'indentedDate' => 'required',
            'indentedBy' => 'required',
            'importedBy' => 'required',
            'lcNumber' => 'required',
            'portOfLanding' => 'required',
        ]);
        $p = new Rawmaterialpurchase;
        $p->rawmaterial_id = $request->rawMaterial;
        $p->invoice_date = date('Y-m-d', strtotime($request->invoiceDate));
        $p->invoice_number = $request->invoiceNumber;
        $p->description = $request->description;
        $p->hs_code = $request->hsCode;
        $p->quantity = $request->quantity;
        $p->unit = $request->unit;
        if ($request->filled('cnfDhaka')) {
            $request->validate([
                'cnfDhaka' => 'min:0',
            ]);
            $p->cnf_dhaka = $request->cnfDhaka;
        }
        if ($request->filled('cnfCtg')) {
            $request->validate([
                'cnfCtg' => 'min:0',
            ]);
            $p->cnf_ctg = $request->cnfCtg;
        }
        $p->price_per_unit = $request->pricePerUnit;
        $p->currency = $request->currency;
        $p->total_price = $request->totalPrice;
        $p->purchase_from = $request->purchasedFrom;
        $p->indented_date = date('Y-m-d', strtotime($request->indentedDate));
        $p->indented_by = $request->indentedBy;
        $p->imported_by = $request->importedBy;
        $p->lc_number = $request->lcNumber;
        $p->port_of_landing = $request->portOfLanding;
        $p->user_id = Auth::id();
        $p->save();
        Session::flash('Success', "The Raw Material has been purchased successfully.");
        return redirect()->route('raw-material.purchase.history');
    }


    public function destroy($rpid)
    {
        abort_unless(Auth::user()->can('raw_material_purchase'), 403);
        Rawmaterialpurchase::find($rpid)->delete();
        Session::flash('Success', "The Raw Material Purchase History has been deleted successfully.");
        return redirect()->back();
    }


    public function edit($rpid)
    {
        abort_unless(Auth::user()->can('raw_material_purchase'), 403);
        $rpedit = Rawmaterialpurchase::find($rpid);
        $rpedit['rawmaterial'] = Rawmaterial::find($rpedit->rawmaterial_id)->auto_id;
        $rawmaterials = Rawmaterial::all();
        $datalist['currency'] = DB::select(DB::raw('SELECT currency FROM rawmaterialpurchases GROUP BY currency'));
        $datalist['purchaseFrom'] = DB::select(DB::raw('SELECT purchase_from FROM rawmaterialpurchases GROUP BY purchase_from'));
        $datalist['indentedBy'] = DB::select(DB::raw('SELECT indented_by FROM rawmaterialpurchases GROUP BY indented_by'));
        $datalist['importedBy'] = DB::select(DB::raw('SELECT imported_by FROM rawmaterialpurchases GROUP BY imported_by'));
        $datalist['portOfLanding'] = DB::select(DB::raw('SELECT port_of_landing FROM rawmaterialpurchases GROUP BY port_of_landing'));
        return view('PURCHASE.rawmaterial.edit', compact('rpedit', 'rawmaterials', 'datalist'));
    }


    public function update(Request $request, $rpid)
    {
        abort_unless(Auth::user()->can('raw_material_purchase'), 403);
        $request->validate([
            'rawMaterial' => 'required',
            'invoiceDate' => 'required',
            'invoiceNumber' => 'required',
            'description' => 'required',
            'hsCode' => 'required',
            'quantity' => 'required|min:0',
            'unit' => 'required',
            'pricePerUnit' => 'required|min:0',
            'currency' => 'required',
            'totalPrice' => 'required|min:0',
            'purchasedFrom' => 'required',
            'indentedDate' => 'required',
            'indentedBy' => 'required',
            'importedBy' => 'required',
            'lcNumber' => 'required',
            'portOfLanding' => 'required',
        ]);
        $p = Rawmaterialpurchase::find($rpid);
        $p->rawmaterial_id = $request->rawMaterial;
        $p->invoice_date = date('Y-m-d', strtotime($request->invoiceDate));
        $p->invoice_number = $request->invoiceNumber;
        $p->description = $request->description;
        $p->hs_code = $request->hsCode;
        $p->quantity = $request->quantity;
        $p->unit = $request->unit;
        if ($request->filled('cnfDhaka')) {
            $request->validate([
                'cnfDhaka' => 'min:0',
            ]);
            $p->cnf_dhaka = $request->cnfDhaka;
        }
        if ($request->filled('cnfCtg')) {
            $request->validate([
                'cnfCtg' => 'min:0',
            ]);
            $p->cnf_ctg = $request->cnfCtg;
        }
        $p->price_per_unit = $request->pricePerUnit;
        $p->currency = $request->currency;
        $p->total_price = $request->totalPrice;
        $p->purchase_from = $request->purchasedFrom;
        $p->indented_date = date('Y-m-d', strtotime($request->indentedDate));
        $p->indented_by = $request->indentedBy;
        $p->imported_by = $request->importedBy;
        $p->lc_number = $request->lcNumber;
        $p->port_of_landing = $request->portOfLanding;
        $p->edit_user_id = Auth::id();
        $p->update();
        Session::flash('Success', "The Raw Material Purchase has been updated successfully.");
        return redirect()->back();
    }


    public function receiveIndex()
    {
        abort_unless(Auth::user()->can('raw_material_purchase'), 403);
        $histories = Rawmaterialpurchase::where('status', 'pending')->orWhere('status', 'received')->orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);
        foreach ($histories as $h) {
            $h['raw_material'] = Rawmaterial::find($h->rawmaterial_id)->auto_id;
        }
        return view('PURCHASE.RECEIVED.rawMaterial', compact('histories'));
    }


    public function received(Request $request, $rpid)
    {
        abort_unless(Auth::user()->can('raw_material_purchase'), 403);
        $h = Rawmaterialpurchase::find($rpid);
        $h->status = 'received';
        $h->receive_user_id = Auth::id();
        $h->update();
        Session::flash('Success', "The Raw material has been received successfully.");
        return redirect()->back();
    }


    public function notReceived(Request $request, $rpid)
    {
        abort_unless(Auth::user()->can('raw_material_purchase'), 403);
        $h = Rawmaterialpurchase::find($rpid);
        $h->status = 'pending';
        $h->receive_user_id = null;
        $h->update();
        Session::flash('Success', "The Raw material purchase history status is pending now.");
        return redirect()->back();
    }


}

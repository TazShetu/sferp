<?php

namespace App\Http\Controllers;

use App\Bankaccount;
use App\DailySheet;
use App\Dsdcbankdeposit;
use App\Dsdccashpayment;
use App\Dsdclocaltransport;
use App\Dsdcpettycash;
use App\Dsdcprodustsale;
use App\Dsdcpurchasefactory;
use App\Dsddbankwithdrawl;
use App\Dsddcashin;
use App\Dsddcustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DsdcreditController extends Controller
{


//    public function bankDeposit()
//    {
//        if (Auth::user()->can('daily_sheet_dhaka')) {
//            $bas = Bankaccount::all();
//            return view('dsd.credit.bankDeposit', compact('bas'));
//        } else {
//            abort(403);
//        }
//    }


    public function bankDepositStore(Request $request)
    {
        abort_unless(Auth::user()->can('daily_sheet_dhaka'), 403);
        $request->validate([
            'bankaccount_id' => 'required',
            'info' => 'required',
            'amount' => 'required',
            'payment_type' => 'required',
            'unit' => 'required',
        ]);
        $ba = new Dsdcbankdeposit;
        $ba->bankaccount_id = $request->bankaccount_id;
        $ba->amount = $request->amount;
        $ba->unit = $request->unit;
        $ba->info = $request->info;
        $ba->payment_type = $request->payment_type;
        $ba->date = DB::table('daily_sheets')->latest('id')->first()->date;
        $ba->save();
        Session::flash('Success', "The Data has been entered successfully.");
        return redirect()->back();
    }


//    public function cashPayment()
//    {
//        if (Auth::user()->can('daily_sheet_dhaka')) {
//            return view('dsd.credit.cashPayment');
//        } else {
//            abort(403);
//        }
//    }


    public function cashPaymentStore(Request $request)
    {
        abort_unless(Auth::user()->can('daily_sheet_dhaka'), 403);
        $request->validate([
            'to' => 'required',
            'for' => 'required',
            'amount' => 'required',
            'unit' => 'required',
        ]);
        $ba = new Dsdccashpayment;
        $ba->to = $request->to;
        $ba->for = $request->for;
        $ba->amount = $request->amount;
        $ba->unit = $request->unit;
        $ba->date = DB::table('daily_sheets')->latest('id')->first()->date;
        $ba->save();
        Session::flash('Success', "The Data has been entered successfully.");
        return redirect()->back();
    }


//    public function purchaseFactory()
//    {
//        if (Auth::user()->can('daily_sheet_dhaka')) {
//            return view('dsd.credit.purchaseFactory');
//        } else {
//            abort(403);
//        }
//    }


    public function purchaseFactoryStore(Request $request)
    {
        abort_unless(Auth::user()->can('daily_sheet_dhaka'), 403);
        $request->validate([
            'to' => 'required',
//                'for' => 'required',
            'amount' => 'required',
            'unit' => 'required',
            'sparepart' => 'required',
        ]);
        $ba = new Dsdcpurchasefactory;
        $ba->to = $request->to;
        $ba->for = $request->for;
        $ba->amount = $request->amount;
        $ba->unit = $request->unit;
        $ba->sparepart_id = $request->sparepart;
        $ba->date = DB::table('daily_sheets')->latest('id')->first()->date;
        $ba->save();
        Session::flash('Success', "The Data has been entered successfully.");
        return redirect()->back();
    }



//    public function localTransport()
//    {
//        if (Auth::user()->can('daily_sheet_dhaka')) {
//            return view('dsd.credit.localTransport');
//        } else {
//            abort(403);
//        }
//    }


    public function localTransportStore(Request $request)
    {
        abort_unless(Auth::user()->can('daily_sheet_dhaka'), 403);
        $request->validate([
            'to' => 'required',
            'for' => 'required',
            'amount' => 'required',
            'unit' => 'required',
        ]);
        $ba = new Dsdclocaltransport;
        $ba->to = $request->to;
        $ba->for = $request->for;
        $ba->amount = $request->amount;
        $ba->unit = $request->unit;
        $ba->date = DB::table('daily_sheets')->latest('id')->first()->date;
        $ba->save();
        Session::flash('Success', "The Data has been entered successfully.");
        return redirect()->back();
    }



//    public function pettyCash()
//    {
//        if (Auth::user()->can('daily_sheet_dhaka')) {
//            return view('dsd.credit.pettyCash');
//        } else {
//            abort(403);
//        }
//    }


    public function pettyCashStore(Request $request)
    {
        abort_unless(Auth::user()->can('daily_sheet_dhaka'), 403);
        $request->validate([
            'to' => 'required',
            'for' => 'required',
            'amount' => 'required',
            'unit' => 'required',
        ]);
        $ba = new Dsdcpettycash;
        $ba->to = $request->to;
        $ba->for = $request->for;
        $ba->amount = $request->amount;
        $ba->unit = $request->unit;
        $ba->date = DB::table('daily_sheets')->latest('id')->first()->date;
        $ba->save();
        Session::flash('Success', "The Data has been entered successfully.");
        return redirect()->back();
    }


    public function productSaleStore(Request $request)
    {
        abort_unless(Auth::user()->can('daily_sheet_dhaka'), 403);
        $request->validate([
            'product' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required',
        ]);
        $c = new Dsdcprodustsale;
        $c->product_id = $request->product;
        $c->customer_id = $request->customer_id;
        $c->quantity = $request->quantity;
        $c->note = $request->note;
        $c->date = DB::table('daily_sheets')->latest('id')->first()->date;
        $c->save();
        Session::flash('Success', "The Data has been entered successfully.");
        return redirect()->back();
    }


    public function closing()
    {
        abort_unless(Auth::user()->can('daily_sheet_dhaka'), 403);
        $ds = DB::table('daily_sheets')->latest('id')->first();
        $ob = $ds->opening_balance;
        $dcs = Dsddcustomer::where('date', $ds->date)->get();
        foreach ($dcs as $dc) {
            $ob = $ob + $dc->amount;
        }
        $dbws = Dsddbankwithdrawl::where('date', $ds->date)->get();
        foreach ($dbws as $dbw) {
            $ob = $ob + $dbw->amount;
        }
        $dcis = Dsddcashin::where('date', $ds->date)->get();
        foreach ($dcis as $dci) {
            $ob = $ob + $dci->amount;
        }
        $cbds = Dsdcbankdeposit::where('date', $ds->date)->get();
        foreach ($cbds as $cbd) {
            $ob = $ob - $cbd->amount;
        }
        $ccps = Dsdccashpayment::where('date', $ds->date)->get();
        foreach ($ccps as $ccp) {
            $ob = $ob - $ccp->amount;
        }
        $cpfs = Dsdcpurchasefactory::where('date', $ds->date)->get();
        foreach ($cpfs as $cpf) {
            $ob = $ob - $cpf->amount;
        }
        $clts = Dsdclocaltransport::where('date', $ds->date)->get();
        foreach ($clts as $clt) {
            $ob = $ob - $clt->amount;
        }
        $cpcs = Dsdcpettycash::where('date', $ds->date)->get();
        foreach ($cpcs as $cpc) {
            $ob = $ob - $cpc->amount;
        }
        $dse = DailySheet::where('date', $ds->date)->first();
        $dse->closing_balance = $ob;
        $dse->update();
        $dsn = new DailySheet;
        $dsn->date = date('Y-m-d', strtotime($ds->date . ' +1 day'));
        $dsn->opening_balance = $ob;
        $dsn->save();
        Session::flash('Success', "Daily Sheet is closed for date '$ds->date'");
        return redirect()->back();
    }


}

<?php

namespace App\Http\Controllers;

use App\Bankaccount;
use App\Dsdcbankdeposit;
use App\Dsdccashpayment;
use App\Dsdclocaltransport;
use App\Dsdcpettycash;
use App\Dsdcpurchasefactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DsdcreditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function bankDeposit()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $bas = Bankaccount::all();
            return view('dsd.credit.bankDeposit', compact('bas'));
        } else {
            abort(403);
        }
    }


    public function bankDepositStore(Request $request)
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $request->validate([
                'bankaccount_id' => 'required',
                'info' => 'required',
                'amount' => 'required',
                'payment_type' => 'required',
            ]);
            $ba = new Dsdcbankdeposit;
            $ba->bankaccount_id = $request->bankaccount_id;
            $ba->amount = $request->amount;
            $ba->info = $request->info;
            $ba->payment_type = $request->payment_type;
            $ba->date = date('Y-m-d');
            $ba->save();
            Session::flash('Success', "The Data has been entered successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function cashPayment()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            return view('dsd.credit.cashPayment');
        } else {
            abort(403);
        }
    }


    public function cashPaymentStore(Request $request)
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $request->validate([
                'to' => 'required',
                'for' => 'required',
                'amount' => 'required',
            ]);
            $ba = new Dsdccashpayment;
            $ba->to = $request->to;
            $ba->for = $request->for;
            $ba->amount = $request->amount;
            $ba->date = date('Y-m-d');
            $ba->save();
            Session::flash('Success', "The Data has been entered successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function purchaseFactory()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            return view('dsd.credit.purchaseFactory');
        } else {
            abort(403);
        }
    }


    public function purchaseFactoryStore(Request $request)
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $request->validate([
                'to' => 'required',
                'for' => 'required',
                'amount' => 'required',
            ]);
            $ba = new Dsdcpurchasefactory;
            $ba->to = $request->to;
            $ba->for = $request->for;
            $ba->amount = $request->amount;
            $ba->date = date('Y-m-d');
            $ba->save();
            Session::flash('Success', "The Data has been entered successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }



    public function localTransport()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            return view('dsd.credit.localTransport');
        } else {
            abort(403);
        }
    }


    public function localTransportStore(Request $request)
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $request->validate([
                'to' => 'required',
                'for' => 'required',
                'amount' => 'required',
            ]);
            $ba = new Dsdclocaltransport;
            $ba->to = $request->to;
            $ba->for = $request->for;
            $ba->amount = $request->amount;
            $ba->date = date('Y-m-d');
            $ba->save();
            Session::flash('Success', "The Data has been entered successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }



    public function pettyCash()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            return view('dsd.credit.pettyCash');
        } else {
            abort(403);
        }
    }


    public function pettyCashStore(Request $request)
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $request->validate([
                'to' => 'required',
                'for' => 'required',
                'amount' => 'required',
            ]);
            $ba = new Dsdcpettycash;
            $ba->to = $request->to;
            $ba->for = $request->for;
            $ba->amount = $request->amount;
            $ba->date = date('Y-m-d');
            $ba->save();
            Session::flash('Success', "The Data has been entered successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }






}

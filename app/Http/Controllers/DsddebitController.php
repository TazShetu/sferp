<?php

namespace App\Http\Controllers;

use App\Bankaccount;
use App\Customer;
use App\Dsdcbankdeposit;
use App\Dsdccashpayment;
use App\Dsdclocaltransport;
use App\Dsdcpettycash;
use App\Dsdcprodustsale;
use App\Dsdcpurchasefactory;
use App\Dsddbankwithdrawl;
use App\Dsddcashin;
use App\Dsddcustomer;
use App\Dsddprodustin;
use App\Openingbalancestore;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DsddebitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function main()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            // Sheet data
            $yesterday = date('Y-m-d', strtotime("-1 days"));
            $ob = 0;
            $obc = Openingbalancestore::where('date', $yesterday)->first();
            if ($obc) {
                $ob = $obc->closing_balance;
            }
            $dcs = Dsddcustomer::where('date', date('Y-m-d'))->get();
            foreach ($dcs as $dc) {
                $dc['name'] = Customer::find($dc->customer_id)->name;
            }
            $dbws = Dsddbankwithdrawl::where('date', date('Y-m-d'))->get();
            foreach ($dbws as $dbw) {
                $dbw['acname'] = Bankaccount::find($dbw->bankaccount_id)->ac_name;
            }
            $dcis = Dsddcashin::where('date', date('Y-m-d'))->get();
            $dpis = Dsddprodustin::where('date', date('Y-m-d'))->get();
            foreach ($dpis as $dpi) {
                $dpi['product_name'] = Product::find($dpi->product_id)->name;
            }
            $cbds = Dsdcbankdeposit::where('date', date('Y-m-d'))->get();
            foreach ($cbds as $cbd) {
                $cbd['acname'] = Bankaccount::find($dbw->bankaccount_id)->ac_name;
            }
            $ccps = Dsdccashpayment::where('date', date('Y-m-d'))->get();
            $cpfs = Dsdcpurchasefactory::where('date', date('Y-m-d'))->get();
            $clts = Dsdclocaltransport::where('date', date('Y-m-d'))->get();
            $cpcs = Dsdcpettycash::where('date', date('Y-m-d'))->get();
            $cpss = Dsdcprodustsale::where('date', date('Y-m-d'))->get();
            foreach ($cpss as $cps) {
                $cps['product_name'] = Product::find($cps->product_id)->name;
                $cps['customer_name'] = Customer::find($cps->customer_id)->name;
            }

            // debit Customers
            $customers = Customer::all();
            $bas = Bankaccount::all();
            $products = Product::all();

            return view('dsd.main', compact('ob', 'dcs', 'dbws', 'cbds', 'dcis', 'ccps', 'cpfs', 'clts', 'cpcs', 'dpis', 'cpss',
                                                    'customers', 'bas', 'products'));
        } else {
            abort(403);
        }
    }


    public function dsd()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $yesterday = date('Y-m-d', strtotime("-1 days"));
            $ob = 0;
            $obc = Openingbalancestore::where('date', $yesterday)->first();
            if ($obc) {
                $ob = $obc->closing_balance;
            }


            $dcs = Dsddcustomer::where('date', date('Y-m-d'))->get();
            foreach ($dcs as $dc) {
                $dc['name'] = Customer::find($dc->customer_id)->name;
            }
            $dbws = Dsddbankwithdrawl::where('date', date('Y-m-d'))->get();
            foreach ($dbws as $dbw) {
                $dbw['acname'] = Bankaccount::find($dbw->bankaccount_id)->ac_name;
            }
            $dcis = Dsddcashin::where('date', date('Y-m-d'))->get();


            $cbds = Dsdcbankdeposit::where('date', date('Y-m-d'))->get();
            foreach ($cbds as $cbd) {
                $cbd['acname'] = Bankaccount::find($dbw->bankaccount_id)->ac_name;
            }
            $ccps = Dsdccashpayment::where('date', date('Y-m-d'))->get();
            $cpfs = Dsdcpurchasefactory::where('date', date('Y-m-d'))->get();
            $clts = Dsdclocaltransport::where('date', date('Y-m-d'))->get();
            $cpcs = Dsdcpettycash::where('date', date('Y-m-d'))->get();


            return view('dsd.index', compact('ob', 'dcs', 'dbws', 'cbds', 'dcis', 'ccps', 'cpfs', 'clts', 'cpcs'));
        } else {
            abort(403);
        }
    }


    public function customer()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $customers = Customer::all();
            return view('dsd.debit.customer', compact('customers'));
        } else {
            abort(403);
        }
    }


    public function customerStore(Request $request)
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $request->validate([
                'customer_id' => 'required',
                'payment_type' => 'required',
                'amount' => 'required',
            ]);
            $c = new Dsddcustomer;
            $c->customer_id = $request->customer_id;
            $c->payment_type = $request->payment_type;
            $c->amount = $request->amount;
            $c->date = date('Y-m-d');
            $c->save();
            Session::flash('Success', "The Data has been entered successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function bankWithdraw()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $bas = Bankaccount::all();
            return view('dsd.debit.bankWithdrawl', compact('bas'));
        } else {
            abort(403);
        }
    }


    public function bankWithdrawStore(Request $request)
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $request->validate([
                'bankaccount_id' => 'required',
                'info' => 'required',
                'amount' => 'required',
            ]);
            $ba = new Dsddbankwithdrawl;
            $ba->bankaccount_id = $request->bankaccount_id;
            $ba->amount = $request->amount;
            $ba->info = $request->info;
            $ba->date = date('Y-m-d');
            $ba->save();
            Session::flash('Success', "The Data has been entered successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function cashIn()
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            return view('dsd.debit.cashIn');
        } else {
            abort(403);
        }
    }


    public function cashInStore(Request $request)
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $request->validate([
                'deposit_by' => 'required',
                'amount' => 'required',
            ]);
            $ba = new Dsddcashin;
            $ba->deposit_by = $request->deposit_by;
            $ba->amount = $request->amount;
            $ba->for = $request->for;
            $ba->date = date('Y-m-d');
            $ba->save();
            Session::flash('Success', "The Data has been entered successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function productInStore(Request $request)
    {
        if (Auth::user()->can('daily_sheet_dhaka')) {
            $request->validate([
                'product' => 'required',
                'quantity' => 'required',
            ]);
            $c = new Dsddprodustin;
            $c->product_id = $request->product;
            $c->quantity = $request->quantity;
            $c->note = $request->note;
            $c->date = date('Y-m-d');
            $c->save();
            Session::flash('Success', "The Data has been entered successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


}

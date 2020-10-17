<?php

namespace App\Http\Controllers;

use App\Bankaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BankaccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list(Request $request)
    {

        if (Auth::user()->can('bank_account')) {
            $bankAccount = Bankaccount::where('name', 'LIKE', "%{$request->name}%")->Where('ac_name', 'LIKE', "%{$request->ac_name}%")->Where('ac_number', 'LIKE', "%{$request->ac_number}%")->paginate(10);
            $bankAccount->appends(['name' => "$request->name", 'ac_name' => "$request->ac_name", 'ac_number' => "$request->ac_number"]);
            $query = $request->all();
            return view('bankAccounts.list', compact('bankAccount', 'query'));
        } else {
            abort(403);
        }
    }


    public function create()
    {
        if (Auth::user()->can('bank_account')) {
            $datalist['name'] = DB::select(DB::raw('SELECT name FROM bankaccounts GROUP BY name'));
            return view('bankAccounts.create', compact('datalist'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('bank_account')) {
            $request->validate([
                'name' => 'required',
                'ac_name' => 'required',
                'ac_number' => 'required',
            ]);
            $s = new Bankaccount;
            $s->name = $request->name;
            $s->ac_name = $request->ac_name;
            $s->ac_number = $request->ac_number;
            $s->save();
            Session::flash('Success', "The Bank Account has been created successfully.");
            return redirect()->route('bankAccount.list');
        } else {
            abort(403);
        }
    }


    public function destroy($baid)
    {
        if (Auth::user()->can('bank_account')) {
            Bankaccount::find($baid)->delete();
            Session::flash('Success', "The bank Account has been deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($baid)
    {
        if (Auth::user()->can('bank_account')) {
            $baedit = Bankaccount::find($baid);
            $datalist['name'] = DB::select(DB::raw('SELECT name FROM bankaccounts GROUP BY name'));
            return view('bankAccounts.edit', compact('baedit', 'datalist'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $baid)
    {
        if (Auth::user()->can('bank_account')) {
            $request->validate([
                'name' => 'required',
                'ac_name' => 'required',
                'ac_number' => 'required',
            ]);
            $s = Bankaccount::find($baid);
            $s->name = $request->name;
            $s->ac_name = $request->ac_name;
            $s->ac_number = $request->ac_number;
            $s->update();
            Session::flash('Success', "The Bank Account has been updated successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }





}
